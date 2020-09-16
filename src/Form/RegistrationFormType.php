<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email :'
            ])
            ->add('pseudo', TextType::class, [
                'label' => 'pseudo :',
            ])
            ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options' => array('label' => 'Mot de passe :'),
                    'second_options' => array('label' => 'Confirmer votre mot de passe :'),
                    'mapped' => false,
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Rentrer un mot de passe',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Votre mot de passe doit contenir {{ limit }} charactères minimum',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ])
                    ])
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
