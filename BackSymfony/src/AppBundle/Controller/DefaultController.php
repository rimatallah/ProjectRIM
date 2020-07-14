<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{


        /**
         * @Route("/", name="homepage")
         * @param Request $request
         * @return Response
         */
        public function indexAction(Request $request)
    {

        return $this->render('default/index.html.twig', [
            'ws_url' => '127.0.0.1:8080']);
    }
        // replace this example code with whatever you need
      //  return $this->render('default/index.html.twig', [
        //    'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
       // ]);

}
