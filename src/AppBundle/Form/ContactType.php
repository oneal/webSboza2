<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
                'label' => 'Correo electr�nico',
                'required' => 'required',
                'attr' => array(
                    'placeholder' => 'Correo electr�nico'
                )
            ))
            ->add('mobile', TextType::class, array(
                'label' => 'M�vil',
                'required' => 'required',
                'attr' => array(
                    'placeholder' => 'M�vil'
                )
            ))
            ->add('curso', ChoiceType::class, array(
                'label' => 'Curso de interes',
                'required' => 'required',
                'choices'  => array(
                    'Curos1' => 'Curos1',
                    'Curos2' => 'Curos1',
                    'Curos3' => 'Curos1',
                ),

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
            'data_class' => 'AppBundle\Entity\Contact'
        ));
    }
}