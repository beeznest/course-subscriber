<?php

namespace Application\Sonata\UserBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;


/**
 * Extends FOS user bundle security controller.
 */

class ModulesController extends ContainerAware
{
    public function indexAction()
    {
        return $this->container->get('templating')->renderResponse('ApplicationSonataUserBundle::modules.html.twig');
    }
}