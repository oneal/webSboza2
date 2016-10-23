<?php
/**
 * Created by PhpStorm.
 * User: oneal
 * Date: 20/10/16
 * Time: 18:02
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', HiddenType::class, array()
            )
            ->add('title', TextType::class, array(
                'label' => 'Titulo(*)',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('description', TextareaType::class, array(
                'label' => 'Cuerpo(*)',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('date', TextType::class, array(
                'label' => 'Fecha Publicacion(*)',
                'required' => 'required',
                'attr' => array(
                    'class' => 'form-control'
                )
            ))
            ->add('Enviar', SubmitType::class, array(
                'attr'=> array(
                    'class' => 'form-button'
                )
            ));
    }
}