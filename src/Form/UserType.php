<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'mdl-textfield__input'],
                'label_attr' => [
                    'class' => 'mdl-textfield__label',
                ],
            ])

            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo',
                'attr' => ['class' => 'mdl-textfield__input'],
                'label_attr' => [
                    'class' => 'mdl-textfield__label',
                ],
            ])

            ->add('avatar', TextType::class, [
                'label' => 'Pseudo Github',
                'attr' => ['class' => 'mdl-textfield__input'],
                'label_attr' => [
                    'class' => 'mdl-textfield__label',
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
