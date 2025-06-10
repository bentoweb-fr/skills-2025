<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

abstract class CommonCrudController extends AbstractCrudController
{
  public function configureCrud(Crud $crud): Crud
  {
    return $crud
      // ->overrideTemplates([
      // ])
      // ->showEntityActionsInlined()
    ;
  }

  public function configureActions(Actions $actions): Actions
  {
    return $actions
      ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
        return $action
          ->setIcon('fa fa-trash')
          ->setLabel(false);
      })
      ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
        return $action
          ->setIcon('fa fa-pen-to-square')
          ->setLabel(false);
      })
      ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
        return $action
          ->setIcon('fa fa-plus')
          ->setLabel(false);
      })
    ;
  }
}
