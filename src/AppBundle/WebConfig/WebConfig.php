<?php

namespace AppBundle\WebConfig;

class WebConfig {

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getPages()
    {
        $pages = $this->$em->getRepository("AppBundle:Page")->findAll();

        return $pages;
    }
}