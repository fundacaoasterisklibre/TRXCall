<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:58
 */

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManager;
use App\Agi\Base\AgiCustom;

class CdrPgsqlGenerate extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('pbx:database:cdr:generate')->setDescription('Gera configuração do banco de dados');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $conn = $this->getContainer()->get('doctrine.orm.default_entity_manager')
            ->getConnection();

        $configuration = $this->getContainer()->get('doctrine.dbal.default_connection');

        $content = $this->getContainer()
            ->get('twig')
            ->render('cdr_pgsql.conf.twig', ['config' => $configuration]);

        $output->writeln(preg_replace('/^[ ]*/m', '', $content));
    }

}
