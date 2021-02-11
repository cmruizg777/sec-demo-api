<?php

namespace App\Command;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'app:create-user';
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $enc)
    {
        $this->entityManager = $entityManager;
        $this->encoder = $enc;
        parent::__construct();
    }
    protected function configure()
    {
        $this
            ->setDescription('Comando para crear un usuario desde consola')
            ->addArgument('name', InputArgument::REQUIRED, 'Nombre del usuario')
            ->addArgument('email', InputArgument::REQUIRED, 'Email del usuario')
            ->addArgument('username', InputArgument::REQUIRED, 'Username del usuario')
            ->addArgument('password', InputArgument::REQUIRED, 'Password del usuario')
            ->addOption('admin', null, InputOption::VALUE_NONE, 'Indica si el nuevo usuario es administrador')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $name = $input->getArgument('name');
        $email = $input->getArgument('email');
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');

        if (!$name) {
            $io->error(sprintf('El atributo nombre es requerido'));
            return 1;
        }
        if (!$username) {
            $io->error(sprintf('El atributo username es requerido'));
            return 1;
        }
        if (!$email) {
            $io->error(sprintf('El atributo email es requerido'));
            return 1;
        }
        if (!$password) {
            $io->error(sprintf('El atributo password es requerido'));
            return 1;
        }
        $encoder = $this->encoder;
        $em = $this->entityManager;

        $user = new Usuario();
        $user->setName($name);
        $user->setEmail($email);
        $user->setUsername($username);
        $user->setPlainPassword($password);
        $user->setPassword($encoder->encodePassword($user, $password));
        $admin = null;
        if ($input->getOption('admin')) {
            $user->setRoles(['ROLE_ADMIN']);
        }
        $em->persist($user);
        $em->flush();

        $io->note(sprintf('Nombre: %s', $name));
        $io->note(sprintf('Email: %s', $email));
        $io->note(sprintf('Username: %s', $username));
        $io->note(sprintf('Password: %s', $password));

        $io->success('Usuario creado correctamente');
        return 0;
    }
}
