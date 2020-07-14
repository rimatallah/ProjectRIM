<?php

namespace HikingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Hiking/Default/index.html.twig');
    }
}
