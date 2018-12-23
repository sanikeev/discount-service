<?php

namespace App\Form;

use App\DTO\OrderDto;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('service', TextType::class, [
                'property_path' => 'service'
            ])
            ->add('gender', TextType::class, [
                'property_path' => 'gender'
            ])
            ->add('full_name', TextType::class, [
                'property_path' => 'fullName'
            ])
            ->add('phone', TextType::class, [
                'property_path' => 'phone'
            ])
            ->add('birthday', TextType::class, [
                'property_path' => 'birthday'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrderDto::class
        ]);
    }
}
