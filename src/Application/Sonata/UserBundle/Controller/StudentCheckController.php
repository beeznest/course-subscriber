<?php

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;


/**
 * Extends FOS user bundle security controller.
 */
class StudentCheckController extends Controller
{
    public function indexAction()
    {
        //check if we show, in this order: 
        #   terms and conditions
        #   link page (couse 1 or plex link)
        #   modulos page
        #return new RedirectResponse($this->generateUrl('homepage'));
        /*$student = $this->getDoctrine()
        ->getRepository('ApplicationSubscriberBundle:Student')
        ->find('2');*/
        //error_log(print_r($student,1));
        return $this->redirect('choose');
    }

    public function chooseAction()
    {
        $content = $this->renderView('ApplicationSonataUserBundle::choose.html.twig');
        return new Response($content);
    }

    public function loginAction(Request $request)
    {
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'ApplicationSonataUserBundle::student_login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }
    
    public function loginCheckAction()
    {
        $content = $this->renderView('ApplicationSonataUserBundle::student_login.html.twig');
        return new Response($content);
    }
 
}