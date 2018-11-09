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

class ExtensionsGenerate extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('pbx:extensions:generate')->setDescription('Gera configuração exten');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $conn = $this->getContainer()->get('doctrine.orm.default_entity_manager')
            ->getConnection();

        $branchs = $conn->executeQuery('SELECT * FROM sippeers')->fetchAll();
        $queues = $conn->executeQuery('SELECT * FROM queues')->fetchAll();
        $ivrs = $conn->executeQuery('SELECT * FROM ivr')->fetchAll();

        $content = $this->getContainer()
            ->get('twig')
            ->render('extensions.conf.twig', ['branchs' => $branchs, 'queues' => $queues, 'ivrs' => $ivrs]);

        $output->writeln(preg_replace('/^[ ]*/m', '', $content));
    }

}
