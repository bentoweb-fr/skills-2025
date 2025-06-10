<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

final class LoginController extends AbstractController
{
  #[Route('/login', name: 'admin_login')]
  public function index(AuthenticationUtils $authenticationUtils): Response
  {
    // Get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // Last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();

    return $this->render('Admin/login.html.twig', [
      'last_username' => $lastUsername,
      'error' => $error,
    ]);
  }

  #[Route('/logout', name: 'logout')]
  public function logout(AuthenticationUtils $authenticationUtils): Response
  {
    // Controller can be blank: it will never be called!
    // throw new \Exception('Don\'t forget to activate logout in security.yaml');
    return $this->redirectToRoute('admin_login');
  }
}
