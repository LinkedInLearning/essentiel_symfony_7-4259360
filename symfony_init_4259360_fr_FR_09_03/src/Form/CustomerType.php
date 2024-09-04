<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le champ nom ne doit pas être vide'
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 10,
                        'minMessage' => 'La longueur du nom doit être au minimum de 2 caractères',
                        'maxMessage' => 'La longueur du nom doit être au maximum  de 10 caractères',
                ])
                ]
            ])
            ->add('prenom', TextType::class, [
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le champ prenom ne doit pas être vide'
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 10,
                        'minMessage' => 'La longueur du prenom doit être au minimum de 2 caractères',
                        'maxMessage' => 'La longueur du prenom doit être au maximum  de 10 caractères',
                ])
                ]
            ])
            ->add('email', EmailType::class, [
                'required' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le champ email ne doit pas être vide'
                    ]),
                    new Email([
                        'message' => 'Le champ email n\'est pas valide'
                    ])
                ]
            ])
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
