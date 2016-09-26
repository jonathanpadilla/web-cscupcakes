<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

    // FUNCIONES AJAX
    public function guardarTextoAction(Request $request)
    {
    	// variables
    	$result = false;
    	$id 	= ($request->get('id', false))		?$request->get('id')	:null;
    	$campo 	= ($request->get('campo', false))	?$request->get('campo')	:null;
    	$texto 	= ($request->get('texto', false))	?$request->get('texto')	:null;
    	$em 	= $this->getDoctrine()->getManager();

    	// actualizar texto
    	if( is_numeric($id) && $seccion = $em->getRepository('WebBundle:Seccion')->findOneBy(array('id' => $id )) )
    	{
    		switch($campo)
    		{
    			case 1: $seccion->setTexto1($texto);break;
    			case 2: $seccion->setTexto2($texto);break;
    			case 3: $seccion->setTexto3($texto);break;
    			case 4: $seccion->setTexto4($texto);break;
    		}

    		$em->persist($seccion);
    		$em->flush();

    		$result = true;
    	}

    	echo json_encode(['result' => $result]);
    	exit;
    }
}