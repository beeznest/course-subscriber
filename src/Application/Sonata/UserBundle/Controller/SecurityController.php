<?php

namespace Application\Sonata\UserBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;

/**
 * Extends FOS user bundle security controller.
 */
class SecurityController extends BaseController
{
    /**
     * Overrides to use our template.
     *
     * For some reason upstream do not extends layout template, so do it manually here.
     */
    protected function renderLogin(array $data)
    {
        $template = sprintf('ApplicationSonataUserBundle:Security:login.html.%s', $this->container->getParameter('fos_user.template.engine'));

        return $this->container->get('templating')->renderResponse($template, $data);
    }
}
