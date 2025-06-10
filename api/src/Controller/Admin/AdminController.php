<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Entity\Technology;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class AdminController extends AbstractDashboardController
{
  public function index(): Response
  {
    // $url = $this->container->get(AdminUrlGenerator::class)
    //     ->setController(ProjectCrudController::class)
    //     ->generateUrl();

    // return $this->redirect($url);

    return $this->redirectToRoute('admin_project_index');

    // return parent::index();

    // Option 1. You can make your dashboard redirect to some common page of your backend
    //
    // 1.1) If you have enabled the "pretty URLs" feature:
    //
    // 1.2) Same example but using the "ugly URLs" that were used in previous EasyAdmin versions:
    // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
    // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

    // Option 2. You can make your dashboard redirect to different pages depending on the user
    //
    // if ('jane' === $this->getUser()->getUsername()) {
    //     return $this->redirectToRoute('...');
    // }

    // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
    // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
    //
    // return $this->render('some/path/my-dashboard.html.twig');
  }

  public function configureDashboard(): Dashboard
  {
    return Dashboard::new()
      ->setTitle('Admin Skills2025');
  }

  public function configureMenuItems(): iterable
  {
    yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

    // yield MenuItem::subMenu('Projets', 'fas fa-folder')->setSubItems([
    //     MenuItem::linkToCrud('Tous les projets', 'fas fa-list', Project::class),
    //     MenuItem::linkToCrud('Créer un projet', 'fas fa-plus', Project::class)->setAction('new'),
    // ]);

    // yield MenuItem::subMenu('Technologies', 'fas fa-folder')->setSubItems([
    //     MenuItem::linkToCrud('Toutes les technologies', 'fas fa-list', Technology::class),
    //     MenuItem::linkToCrud('Créer une technologie', 'fas fa-plus', Technology::class)->setAction('new'),
    // ]);

    yield MenuItem::linkToCrud('Projets', 'fas fa-folder', Project::class);
    yield MenuItem::linkToCrud('Technologies', 'fas fa-folder', Technology::class);
  }
}
