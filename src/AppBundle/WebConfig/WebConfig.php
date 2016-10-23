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

    public function getNews()
    {
        $news = $this->em->getRepository("AppBundle:News")->findAll();

        return $news;
    }

    public function getNewsById($id)
    {
        $new = $this->em->getRepository("AppBundle:News")->findBy(array('id' => $id));

        return $new;
    }

    public function createPage($page)
    {
        $this->em->persist($page);
        $this->em->flush();
    }

    public function createNew($new)
    {
        $this->em->persist($new);
        $this->em->flush();
    }

    public function updatePage($id, $pageUpdate)
    {
        $page = $this->em->getRepository("AppBundle:Page")->findBy(array('id' => $id));

        $page[0]->setTitle($pageUpdate->getTitle());
        $page[0]->setContent($pageUpdate->getContent());
        $this->em->flush();
    }



    public function updateNew($id, $newUpdate)
    {
        $new = $this->em->getRepository("AppBundle:News")->findBy(array('id' => $id));

        $new[0]->setTitle($newUpdate->getTitle());
        $new[0]->setDescription($newUpdate->getDescription());
        $new[0]->setDate($newUpdate->getDate());
        $this->em->flush();
    }

    public function deletePage($id)
    {
        $page = $this->em->getRepository("AppBundle:Page")->findBy(array('id' => $id));
        $this->em->remove($page[0]);
        $this->em->flush();
    }

    public function deleteNew($id)
    {
        $new = $this->em->getRepository("AppBundle:News")->findBy(array('id' => $id));
        $this->em->remove($new[0]);
        $this->em->flush();
    }

}