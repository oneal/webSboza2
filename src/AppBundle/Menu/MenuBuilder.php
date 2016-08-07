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
        $menu->setChildrenAttributes(array('class'=>'nav navbar-nav'));

        $menu->addChild("home", array(
            'route' => 'homepage',
            'rootClass'=>'nav navbar-nav'
        ));

        foreach($categories as $category){
            $menu->addChild($category->getName(), array(
                'route' => 'entriesCategory',
                'routeParameters' => array(
                    'id' => $category->getId(),
                    'category' => $category->getName()
                )
            ));
        }

        return $menu;
    }

    public function mainMenuAdmin(FactoryInterface $factory, array $options){

        $menu = $factory->createItem("root");
        $menu->setChildrenAttributes(array('class' => 'nav nav-pills nav-stacked'));


        $menu->addChild('Home', array('route' => 'adminHompage'));
        $menu->addChild('Entradas', array('route' => 'adminEntries'));
        $menu->addChild('Categorias', array('route' => 'adminCategories'));
        /*$menu->addChild('Comentarios', array('comentarios' => ''));*/

        return $menu;


    }
}