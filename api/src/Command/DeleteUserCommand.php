<?php

namespace App\Command;

use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Question\ConfirmationQuestion;

#[AsCommand(
  name: 'app:user:delete',
  description: 'Supprime un utilisateur en fonction de son email',
)]
class DeleteUserCommand extends Command
{
  public function __construct(
    private UserRepository $userRepository,
    private EntityManagerInterface $em
  ) {
    parent::__construct();
  }

  protected function configure(): void
  {
    $this
      ->addArgument('email', InputArgument::REQUIRED, 'Email de l’utilisateur à supprimer');
  }

  protected function execute(InputInterface $input, OutputInterface $output): int
  {
    $email = $input->getArgument('email');
    $user = $this->userRepository->findOneBy(['email' => $email]);

    if (!$user) {
      $output->writeln("<error>Utilisateur avec l'email \"$email\" introuvable.</error>");
      return Command::FAILURE;
    }

    $helper = $this->getHelper('question');
    /** @var \Symfony\Component\Console\Helper\QuestionHelper $helper */
    $question = new ConfirmationQuestion(
      "Voulez-vous vraiment supprimer l’utilisateur \"$email\" ? (y/N) ",
      false
    );

    if (!$helper->ask($input, $output, $question)) {
      $output->writeln("<comment>Suppression annulée.</comment>");
      return Command::SUCCESS;
    }

    $this->em->remove($user);
    $this->em->flush();

    $output->writeln("<info>Utilisateur \"$email\" supprimé avec succès.</info>");

    return Command::SUCCESS;
  }
}
