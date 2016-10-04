<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InicioController extends Controller
{
    public function inicioAction()
    {
    	$session = 1;
    	$em      = $this->getDoctrine()->getManager();

        $cupcakes_destacados = $em->getRepository('WebBundle:Cupcakes')->findBy(array('tipo' => 1 ));

    	$cupcakes_nuevos = $em->getRepository('WebBundle:Cupcakes')->findBy(array('tipo' => 2 ));

        $banner = $em->getRepository('WebBundle:Banner')->findBy(array('activo' => 1 ));

        return $this->render('WebBundle::inicio.html.twig', [
        	'pagina'       => 'inicio',
            'destacados'   => $cupcakes_destacados,
        	'nuevos'       => $cupcakes_nuevos,
        	'session'      => $session,
            'banner'       => $banner
        	]);
    }
}