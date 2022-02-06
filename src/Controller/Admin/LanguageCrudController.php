<?php

namespace App\Controller\Admin;

use App\Entity\Language;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class LanguageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Language::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name', 'Technologie'),
            ColorField::new('color', 'Couleur'),
            TextareaField::new('imageFile')
                ->setFormType(VichImageType::class)->hideOnIndex(),
            ImageField::new('image', 'Image')->setBasePath($this->getParameter('file_language'))->hideOnForm(),
            BooleanField::new('isValid'),
            DateField::new('createAt', 'Crée le')->hideOnForm(),
            DateField::new('updateAt', 'Maj')->hideOnForm(),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud

            ->setSearchFields(['id', 'name', 'color', 'image', 'isValid', 'createAt', 'updateAt']);
    }

}
