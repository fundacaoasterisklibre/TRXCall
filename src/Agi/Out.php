<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:58
 */

namespace App\Agi;

use App\Dialplan\AbstractDialplan;
use App\Dialplan\BrasilDialplan;
use App\Dialplan\Format\BRFormat;
use App\Dialplan\Number\AbstractNumber;
use App\Entity\BranchPermission;
use App\Entity\PlanRouteItem;
use Monolog\Logger;
use Symfony\Component\Console\Input\InputArgument;
use App\Entity\Branch;
use App\Entity\Trunk;

class Out extends Base
{
    /**
     * @var Branch
     */
    private $branch;

    public function configure()
    {
        parent::configure(); // TODO: Change the autogenerated stub

        $this->setName('pbx:out')
            ->setDescription('Agi para Rota de saida')
            ->addArgument('exten', InputArgument::REQUIRED, 'Numero a ser discado.');
    }

    protected function pre()
    {
        $channel = $this->agi->get_variable('CHANNEL', true);

        $channel = explode('-', $channel);
        $channel = explode('/', $channel[0]);
        $branchExten = $channel[1];

        $branch = $this->getContainer()->get('doctrine.orm.default_entity_manager')->getRepository(Branch::class)->find($branchExten);

        if (!$branch instanceof Branch) {
            throw new \Exception("Ramal não encontrado");
        }

        if ($branch->getPlanRoute() === null) {
            throw new \Exception("Plano de rota não encontrado");
        }

        $DDI = $this->agi->get_variable('DDI', true);
        $DDD = $this->agi->get_variable('DDD', true);
        $exten = $this->input->getArgument('exten');

        $number = AbstractNumber::newInstance($DDI, $DDD, $exten, $this->agi);
        $branchPermission = $this->getContainer()->get('doctrine.orm.default_entity_manager')->getRepository(BranchPermission::class)
            ->createQueryBuilder('branch_permission')
            ->where('branch_permission.branch = :branch')
            ->andWhere('branch_permission.groupType = :group')
            ->andWhere('branch_permission.permit = true')
            ->setParameter('branch', $branch)
            ->setParameter('group', $number->getGroup()['value'])
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();

        if (!$branchPermission instanceof BranchPermission) {
            throw new \Exception("Este ramal nao tem permissao para o grupo " . $number->getGroup());
        }

        $this->branch = $branch;

        return true;
    }

    protected function initVar()
    {
        //$this->agi->exec('SET', 'PAGE=' . $this->getNextPage());// . $this->ivr->getMaxTry());
    }

    protected function nextTrunk()
    {
        $DDI = $this->agi->get_variable('DDI', true);
        $DDD = $this->agi->get_variable('DDD', true);
        $exten = $this->input->getArgument('exten');

        $number = AbstractNumber::newInstance($DDI, $DDD, $exten, $this->agi);

        $page = $this->getNextPage();

        $planRoute = $this->branch->getPlanRoute();
        $planRouteItems = $this->getContainer()->get('doctrine.orm.default_entity_manager')->getRepository(PlanRouteItem::class)
            ->createQueryBuilder('plan_route_item')
            ->where('plan_route_item.planRoute = :planRoute')
            ->andWhere('plan_route_item.groupType = :group')
            ->setParameter('planRoute', $planRoute)
            ->setParameter('group', $number->getGroup()['value'])
            ->orderBy('plan_route_item.order')
            ->getQuery()
            ->getResult();

        if (empty($planRouteItems)) {
            throw new \Exception('Nao possui rotas cadastradas para ' . $number->getGroup()['value']);
        }

        if (isset($planRouteItems[$page - 1])) {
            /**
             * @var $trunk Trunk
             */
            $trunk = $planRouteItems[$page - 1]->getTrunk();

            $dialOutString = $trunk->getRegisterType()->getMask();
            $dialOutString = str_replace('${PROTOCOL}', $trunk->getRegisterType()->getProtocol(), $dialOutString);
            $dialOutString = str_replace('${VALUE}', $trunk->getProtocol()->getValue(), $dialOutString);

            $exten = $number->getDialNumber($trunk->getDialType(), $trunk->getOperatorCode(), $trunk->getDialPrefix(), $trunk->getDialSufix());

            $dialOutString = str_replace('${EXTEN}', $exten, $dialOutString);

            $this->agi->set_variable('DIALOUT_TRUNK', $trunk->getProtocol()->getId());
            $this->agi->set_variable('DIALOUT_STRING', $dialOutString);

        }
    }

    private function getNextPage()
    {
        $page = $this->agi->get_variable('PAGE', true);
        $page = ($page === null) ? 1 : $page + 1;

        $this->agi->set_variable('PAGE', $page);

        return $page;
    }

}

