<?php

namespace MauticPlugin\TabdealTaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fieldOne', TextType::class, ['label' => 'Field One'])
            ->add('fieldTwo', TextType::class, ['label' => 'Field Two'])
            ->add('isChecked', CheckboxType::class, ['label' => 'Check me', 'required' => false]);
    }
}