<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArmaCupcakeController extends Controller
{
    public function armaCupcakeAction()
    {
    	$session = 1;
    	$em      = $this->getDoctrine()->getManager();
    	
    	$banner = $em->getRepository('WebBundle:Banner')->findBy(array('activo' => 1 ));

        return $this->render('WebBundle::arma-cupcake.html.twig', array(
        	'pagina' => 'disena',
        	'session' => $session,
        	'banner' => $banner
        	));
    }
}