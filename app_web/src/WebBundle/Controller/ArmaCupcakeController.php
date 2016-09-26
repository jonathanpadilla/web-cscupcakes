<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArmaCupcakeController extends Controller
{
    public function armaCupcakeAction()
    {
    	$session = 1;

        return $this->render('WebBundle::arma-cupcake.html.twig', array(
        	'pagina' => 'disena',
        	'session' => $session
        	));
    }
}