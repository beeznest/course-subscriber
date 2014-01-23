<?php

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use \Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Extends FOS user bundle security controller.
 */
class StudentCheckController extends Controller
{
    private $usr;

    /**
     *
     */
    public function __construct()
    {
        //Get user
        //@TODO this is not working
        //@TODO can we do this nicer?
        #$this->usr = $this->get('security.context')->getToken()->getUser();
    }

    /**
     * Check function
     *
     * @return RedirectResponse
     */
    public function checkAction()
    {
        //check if user already accepted terms and conditions
        $usr = $this->get('security.context')->getToken()->getUser();
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
        } else {
            //if is first this the user connects, send him to choose page
            return $this->redirect('choose');
        }
        //return true as default so we can use this function as a check for other pages
        #return true;
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
        //this is not working
        $this->checkAction();

        //Get User
        $usr = $this->get('security.context')->getToken()->getUser();

        $content = $this->renderView(
            'ApplicationSonataUserBundle::choose.html.twig',
            array(
                'login' => $usr->getUsername(),
                'pass'  => sha1($usr->getPassword()),
            )
        );
        return new Response($content);
    }

    public function firstCourseAction()
    {
        $usr = $this->get('security.context')->getToken()->getUser();
        $usr->setStatus(4);  //selected first course

        //save object
        $em = $this->getDoctrine()->getManager();
        $em->persist($usr);
        $em->flush();
        return $this->redirect('http://vlearning.icpna.edu.pe/courses/COURSE1/index.php');
    }
    /**
     * Show terms and conditions page
     * Creates and process Terms and conditions Form
     * @return Response
     */
    public function termsAction(Request $request)
    {
        $usr = $this->get('security.context')->getToken()->getUser();

        //If terms already accepted
        if ($usr->getTerms()) {
            return $this->redirect('check');
        }

        //Create form
        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
            ->add('terms', 'checkbox')
            ->getForm();

        //Process Submit
        if ($request->getMethod() == 'POST') {
            $form->submit($request);

            $data = $form->getData();

            //If terms accepted
            if ($data['terms'] == 1) {
                //update object
                $usr->setTerms(1);
                $usr->setStatus(1);  //Logged in

                //save object
                $em = $this->getDoctrine()->getManager();
                $em->persist($usr);
                $em->flush();
            }

            return $this->redirect('check');
        }

        return $this->render('ApplicationSonataUserBundle::terms.html.twig', array('form' => $form->createView()));
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