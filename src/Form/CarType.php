<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Event\PreSubmitEvent;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\String\Slugger\AsciiSlugger;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Nom de la voiture"
            ])
            ->add('description', TextareaType::class, [
                "label" => "Description"
            ])
            ->add('prix_location', NumberType::class, [
                "label" => "Prix mensuel"
            ])
            ->add('prix_day', NumberType::class, [
                "label" => "Prix journalier"
            ])
            ->add('seat', ChoiceType::class, [
                "choices" => [
                    "1" => 1,
                    "2" => 2,
                    "3" => 3,
                    "4" => 4,
                    "5" => 5,
                    "6" => 6,
                    "7" => 7,
                    "8" => 8,
                    "9" => 9,
                ],
                "label" => "Nombre de places"
            ])
            ->add('gearbox', ChoiceType::class, [
                "choices" => [
                    "Manuelle" => "Manuelle",
                    "Automatique" => "Automatique"
                ],
                "label" => "Boîte de vitesse"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
