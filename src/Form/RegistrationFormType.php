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
use Symfony\Component\Validator\Constraints\NotCompromisedPassword;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'mdl-textfield__input'],
                'label_attr' => ['class' => 'mdl-textfield__label'],
            ])
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo',
                'attr' => ['class' => 'mdl-textfield__input'],
                'label_attr' => ['class' => 'mdl-textfield__label'],
            ])
            ->add('plainPassword', RepeatedType::class, array(
                    'type' => PasswordType::class,
                    'first_options' => array('label' => 'Mot de passe :',
                    'attr' => ['class' => 'mdl-textfield__input'],
                'label_attr' => ['class' => 'mdl-textfield__label'],
                    ),
                    'second_options' => array('label' => 'Confirmer votre mot de passe :',
                        'attr' => ['class' => 'mdl-textfield__input'],
                        'label_attr' => ['class' => 'mdl-textfield__label'],
                        ),
                    'mapped' => false,
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Veuillez saisir un mot de passe.',
                        ]),
                        new Length([
                            'min' => 8,
                            'minMessage' => 'Votre mot de passe doit contenir {{ limit }} caractères minimum.',
                            // max length allowed by Symfony for security reasons
                            'max' => 4096,
                        ]),
                        new Regex([
                            'pattern' => "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*{}_]{8,}$/",
                            'match' => true,
                            'message' => "Le mot de passe doit contenir une majuscule, une minuscule et un chiffre."
                        ]),
                        new NotCompromisedPassword([
                            'message' => "Ce mot de passe est compromis."
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
