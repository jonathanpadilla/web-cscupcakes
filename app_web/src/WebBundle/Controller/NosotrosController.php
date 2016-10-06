<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class NosotrosController extends Controller
{
    public function nosotrosAction(Request $request)
    {
    	$session = $request->getSession();
        $admin   = ($session->get('admin'))? true: false;

        $em      = $this->getDoctrine()->getManager();
        
        $banner = $em->getRepository('WebBundle:Banner')->findBy(array('activo' => 1 ));

        $seccion = array(
            'nosotros' => $em->getRepository('WebBundle:Seccion')->findOneBy(array('id' => 4)),
            'nuestra_reseta' => $em->getRepository('WebBundle:Seccion')->findOneBy(array('id' => 5)),
            );
    	
        return $this->render('WebBundle::nosotros.html.twig', array(
        	'id_body' => 'id=nosotros',
        	'session' => $admin,
            'pagina' => 'nosotros',
            'banner' => $banner,
        	'seccion' => $seccion,
        	));
    }
}