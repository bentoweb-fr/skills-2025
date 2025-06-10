<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
  name: 'app:create-admin-user',
  description: 'Crée un utilisateur admin avec un mot de passe aléatoire.',
)]
class CreateAdminUserCommand extends Command
{
  public function __construct(
    private EntityManagerInterface $em,
    private UserPasswordHasherInterface $passwordHasher
  ) {
    parent::__construct();
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    /** @var \Symfony\Component\Console\Helper\QuestionHelper $helper */
    $helper = $this->getHelper('question');

    $question = new Question('Adresse email de l’admin: ');
    $email = $helper->ask($input, $output, $question);

    $existing = $this->em->getRepository(User::class)->findOneBy(['email' => $email]);
    if ($existing) {
      $output->writeln('<error>Un utilisateur avec cet email existe déjà.</error>');
      return Command::FAILURE;
    }

    // $plainPassword = bin2hex(random_bytes(5)); // 10 caractères aléatoires
    $plainPassword = $this->generateStrongPassword(16);
    $user = new User();
    $user->setEmail($email);
    $user->setRoles(['ROLE_ADMIN']);
    $user->setPassword(
      $this->passwordHasher->hashPassword($user, $plainPassword)
    );

    $this->em->persist($user);
    $this->em->flush();

    $output->writeln('<info>Utilisateur admin créé avec succès.</info>');
    $output->writeln('Email : ' . $email);
    $output->writeln('Mot de passe : <comment>' . $plainPassword . '</comment>');

    return Command::SUCCESS;
  }

  private function generateStrongPassword(int $length = 16): string
  {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+[]{}';
    $password = '';
    $maxIndex = strlen($chars) - 1;

    for ($i = 0; $i < $length; $i++) {
      $password .= $chars[random_int(0, $maxIndex)];
    }

    return $password;
  }
}
