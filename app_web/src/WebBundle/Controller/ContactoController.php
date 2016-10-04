<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactoController extends Controller
{
    public function contactoAction()
    {
    	$session = 1;
    	$em      = $this->getDoctrine()->getManager();

    	$banner = $em->getRepository('WebBundle:Banner')->findBy(array('activo' => 1 ));
    	
        return $this->render('WebBundle::contacto.html.twig', array(
        	'pagina' => 'contacto',
        	'session' => $session,
        	'banner' 	=> $banner
        	));
    }
}