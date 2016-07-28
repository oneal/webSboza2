<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Nombre',
                'required' => 'required',
                'attr' =>array(
                    'placeholder' => 'Nombre'
                )
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Apellidos',
                'required' => 'required',
                'attr' => array(
                    'placeholder' => 'Apellidos'
                )
            ))
            ->add('email', TextType::class, array(
                'lable' => 'Correo electrónico',
                'required' => 'required',
                'attr' => array(
                    'placeholder' => 'Correo electrónico'
                )
            ))
            ->add('mobile', TextType::class, array(
                'label' => 'Móvil',
                'required' => 'required',
                'attr' => array(
                    'placeholder' => 'Móvil'
                )
            ))
            ->add('curso', EntityType::class, array(
                'label' => 'Curso de interes',
                'required' => 'required',
                'class' => 'AppBundle:Curso',
                'choice_label' => function($curso){
                    return $curso->getName();
                }

            ))
            ->add('observations', TextareaType::class, array(
                'label' => 'Observaciones',
                'required' => 'required',
                'attr' => array(
                    'placeholder' => 'Observaciones'
                )
            ))
            ->add('submit', SubmitType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Entries'
        ));
    }
}