<?php

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
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
                'label' => 'Nombre(*)',
                'required' => 'required',
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Apellidos(*)',
                'required' => 'required',
            ))
            ->add('email', TextType::class, array(
                'label' => 'Correo electrónico(*)',
                'required' => 'required',
            ))
            ->add('mobile', TextType::class, array(
                'label' => 'Móvil(*)',
                'required' => 'required',
            ))
            ->add('curso', ChoiceType::class, array(
                'label' => 'Curso de interes(*)',
                'required' => 'required',
                'choices'  => array(
                    'Curso de diseño gráfico y diseño web ' => 'Curso de diseño gráfico y diseño web',
                    'Curso superior de diseño editorial, publicitario y diseño web (En proceso de omologación)' => 'Curso superior de diseño editorial, publicitario y diseño web (En proceso de omologación)',
                    'Máster en diseño gráfico (En proceso de omologación)' => 'Máster en diseño gráfico (En proceso de omologación)',
                    'Curso de motion graphics (En proceso de omologación)' => 'Curso de motion graphics (En proceso de omologación)',
                    'Curso superior de programación y desarrollo de aplicaciones web' => ' Curso superior de programación y desarrollo de aplicaciones web',
                    'Curso de videojuegos para dispositivos moviles' => 'Curso de videojuegos para dispositivos moviles',
                    'Master en concept y grafismo para videojuegos con zbrush' => 'Master en concept y grafismo para videojuegos con zbrush',
                    'Grado profesional en cine de animacion 3D, videojuegos e ilustración' => 'Grado profesional en cine de animacion 3D, videojuegos e ilustración',
                    'Master en infoarquitectura 3D e interiores' => 'Master en infoarquitectura 3D e interiores',
                    'Máster en creación de portfolio' => 'Máster en creación de portfolio',
                    'Curso superior de fotografía profesional' => 'Curso superior de fotografía profesional',
                    'Curso de caracterización y FX' => 'Curso de caracterización y FX',
                    'Curso de ilustración editorial y digital (En proceso de omologación)' => 'Curso de ilustración editorial y digital (En proceso de omologación)',
                    'Curso de dibujo para tatuadores' => 'Curso de dibujo para tatuadores',
                    'Curso de cómic' => 'Curso de cómic'

                ),

            ))
            ->add('observations', TextareaType::class, array(
                'label' => 'Observaciones(*)',
                'required' => 'required',
            ))
            ->add('Enviar', SubmitType::class, array(
                'attr'=> array(
                    'class' => 'form-button'
                )
            ));

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