<?php

namespace AppBundle\WebConfig;

class WebConfig {

    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function getPages()
    {
        $pages = $this->em->getRepository("AppBundle:Page")->findAll();

        return $pages;
    }

    public function getPageByTitle($title)
    {
        $page = $this->em->getRepository("AppBundle:Page")->findBy(array('title' => $title));

        return $page;
    }

    public function getPageById($id)
    {
        $page = $this->em->getRepository("AppBundle:Page")->findBy(array('id' => $id));

        return $page;
    }

    public function getNews($number)
    {

    }
}