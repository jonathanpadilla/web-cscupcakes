<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WebBundle\Entity\Cupcakes;

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

    public function guardarFilaSeccionAction(Request $request)
    {
        $result = false;
        $em     = $this->getDoctrine()->getManager();
        $id     = ($request->get('id', false))? $request->get('id'): 0;
        $datos  = ($request->get('datos', false))? $request->get('datos'): 0;

        if( is_numeric($id) && $seccion = $em->getRepository('WebBundle:Seccion')->findOneBy(array('id' => $id )) )
        {
            if( isset($datos['texto1']) )
                $seccion->setTexto1($datos['texto1']);

            $em->persist($seccion);
            $em->flush();
        }

        echo json_encode(array('result' => $result));
        exit;
    }

    private function subirImagen($foto)
    {
        $result = false;

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

                $result = 'image/uploads/'.$obj['filenewname'];
            }

        }

        return $result;
    }

    public function guardarCupcakesAction(Request $request)
    {
        $result = false;

        if($request->getMethod('post'))
        {
            $em             = $this->getDoctrine()->getManager();
            $id             = ($request->get('txt_id', false))? $request->get('txt_id'): 0;
            $txt_texto_1    = ($request->get('txt_texto_1', false))? $request->get('txt_texto_1'): null;
            $txt_texto_2    = ($request->get('txt_texto_2', false))? $request->get('txt_texto_2'): null;
            $txt_precio     = ($request->get('txt_precio', false))? $request->get('txt_precio'): null;
            $foto           = ($request->files->get('foto', false))? $request->files->get('foto', false): null;

            if( !$cupcake = $em->getRepository('WebBundle:Cupcakes')->findOneBy(array('id' => $id )) )
            {
                $cupcake = new Cupcakes();
            }
                $cupcake->setTipo(1);
                $cupcake->setTexto1($txt_texto_1);
                $cupcake->setTexto2($txt_texto_2);
                $cupcake->setPrecio($txt_precio);

                if($img = $this->subirImagen($foto))
                {
                    if( is_numeric($id) && $seccion = $em->getRepository('WebBundle:Seccion')->findOneBy(array('id' => $id )) )
                    {
                        $cupcake->setImagen($img);
                    }
                }

                $em->persist($cupcake);
                $em->flush();

                $result = true;
        }

        echo json_encode(array('result' => $result));
        exit;
    }
}