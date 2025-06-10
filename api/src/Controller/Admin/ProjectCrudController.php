<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
// use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectCrudController extends CommonCrudController
{
  public function __construct(private AdminUrlGenerator $adminUrlGenerator) {}

  public static function getEntityFqcn(): string
  {
    return Project::class;
  }

  public function configureFields(string $pageName): iterable
  {
    return [
      // IdField::new('id'),
      TextField::new('title')
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
      IntegerField::new('year')
        ->setSortable(true)
        ->setRequired(true)
        ->setLabel('Année'),
      AssociationField::new('technologies', 'Technologies')
        ->setSortable(false)
        ->setRequired(false)
        ->setLabel('Technologies')
        ->formatValue(function ($value, $entity) {
          return implode(', ', $entity->getTechnologies()->map(
            fn($tech) => $tech->getName()
          )->toArray());
        }),
      TextareaField::new('shortDescription')
        ->setRequired(true)
        ->setLabel('Description courte')
        ->hideOnIndex(),
      TextareaField::new('longDescription')
        ->setRequired(false)
        ->setLabel('Description complémentaire')
        ->hideOnIndex()
    ];
  }

  // public function configureActions(Actions $actions): Actions
  // {
  //     return $actions
  //         ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
  //             return $action
  //                 ->setIcon('fa fa-trash')
  //                 ->setLabel(false);
  //         })
  //         ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
  //             return $action
  //                 ->setIcon('fa fa-pen-to-square')
  //                 ->setLabel(false);
  //         })
  //         ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
  //             return $action
  //                 ->setIcon('fa fa-plus')
  //                 ->setLabel(false);
  //         })
  //     ;
  // }

  public function configureCrud(Crud $crud): Crud
  {
    return $crud
      ->overrideTemplate('crud/index', 'Admin/Project/list.html.twig')
      ->overrideTemplate('crud/edit', 'Admin/Project/edit.html.twig')
      ->showEntityActionsInlined();
    /**
        | Vue EasyAdmin  | Nom du template pour `overrideTemplate()` |
        | -------------- | ----------------------------------------- |
        | Index (liste)  | `'crud/index'`                            |
        | Show (détail)  | `'crud/show'`                             |
        | Edit (édition) | `'crud/edit'`                             |
        | New (création) | `'crud/new'`                              |
        | Layout général | `'layout'`                                |
     */
  }
}
