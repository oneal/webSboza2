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

        $menu->addChild("frontend.title.our_center", array(
            'uri' => '#nuestro-centro',
        ));
        $menu->addChild("frontend.title.team", array(
            'uri' => '#nuestros-equipo',
        ));
        $menu->addChild("frontend.title.our_curses", array(
            'uri' => '#nuestros-cursos',
        ));
        $menu->addChild("frontend.title.news_home", array(
            'uri' => '#siempre-a-la-ultima',
        ));
        $menu->addChild("frontend.title.contact", array(
            'uri' => '#contacto',
        ));



        return $menu;
    }

    public function mainMenuMobile(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'hamburgler-menu-list'));

        $menu->addChild("frontend.title.our_center", array(
            'uri' => '#nuestro-centro',
        ));
        $menu->addChild("frontend.title.team", array(
            'uri' => '#nuestros-equipo',
        ));
        $menu->addChild("frontend.title.our_curses", array(
            'uri' => '#nuestros-cursos',
        ));
        $menu->addChild("frontend.title.news_home", array(
            'uri' => '#siempre-a-la-ultima',
        ));
        $menu->addChild("frontend.title.contact", array(
            'uri' => '#contacto',
        ));



        return $menu;
    }


}