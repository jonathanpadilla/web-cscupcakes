<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InicioController extends Controller
{
    public function inicioAction()
    {
    	$session = 1;

        return $this->render('WebBundle::inicio.html.twig', [
        	'pagina' => 'inicio',
        	'session' => $session
        	]);
    }
}