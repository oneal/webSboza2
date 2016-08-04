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
        $form = $this->contactHome($request);

        if($form->isSubmitted()){
            return $this->redirectToRoute('thanks');
        }

        return $this->render('desktop/index.html.twig', array(
                'form' => $form->createView()
            )
        );
    }

    public function contactHome(Request $request)
    {
        $contactModel = new Contact();

        $form = $this->createForm(ContactType::class, $contactModel);

        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

            /*$message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom($form->getData()->getEmail())
                ->setTo('info@amcinformatica.com')
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        'Emails/contact.html.twig', array(
                            'data' => $form->getData()
                        )
                    ),
                    'text/html'
                )->addPart('text/plain');
                mail()
            $this->get('mailer')->send($message);*/

            $headers = "From: ".$form->getData()->getEmail();

            mail("info@sboza2.com","Solicitud Curso sboza2",
                utf8_decode(strip_tags($this->renderView(
                'Emails/contact.html.twig', array(
                    'data' => $form->getData()
                )
            ))),$headers);

        }

        return $form;

    }

    /**
     * @Route("/gracias", name="thanks")
     */

    public function thanksAction(Request $request){
        return $this->render('desktop/thanks.html.twig');
    }

    public function cursosAction(Request $request)
    {
        $em = $this->getDoctrine()->getRepository('AppBundle:Cursos');
        $cursos = $em->findBy('name');

        return $cursos;

    }
}
