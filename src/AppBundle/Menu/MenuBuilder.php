<?php
/**
 * Created by PhpStorm.
 * User: oneal
 * Date: 28/05/16
 * Time: 12:54
 */
namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use \Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class MenuBuilder implements  ContainerAwareInterface {

    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild("Nuestro centro", array(
            'uri' => '#nuestro-centro',
        ));
        $menu->addChild("Nuestros cursos", array(
            'uri' => '#nuestros-cursos',
        ));
        $menu->addChild("Nuestros Profesores", array(
            'uri' => '#nuestros-profesores',
        ));
        $menu->addChild("Siempre a la última", array(
            'uri' => '#siempre-a-la-ultima',
        ));
        $menu->addChild("Contacto", array(
            'uri' => '#contacto',
        ));



        return $menu;
    }

    public function mainMenuMobile(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'hamburgler-menu-list'));

        $menu->addChild("Nuestro centro", array(
            'uri' => '#nuestro-centro',
        ));
        $menu->addChild("Nuestros cursos", array(
            'uri' => '#nuestros-cursos',
        ));
        $menu->addChild("Nuestros Profesores", array(
            'uri' => '#nuestros-profesores',
        ));
        $menu->addChild("Siempre a la última", array(
            'uri' => '#siempre-a-la-ultima',
        ));
        $menu->addChild("Contacto", array(
            'uri' => '#contacto',
        ));



        return $menu;
    }


}