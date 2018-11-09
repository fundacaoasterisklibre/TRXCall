<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 01/02/2018
 * Time: 02:24
 */

namespace App\Command;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        $this
            ->setName('app:create-user')
            ->setDescription('Creates a new user.')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of the user.')
            ->setHelp('This command allows you to create a user...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        $username = $input->getArgument('username');
        $password = $input->getArgument('password');

        $encoder = $this->getContainer()->get('security.password_encoder');

        $user = new User();
        $user->setName($username);
        $user->setUsername($username);
        $password = $encoder->encodePassword($user, $password);
        $user->setPassword($password);

        $em = $this->getContainer()->get('doctrine.orm.default_entity_manager');

        $em->persist($user);
        $em->flush();

    }
}