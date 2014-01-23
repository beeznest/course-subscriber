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
        //Get user
        //@TODO can we to this nicer?
        $usr= $this->get('security.context')->getToken()->getUser();

        //check if user already accepted terms and conditions
        $terms = $usr->getTerms();
        if (empty($terms)) {
            return $this->redirect('terms');
        }

        //if is not first this the user connects, send him to modules page
        //status 3 = entered PLEX
        //status 4 = entered modules
        $status = $usr->getStatus();
        if (in_array($status, array(3,4))) {
            return $this->redirect('modules');
        }
        //if is first this the user connects, send him to choose page
        return $this->redirect('choose');

        #   link page (course 1 or plex link)
        #   modulos page
        #return new RedirectResponse($this->generateUrl('homepage'));
        /*$student = $this->getDoctrine()
        ->getRepository('ApplicationSubscriberBundle:Student')
        ->find('2');*/
        //error_log(print_r($student,1));

        #return $this->redirect('choose');
    }

    /**
     * @return Response
     */
    public function chooseAction()
    {
        $content = $this->renderView('ApplicationSonataUserBundle::choose.html.twig');
        return new Response($content);
    }

    /**
     * @return Response
     */
    public function termsAction()
    {
        $content = $this->renderView('ApplicationSonataUserBundle::terms.html.twig');
        return new Response($content);
    }

    /**
     * @param Request $request
     * @return Response
     */
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
    
    /*public function loginCheckAction()
    {
        $content = $this->renderView('ApplicationSonataUserBundle::student_login.html.twig');
        return new Response($content);
    }*/
 
}