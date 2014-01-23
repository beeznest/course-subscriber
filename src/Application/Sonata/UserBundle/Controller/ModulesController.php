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

class ModulesController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function indexAction()
    {
        $usr = $this->get('security.context')->getToken()->getUser();
        $adult = $usr->getAdult();
        //$class = ($adult) ? 'kids' : 'adult';
        //$modules = array();
        error_log(print_r($adult,1));

        if ($adult) {
            return $this->container->get('templating')->renderResponse('ApplicationSonataUserBundle::modules_kids.html.twig');
        } else {
            return $this->container->get('templating')->renderResponse('ApplicationSonataUserBundle::modules_kids.html.twig');
        }
    }
}