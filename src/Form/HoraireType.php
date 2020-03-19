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
                'choices'=> $this->getChoicesMatin()
                ] )
            ->add('heureMatinFermeture',ChoiceType::class,[
                'choices'=> $this->getChoicesMatin()
                ] )
            ->add('heureApresMidiOuverture',ChoiceType::class,[
                'choices'=> $this->getChoicesApMidi()
                ] )
            ->add('heureApresMidiFermeture',ChoiceType::class,[
                'choices'=> $this->getChoicesApMidi()
                ] )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Horaire::class,
        ]);
    }

    private function getChoicesMatin()
    {
        $choices = Horaire::HEURE_MATIN;
        $output = [];
        foreach($choices as $k => $v){
            $output[$v] = $k;
        }
        return $output;
    }
    private function getChoicesApMidi()
    {
        $choices = Horaire::HEURE_AP_MIDI;
        $output = [];
        foreach($choices as $k => $v){
            $output[$v] = $k;
        }
        return $output;
    }
}
