<?php

namespace App\Form;

use App\Entity\Rules;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rule_param', TextType::class, [
                'property_path' => 'ruleParam',
            ])
            ->add('title', TextType::class, [
                'property_path' => 'title',
            ])
            ->add('discount_value', TextType::class, [
                'property_path' => 'discountValue',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rules::class
        ]);
    }
}
