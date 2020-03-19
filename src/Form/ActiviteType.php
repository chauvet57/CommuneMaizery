<?php

namespace App\Form;


use App\Entity\Type;
use App\Entity\Activite;
use App\Form\ActiviteType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Titre', TextType::class)
            ->add('Description', TextareaType::class)
            ->add('Date_debut', DateType::class,[
                'format' => 'd-M-y'
            ])
            ->add('Date_fin', DateType::class,[
                'format' => 'd-M-y'
            ])
            ->add('imageFile', FileType::class,[
                'required' => false 
            ])
            ->add('Type', EntityType::class,[
                'class' => Type::class,
                'choice_label' => 'Nom'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Activite::class
        ]);
    }

    
}
