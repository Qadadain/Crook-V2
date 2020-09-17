<?php

namespace App\Form;

use App\Entity\Language;
use App\Entity\Sheet;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SheetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
            ])
            ->add('description', TextType::class, [
                'label' => 'Description'
            ])
            ->add('content', CKEditorType::class, [
                'config' => [
                    'toolbar' => 'standard',
                    'extraPlugins' => 'codesnippet',
                    'codeSnippet_theme' => 'monokai',
                ],
                'plugins' => [
                    'codesnippet' => [
                        'path' => '/build/ckeditor/extra-plugins/codesnippet/',
                        'filename' => 'plugin.js',
                    ],
                ],
            ])
            ->add('language', EntityType::class, [
                'class' => Language::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sheet::class,
        ]);
    }
}
