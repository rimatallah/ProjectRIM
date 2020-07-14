<?php


namespace SpearfishBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SpearfishBundle\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FileController extends Controller
{

    public function uploadAction(Request $request)
    {
        $document = new Document();
        $form = $this->createFormBuilder($document)
            ->add('name')
            ->add('file')
            ->getForm();

        $form->handleRequest($request);
        var_dump($form);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $document->upload(); //*******
            $em->persist($document);
            $em->flush();
            return new Response('fish added successfully', 201);
           // return $this->redirectToRoute(...);
        }
        return new Response('fish added successfully', 201);
        //return array('form' => $form->createView());
    }



}
