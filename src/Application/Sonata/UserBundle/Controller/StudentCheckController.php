<?php

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Extends FOS user bundle security controller.
 */
class StudentCheckController extends ContainerAware
{
    public function indexAction()
    {
        //check if we show, in this order: 
        #   terms and conditions
        #   link page (couse 1 or plex link)
        #   modulos page
        #return new RedirectResponse($this->generateUrl('homepage'));
        return $this->redirect('choose');
    }

    public function chooseAction()
    {
        return $this->container->get('templating')->renderResponse('ApplicationSonataUserBundle::choose.html.twig');
    }
    /**
    * Forwards the request to another controller.
    *
    * @param string $controller The controller name (a string like BlogBundle:Post:index)
    * @param array $path An array of path parameters
    * @param array $query An array of query parameters
    *
    * @return Response A Response instance
    */
    public function forward($controller, array $path = array(), array $query = array())
    {
        $path['_controller'] = $controller;
        $subRequest = $this->container->get('request')->duplicate($query, null, $path);

        return $this->container->get('http_kernel')->handle($subRequest, HttpKernelInterface::SUB_REQUEST);
    }

    /**
    * Returns a RedirectResponse to the given URL.
    *
    * @param string $url The URL to redirect to
    * @param integer $status The status code to use for the Response
    *
    * @return RedirectResponse
    */
    public function redirect($url, $status = 302)
    {
        return new RedirectResponse($url, $status);
    }
}