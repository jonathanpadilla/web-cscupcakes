<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InicioController extends Controller
{
    public function inicioAction(Request $request)
    {
        $session = $request->getSession();
        $admin   = ($session->get('admin'))? true: false;

    	$em      = $this->getDoctrine()->getManager();

        $cupcakes_destacados = $em->getRepository('WebBundle:Cupcakes')->findBy(array('tipo' => 1, 'activo' => 1 ));

    	$cupcakes_nuevos = $em->getRepository('WebBundle:Cupcakes')->findBy(array('tipo' => 2, 'activo' => 1 ));

        $banner = $em->getRepository('WebBundle:Banner')->findBy(array('activo' => 1 ));

        $seccion = array(
            'bienvenidos' => $em->getRepository('WebBundle:Seccion')->findOneBy(array('id' => 1 )),
            'nuevos_cupcakes' => $em->getRepository('WebBundle:Seccion')->findOneBy(array('id' => 2 )),
            'servicios_especiales' => $em->getRepository('WebBundle:Seccion')->findOneBy(array('id' => 3 )),
            );

        return $this->render('WebBundle::inicio.html.twig', array(
        	'pagina'       => 'inicio',
            'destacados'   => $cupcakes_destacados,
        	'nuevos'       => $cupcakes_nuevos,
        	'session'      => $admin,
            'banner'       => $banner,
            'seccion'      => $seccion
        	));
    }
}