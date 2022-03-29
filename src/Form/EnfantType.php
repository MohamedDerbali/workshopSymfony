<?php

namespace App\Form;

use App\Entity\Enfant;
use App\Entity\Parentxd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
class EnfantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('addresse')
            ->add('dateNais', DateType::class)
            ->add('gender')
            ->add('nom')
            ->add('prenom')
            ->add('parents_id_user', EntityType::class, [
                // looks for choices from this entity
                'class' => Parentxd::class,
            
                // uses the User.username property as the visible option string
                'choice_label' => 'username',
            
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Enfant::class,
        ]);
    }
}
