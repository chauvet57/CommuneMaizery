<?php

namespace App\Form;

use App\Entity\Horaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HoraireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Jour',TextType::class,[
                'disabled' => true
            ])
            ->add('heureMatinOuverture',ChoiceType::class,[
                'choices' => [
                    '8' => '8',
                    '8 h 30' =>' 8 h 30'
                ]
            ])
            ->add('heureMatinFermeture',TextType::class)
            ->add('heureApresMidiOuverture',TextType::class)
            ->add('heureApresMidiFermeture',TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Horaire::class,
        ]);
    }
}
