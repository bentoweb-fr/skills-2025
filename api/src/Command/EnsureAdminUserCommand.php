<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
  name: 'app:ensure-admin-user',
  description: 'Crée ou met à jour l’utilisateur admin avec le mot de passe fourni.'
)]
class EnsureAdminUserCommand extends Command
{
  public function __construct(
    private EntityManagerInterface $em,
    private UserPasswordHasherInterface $passwordHasher
  ) {
    parent::__construct();
  }

  protected function configure(): void
  {
    $this
      ->addArgument('email', InputArgument::REQUIRED, 'Email de l’admin')
      ->addArgument('password', InputArgument::REQUIRED, 'Mot de passe de l’admin');
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $email = $input->getArgument('email');
    $plainPassword = $input->getArgument('password');

    $user = $this->em->getRepository(User::class)->findOneBy(['email' => $email]);
    if ($user) {
      $output->writeln("<info>Utilisateur admin existant trouvé, mise à jour du mot de passe...</info>");
      $user->setRoles(['ROLE_ADMIN']);
      $user->setPassword(
        $this->passwordHasher->hashPassword($user, $plainPassword)
      );
    } else {
      $output->writeln("<info>Création d’un nouvel utilisateur admin...</info>");
      $user = new User();
      $user->setEmail($email);
      $user->setRoles(['ROLE_ADMIN']);
      $user->setPassword(
        $this->passwordHasher->hashPassword($user, $plainPassword)
      );
      $this->em->persist($user);
    }
    $this->em->flush();
    $output->writeln("<info>Utilisateur admin prêt (email: $email).</info>");
    return Command::SUCCESS;
  }
}
