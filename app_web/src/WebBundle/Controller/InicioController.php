<?php

namespace WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InicioController extends Controller
{
    public function inicioAction()
    {
        return $this->render('WebBundle::inicio.html.twig');
    }
}
