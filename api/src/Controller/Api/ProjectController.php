<?php

namespace App\Controller\Api;

use App\Repository\ProjectRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ProjectController extends AbstractController
{
  #[Route('/api2/projects', name: 'api_projects')]
  public function index(ProjectRepository $projectRepository): JsonResponse
  {
    return $this->json(
      $projectRepository->findAll(),
      200,
      [],
      ['groups' => 'project:read']
    );
  }
}
