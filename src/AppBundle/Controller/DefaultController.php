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

    /**
     * @Route("/master-disenio-editorial-publicitario-disenio-web", name="masterEditorialDesign")
     */

    public function masterEditorialDesignAction(Request $request){
        $form = $this->contactHome($request);

        if($form->isSubmitted()){
            return $this->redirectToRoute('thanks');
        }

        return $this->render('desktop/courses/master_editorial_design.html.twig', array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/curso-superior-disenio-grafico", name="superiorGgraphicDesign")
     */

    public function superiorGgraphicDesignAction(Request $request){
        $form = $this->contactHome($request);

        if($form->isSubmitted()){
            return $this->redirectToRoute('thanks');
        }

        return $this->render('desktop/courses/superior_graphic_design.html.twig', array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/curso-motion-graphics", name="cursoMotionGraphics")
     */

    public function cursoMotionGraphicsAction(Request $request){
        $form = $this->contactHome($request);

        if($form->isSubmitted()){
            return $this->redirectToRoute('thanks');
        }

        return $this->render('desktop/courses/course_motion_graphics.html.twig', array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/curso-superior-de-ilustracion-digital-y-tradicional", name="courseIlustrationDigitalTraditional")
     */

    public function courseIlustrationDigitalTraditionalAction(Request $request){
        $form = $this->contactHome($request);

        if($form->isSubmitted()){
            return $this->redirectToRoute('thanks');
        }

        return $this->render('desktop/courses/course_ilustration_digital_traditional.html.twig', array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/curso-superior-fotografia", name="superiorPhotografic")
     */

    public function superiorPhotograficAction(Request $request){
        $form = $this->contactHome($request);

        if($form->isSubmitted()){
            return $this->redirectToRoute('thanks');
        }

        return $this->render('desktop/courses/superior_photography.html.twig', array(
                'form' => $form->createView()
            )
        );
    }

    /**
     * @Route("/curso-caracterizacon-fx", name="courseCharacterizationFx")
     */

    public function courseCharacterizationFxAction(Request $request){
        $form = $this->contactHome($request);

        if($form->isSubmitted()){
            return $this->redirectToRoute('thanks');
        }

        return $this->render('desktop/courses/course_characterization_fx.html.twig', array(
                'form' => $form->createView()
            )
        );
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

    public function contactHome(Request $request)
    {
        $contactModel = new Contact();

        $form = $this->createForm(ContactType::class, $contactModel);

        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($form->getData());
            $em->flush();

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
}
