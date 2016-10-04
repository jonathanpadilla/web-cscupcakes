<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function menuAction()
    {
    	$session = 1;
    	$em      = $this->getDoctrine()->getManager();

    	$banner = $em->getRepository('WebBundle:Banner')->findBy(array('activo' => 1 ));
    	
        return $this->render('WebBundle::menu.html.twig', array(
        	'pagina' => 'menu',
        	'session' => $session,
        	'banner'	=> $banner
        	));
    }
}