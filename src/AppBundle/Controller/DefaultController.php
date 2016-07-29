<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $contactModel = new Contact();

        $form = $this->createForm(ContactType::class, $contactModel);

        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('oneal152@gmail.com')
                ->setTo('oneal152@gmail.com')
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        'Emails/Registration.html.twig', array(
                            'data' => $form->getData()
                        )
                    ),
                    'text/html'
                )->addPart('text/plain');

            $this->get('mailer')->send($message);
        }

        return $this->render('desktop/index.html.twig', array(
                'form' => $form->createView()
            )
        );
    }

    public function contactHomeAction(Request $request)
    {

    }

    public function cursosAction(Request $request)
    {
        $em = $this->getDoctrine()->getRepository('AppBundle:Cursos');
        $cursos = $em->findBy('name');

        return $cursos;

    }
}
