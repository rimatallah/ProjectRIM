<?php

namespace ActiviteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/act")
     */
    public function indexAction()
    {
        return $this->render('ActiviteBundle:Default:index.html.twig');
    }


}
