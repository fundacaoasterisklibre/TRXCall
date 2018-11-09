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

class SipGenerate extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('pbx:sip:generate')->setDescription('Gera configuração dos ramais');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $conn = $this->getContainer()->get('doctrine.orm.default_entity_manager')
            ->getConnection();

        $branchs = $conn->executeQuery('SELECT * FROM sippeers')->fetchAll();

        $content = $this->getContainer()
            ->get('twig')
            ->render('sip.conf.twig', ['branchs' => $branchs]);

        $output->writeln(preg_replace('/^[ ]*/m', '', $content));
    }

}
