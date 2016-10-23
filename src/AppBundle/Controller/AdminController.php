<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Entity\News;
use AppBundle\Entity\Page;
use AppBundle\Form\ContactType;
use AppBundle\Form\NewsType;
use AppBundle\Form\PageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request) {
        //Llamamos al servicio de autenticacion
        $authenticationUtils = $this->get('security.authentication_utils');

        // conseguir el error del login si falla
        $error = $authenticationUtils->getLastAuthenticationError();

        // ultimo nombre de usuario que se ha intentado identificar
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'admin/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }


    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request)
    {
        return $this->render("admin/admin.html.twig");
    }

    /**
     * @Route("/admin/pages", name="adminPages")
     */
    public function adminPagesAction(Request $request)
    {
        $webConfig = $this->get('webconfig');
        $pages = $webConfig->getPages();
        return $this->render("admin/pages.html.twig", array('pages' => $pages));
    }

    /**
     * @Route("/admin/pages/{id}", name="adminPage")
     */
    public function adminPageAction(Request $request, $id)
    {
        $webConfig = $this->get('webconfig');
        $page = $webConfig->getPageById($id);

        $modelPage = new Page();
        $form = $this->createForm(PageType::class, $modelPage);

        $modelPage->setTitle($page[0]->getTitle());
        $modelPage->setContent($page[0]->getContent());

        $form->setData($modelPage);

        $form->handleRequest($request);


        if($form->isValid()){
            $pageUpdate = $form->getData();
            $webConfig->updatePage($id, $pageUpdate);
        }

        return $this->render("admin/view_page.html.twig", array(
            'page' => $page,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin/page/create", name="adminCreatePage")
     */
    public function adminCreatePageAction(Request $request)
    {
        $webConfig = $this->get('webconfig');
        $modelPage = new Page();
        $modelPage->setContent('Introduzca el contenido de su pagina');
        $form = $this->createForm(PageType::class, $modelPage);
        $form->setData($modelPage);
        $form->handleRequest($request);

        if($form->isValid()){
            $pageUpdate = $form->getData();
            $webConfig->createPage($pageUpdate);
        }

        return $this->render("admin/view_page.html.twig", array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin/page/delete/{id}", name="adminDeletePage")
     */
    public function adminDeletePageAction(Request $request, $id)
    {
        $webConfig = $this->get('webconfig');
        $webConfig->deletePage($id);
        $pages = $webConfig->getPages();
        return $this->render("admin/pages.html.twig", array('pages' => $pages));
    }

    /**
     * @Route("/admin/news", name="adminNews")
     */
    public function adminNewsAction(Request $request)
    {
        $webConfig = $this->get('webconfig');
        $news = $webConfig->getNews();
        return $this->render("admin/news.html.twig", array('news' => $news));
    }

    /**
     * @Route("/admin/news/create", name="adminCreateNew")
     */
    public function adminCreateNewAction(Request $request)
    {
        $webConfig = $this->get('webconfig');
        $modelNew = new News();
        $modelNew->setDescription('Introduzca el contenido de su noticia');
        $form = $this->createForm(NewsType::class, $modelNew);
        $form->setData($modelNew);
        $form->handleRequest($request);

        if($form->isValid()){
            $newUpdate = $form->getData();
            $webConfig->createNew($newUpdate);
        }

        return $this->render("admin/view_news.html.twig", array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin/news/{id}", name="adminNew")
     */
    public function adminNewAction(Request $request, $id)
    {
        $webConfig = $this->get('webconfig');
        $new = $webConfig->getNewsById($id);

        $modelNew = new News();
        $form = $this->createForm(NewsType::class, $modelNew);

        $modelNew->setTitle($new[0]->getTitle());
        $modelNew->setDescription($new[0]->getDescription());
        $modelNew->setDate($new[0]->getDate());

        $form->setData($modelNew);
        $form->handleRequest($request);


        if($form->isValid()){
            $newUpdate = $form->getData();
            $webConfig->updateNew($id,$newUpdate);
        }

        return $this->render("admin/view_news.html.twig", array(
            'new' => $new,
            'form' => $form->createView()
        ));
    }



    /**
     * @Route("/admin/news/delete/{id}", name="adminDeleteNew")
     */
    public function adminDeleteNewAction(Request $request, $id)
    {
        $webConfig = $this->get('webconfig');
        $webConfig->deleteNew($id);
        $news = $webConfig->getNews();
        return $this->render("admin/news.html.twig", array('news' => $news));
    }







}
