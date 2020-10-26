<?php

namespace App\Form;

use App\Entity\Language;
use App\Entity\Tutorial;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TutorialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => ['class' => 'mdl-textfield__input'],
                'label_attr' => ['class' => 'mdl-textfield__label'],
            ])

            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['class' => 'mdl-textfield__input'],
                'label_attr' => [
                    'class' => 'mdl-textfield__label',
                    'rows' => 3,
                ],
            ])
            ->add('content', CKEditorType::class, [
                'label' => 'Contenu :',
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
                'label' => 'Technologie :',
                'class' => Language::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tutorial::class,
        ]);
    }
}
