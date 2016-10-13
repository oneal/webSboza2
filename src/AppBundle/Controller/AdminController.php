<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
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
        return $this->render("admin/view_page.html.twig", array('page' => $page));
    }






}
