<?php

namespace App\Controller;

use App\Service\ClientIdentifier;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class DefaultController extends AbstractController
{
  #[Route('/', name: 'index')]
  public function index(Request $request, ClientIdentifier $clientIdentifier, ProjectRepository $projectRepository): Response
  {
    return $this->render('index.html.twig', [
      'controller_name' => 'DefaultController',
    ]);
  }
}
