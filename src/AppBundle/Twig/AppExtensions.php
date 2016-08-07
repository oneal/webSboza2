<?php
namespace AppBundle\Twig;

class AppExtensions extends \Twig_Extension{

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('date', array($this, 'dateFilter')),
        );
    }

    public function dateFilter()
    {
        \Monolog\Handler\error_log("hola");

        return null;
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }
}