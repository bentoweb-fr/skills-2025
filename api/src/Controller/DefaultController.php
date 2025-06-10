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

    // $client = $clientIdentifier->getClientFromRequest($request);

    // if (!$client) {
    //     return new JsonResponse(['error' => 'Unknown origin'], 403);
    // }

    // if ($client === 'client-a') {
    //     // logiques ou produits spécifiques pour A
    //     $txt = "CLIENT A";
    // } elseif ($client === 'client-b') {
    //     // logiques ou produits spécifiques pour B
    //     $txt = "CLIENT B";
    // }

    // return new JsonResponse(['test' => $txt]);

    $projects = $projectRepository->findAll();

    return $this->render('index.html.twig', [
      'controller_name' => 'DefaultController',
    ]);
  }
  /*
    #[Route('/api/', name: 'api_default')]
    public function api(Request $request, ClientIdentifier $clientIdentifier): Response
    {

        $client = $clientIdentifier->getClientFromRequest($request);

        if (!$client) {
            return new JsonResponse(['error' => 'Unknown origin'], 403);
        }
    
        if ($client === 'client-a') {
            // logiques ou produits spécifiques pour A
            $txt = "CLIENT A";
        } elseif ($client === 'client-b') {
            // logiques ou produits spécifiques pour B
            $txt = "CLIENT B";
        }
    
        return new JsonResponse(['test' => $txt]);

        // return $this->render('index.html.twig', [
        //     'controller_name' => 'DefaultController',
        //     'txt' => $txt
        // ]);
    }
    */
}
