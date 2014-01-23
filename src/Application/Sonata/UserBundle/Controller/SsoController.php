<?php
/**
 * Created by PhpStorm.
 * User: dbarreto
 * Date: 22/01/14
 * Time: 04:09 PM
 */
namespace Application\Sonata\UserBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;

//Dentro del controlador Bundle\Controller\SsoController.php agregamos el siguiente action
class SsoController extends ContainerAware
{
    public function indexAction(){
        return $this->container->get('templating')->renderResponse('ApplicationSonataUserBundle::sso_chamilo.html.twig');
    }
}