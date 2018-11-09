<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:58
 */

namespace App\Command;

use App\Entity\Config\AsteriskConf;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManager;
use App\Agi\Base\AgiCustom;

class ConfigsConfGenerate extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('pbx:config:generate')->setDescription('Gera configuração do asterisk')
            ->addArgument('class', InputArgument::REQUIRED, 'Classe de consulta.');;
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $class = 'App\\Entity\\Config\\' . $input->getArgument('class');

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');

        $configs = $em->getRepository($class)
            ->createQueryBuilder('config')
            ->orderBy('config.context')
            ->getQuery()
            ->getResult();

        $content = $this->getContainer()
            ->get('twig')
            ->render('configs.conf.twig', ['configs' => $configs]);

        $output->writeln(preg_replace('/^[ ]*/m', '', $content));
    }


}
