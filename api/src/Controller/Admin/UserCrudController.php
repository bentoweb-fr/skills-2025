<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
  public static function getEntityFqcn(): string
  {
    return User::class;
  }

  public function configureFields(string $pageName): iterable
  {
    return [
      // IdField::new('id'),
      // TextField::new('title'),
      // TextEditorField::new('description'),
      EmailField
        ::new('email')
        ->setRequired(true)
        ->setLabel('Email'),
      TextField::new('password')
        ->setRequired(true)
        ->setLabel('Mot de passe')
      // ->setFormTypeOption('autocomplete', 'off')
    ];
  }
}
