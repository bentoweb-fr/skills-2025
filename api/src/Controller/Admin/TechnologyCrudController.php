<?php

namespace App\Controller\Admin;

use App\Entity\Technology;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class TechnologyCrudController extends CommonCrudController
{
  public function __construct(private AdminUrlGenerator $adminUrlGenerator) {}

  public static function getEntityFqcn(): string
  {
    return Technology::class;
  }

  public function configureFields(string $pageName): iterable
  {
    return [
      TextField::new('name')
        ->setSortable(true)
        ->setRequired(true)
        ->formatValue(function ($value, $entity) {
          $url = $this->adminUrlGenerator
            ->setController(self::class)
            ->setAction('edit')
            ->setEntityId($entity->getId())
            ->generateUrl();
          return sprintf('<a href="%s">%s</a>', $url, $value);
        }),
    ];
  }

  public function configureCrud(Crud $crud): Crud
  {
    return $crud
      ->overrideTemplate('crud/edit', 'Admin/Technology/edit.html.twig')
      ->showEntityActionsInlined();
  }

  // public function configureActions(Actions $actions): Actions
  // {

  //     $actions = parent::configureActions($actions);

  // $viewInvoice = Action::new('viewInvoice', 'Invoice', 'fa fa-file-invoice')
  //     ->linkToUrl('/')
  // ->createAsGlobalAction()
  // ;

  // return $actions

  // $viewPayments = Action::new('payments')
  //     ->setLabel(function () {
  //         return "test";
  // return \count($invoice->getPayments()) . ' payments';
  // });

  // return $actions
  // ->add(Crud::PAGE_INDEX, $viewInvoice)
  // ->add(Crud::PAGE_EDIT, $viewInvoice)
  // ->add(Crud::PAGE_INDEX, Action::DETAIL)

  // ->addBatchAction(Action::new('approve', 'Approve Users')
  //     ->linkToCrudAction('approveUsers')
  //     ->addCssClass('btn btn-primary')
  //     ->setIcon('fa fa-user-check'))

  // ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
  //     return $action->setIcon('fa fa-file-alt')->setLabel(false);
  // })
  // ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
  //     return $action->setIcon('fa fa-file-alt')->setLabel(false);
  // })
  // ->remove(Crud::PAGE_DETAIL, Action::NEW)
  // ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
  //     return $action
  //         ->addCssClass('btn btn-primary')
  //         ->setIcon('fa fa-pencil')
  //         ->setLabel(false);
  // })
  // ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
  //     return $action
  //         // ->addCssClass('btn btn-danger')
  //         ->setIcon('fa fa-trash')
  //         ->setLabel(false);
  // })
  // ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
  //     return $action
  //         // ->addCssClass('btn btn-danger')
  //         ->setIcon('fa fa-pen-to-square')
  //         ->setLabel(false);
  // })
  // ->setPermission(Action::DELETE, 'ROLE_ADMIN')
  // ->remove(Crud::PAGE_INDEX, Action::DETAIL);
  // ->add(Crud::PAGE_INDEX, $viewPayments)
  // ->showEntityActionsInlined()
  //     ;
  // }
}
