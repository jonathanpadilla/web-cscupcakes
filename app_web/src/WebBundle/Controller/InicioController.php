<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InicioController extends Controller
{
    public function inicioAction()
    {
    	$session = 1;

        return $this->render('WebBundle::inicio.html.twig', array(
        	'pagina' => 'inicio',
        	'session' => $session
        	));
    }
}