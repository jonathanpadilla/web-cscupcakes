<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NosotrosController extends Controller
{
    public function nosotrosAction()
    {
    	$session = 1;
    	
        return $this->render('WebBundle::nosotros.html.twig', array(
        	'id_body' => 'id=nosotros',
        	'session' => $session,
        	'pagina' => 'nosotros'
        	));
    }
}