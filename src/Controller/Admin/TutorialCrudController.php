<?php

namespace App\Controller\Admin;

use App\Entity\Tutorial;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TutorialCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tutorial::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextField::new('description', 'Description'),
            TextEditorField::new('content', 'Contenu'),
            AssociationField::new('author', 'auteur'),
            AssociationField::new('language', 'langage'),
            DateField::new('createAt', 'Crée le')->hideOnForm(),
            DateField::new('updateAt', 'Maj')->hideOnForm(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->setSearchFields(['title', 'description', 'content', 'author.pseudo', 'language.name', 'createAt', 'updateAt']);
    }
}
