<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comment::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user', 'Pseudo'),
            AssociationField::new('tutorial', 'Tutoriel'),
            IdField::new('id')->hideOnIndex(),
            TextField::new('comment', 'Commentaire'),
            DateField::new('createAt', 'Crée le')->hideOnForm(),
            DateField::new('updateAt', 'Maj')->hideOnForm(),

        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->setSearchFields(['id', 'comment', 'createAt', 'updateAt', 'user.pseudo', 'tutorial.title']);
    }
}
