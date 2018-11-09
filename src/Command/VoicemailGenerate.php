<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 15/06/17
 * Time: 18:58
 */

namespace App\Command;

use App\Entity\Branch;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManager;
use App\Agi\Base\AgiCustom;

class VoicemailGenerate extends ContainerAwareCommand
{

    protected function configure()
    {
        $this->setName('pbx:voicemail:generate')->setDescription('Gera configuração dos correios de voz');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $conn = $this->getContainer()->get('doctrine.orm.default_entity_manager');

        $branchs = $conn->getRepository(Branch::class)->findAll();

        $content = $this->getContainer()
            ->get('twig')
            ->render('voicemail.conf.twig', ['branchs' => $branchs]);

        $output->writeln(preg_replace('/^[ ]*/m', '', $content));
    }

}
