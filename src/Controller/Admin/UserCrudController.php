<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('pseudo', 'Pseudo'),
            EmailField::new('email', 'Email'),
            ImageField::new('imageFile')
                ->setFormType(VichImageType::class)->hideOnIndex(),
            TextField::new('password', 'Mot de passe')
            ->setFormType(PasswordType::class)->hideOnIndex(),
            ImageField::new('avatar', 'Avatar')->setBasePath($this->getParameter('file_avatar'))->hideOnForm(),
            DateField::new('createAt', 'Crée le')->hideOnForm(),
            DateField::new('updateAt', 'Maj')->hideOnForm(),
            EmailField::new('email', 'Email'),
            TextField::new('role', 'Rôle')->hideOnForm(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->setSearchFields(['id', 'pseudo', 'email', 'createAt', 'updateAt', 'email', 'role']);
    }

}
