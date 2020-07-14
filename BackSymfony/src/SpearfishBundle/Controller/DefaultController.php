<?php

namespace SpearfishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SpearfishBundle:Default:index.html.twig');
    }
}
