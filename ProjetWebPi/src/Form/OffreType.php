<?php

namespace App\Form;

use App\Entity\Offre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\User;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomoffre')
            ->add('datedebut',DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'data' => new \DateTime("yesterday")
            ])
            ->add('datefin',DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'data' => new \DateTime("yesterday")
            ])
            ->add('description',TextareaType::class)
            ->add('imgsrc',FileType::class , ['mapped'=> false])
            ->add('couleur',ColorType::class)
            ->add('typeoffre', ChoiceType::class, [
                'choices' => [
                    'Offre Créateur de contenu' => [
                        'Demande Sponsoring' => 'stock_Demande Sponsoring',
                        'Demande Partenaire' => 'stock_Demande Partenaire',
                    ],
                    'Offre Sponsor' => [
                        'Besoin de CC pour contrat' => 'stock_Besoin de CC pour contrat',
                        'Besoin de CC pour Publicite' => 'stock_Besoin de CC pour Publicite',
                        'Besoin de CC pour evennement' => 'stock_Besoin de CC pour evennement',],],])

            ->add('cincreateuroffre',EntityType::class, [
        'class' => User::class,
        'choice_label' => 'cin',
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
