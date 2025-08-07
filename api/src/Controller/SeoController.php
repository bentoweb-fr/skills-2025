<?php

namespace App\Controller;

use App\Attribute\DisableProfiler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[DisableProfiler]
final class SeoController extends AbstractController
{
  #[Route('/seo', name: 'seo_index')]
  public function index(): Response
  {
    return $this->render('seo/index.html.twig', [
      'test' => 'SEO Index',
    ]);
  }
}
