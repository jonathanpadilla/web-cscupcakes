<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use \stdClass;

class MenuController extends Controller
{
    public function menuAction(Request $request)
    {
    	$session = $request->getSession();
        $admin   = ($session->get('admin'))? true: false;

    	$em      = $this->getDoctrine()->getManager();

        $cupcakes_destacados = $em->getRepository('WebBundle:Cupcakes')->findBy(array('tipo' => 1, 'activo' => 1 ));

        $banner = $em->getRepository('WebBundle:Banner')->findBy(array('activo' => 1 ));

        $lista_cupcake = array();
        if($cupcake = $em->getRepository('WebBundle:Cupcakes')->findBy(array('tipo' => 0, 'activo' => 1 )))
        {
            foreach($cupcake as $value)
            {
                $datos = new stdClass();

                $datos->id = $value->getId();
                $datos->img = $value->getImagen();
                $datos->nombre = $value->getTexto2();

                $lista_cupcake[$value->getCategoria()->getId()][] = $datos;
            }
        }
    	
        // echo '<pre>';print_r($lista_cupcake);exit;

        return $this->render('WebBundle::menu.html.twig', array(
        	'pagina' => 'menu',
            'destacados'   => $cupcakes_destacados,
        	'session' => $admin,
            'banner'    => $banner,
        	'lista_cupcake'	=> $lista_cupcake,
        	));
    }
}