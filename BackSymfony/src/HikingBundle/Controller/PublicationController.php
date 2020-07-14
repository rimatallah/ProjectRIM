<?php

namespace HikingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use HikingBundle\Entity\Publication;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PublicationController extends Controller
{
    public function addPublicationAction(Request $request)
    {

        $data = $request->getContent();
        $publication = $this->get('jms_serializer')->deserialize($data, 'HikingBundle\Entity\Publication', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($publication);
        $em->flush();
        return new Response('publication added successfully', 201);
    }

    public function showAction()
    {
        $repository = $this->getDoctrine()->getRepository(Publication::class);
        $tesst = $repository->findAll();
        /*  $Person = new Person();//object
          $Person
              ->setAge('15 ans')
              ->setGender('homme');*/

        $data = $this->get('jms_serializer')->serialize($tesst, 'json');

        $response = new Response($data);

        return $response;
    }


    public function updateAction(Request $request, $id)
    {

        $doctrine = $this->getDoctrine();
        $manager = $doctrine->getManager();
        $product = $doctrine
            ->getRepository('HikingBundle:Publication')
            ->find($id);
        $data = $request->getContent();

        $event = $this->get('jms_serializer')
            ->deserialize($data, 'HikingBundle\Entity\Publication', 'json');
        $product->setIdParticipant($event->getIdParticipant());
        $product->setText($event->getText());
        $product->setImage($event->getImage());
        $product->setnbComments($event->getnbComments());



        $manager->persist($product);
        $manager->flush();

        return new JsonResponse(['msg' => 'succes!'], 200);
    }


    public function getPublicationByidAction(Publication $publication)
    {
        $data = $this->get('jms_serializer')->serialize($publication, 'json');
        $response = new Response($data);

        return $response;
    }

    public function deleteAction(Request $request)
    {
        //$event variable est une instanciation de class event
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $publication = $em->getRepository('HikingBundle:Publication')->find($id);
        $em->remove($publication);
        $em->flush();
        return new JsonResponse(['msg' => 'deleted with succes!'], 200);
    }


}

