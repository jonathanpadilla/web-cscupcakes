<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactoController extends Controller
{
    public function contactoAction()
    {
    	$session = 1;
    	
        return $this->render('WebBundle::contacto.html.twig', array(
        	'pagina' => 'contacto',
        	'session' => $session
        	));
    }
}