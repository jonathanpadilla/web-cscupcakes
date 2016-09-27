<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
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

    public function guardarImagenAction(Request $request)
    {
        $result = false;
        
        if($request->getMethod('post'))
        {
            $id     = ($request->get('id', false))? $request->get('id'): 0;
            $foto   = ($request->files->get('foto', false))? $request->files->get('foto', false): null;
            $em     = $this->getDoctrine()->getManager();

            if($img = $this->subirImagen($foto))
            {
                if( is_numeric($id) && $seccion = $em->getRepository('WebBundle:Seccion')->findOneBy(array('id' => $id )) )
                {
                    $seccion->setFoto($img);
                    $em->persist($seccion);
                    $em->flush();
                }
            }
            
        }

        echo json_encode(['result' => $result]);
        exit;
    }

    private function subirImagen($foto)
    {
        $return = false;

        if($foto)
        {
            $obj = [
                'filesize'      => $foto->getClientSize(),
                'filetype'      => $foto->getClientMimeType(),
                'fileextension' => $foto->getClientOriginalExtension(),
                'filenewname'   => uniqid().".".$foto->getClientOriginalExtension(),
                'filenewpath'   => __DIR__.'/../../../../image/uploads'
            ];

            if($obj['filesize'] <= 5242880 && ($obj['filetype'] == 'image/png' || $obj['filetype'] == 'image/jpeg') )
            {
                $foto->move($obj['filenewpath'], $obj['filenewname']);

                $return = 'image/uploads/'.$obj['filenewname'];
            }

        }

        return $return;
    }
}