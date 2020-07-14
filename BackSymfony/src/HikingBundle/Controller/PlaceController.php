<?php

namespace HikingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use HikingBundle\Entity\Place;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PlaceController extends Controller
{
    public function addPlaceAction(Request $request)
    {

        $data = $request->getContent();
        $place = $this->get('jms_serializer')->deserialize($data, 'HikingBundle\Entity\Place', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($place);
        $em->flush();
        return new Response('place added successfully', 201);
    }

    public function showAction()
    {
        $repository = $this->getDoctrine()->getRepository(Place::class);
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
            ->getRepository('HikingBundle:Place')
            ->find($id);
        $data = $request->getContent();

        $place = $this->get('jms_serializer')
            ->deserialize($data, 'HikingBundle\Entity\Place', 'json');
        $product->setIdPlace($place->getIdPlace());
        $product->setImage($place->getImage());
        $product->setView($place->getView());
        $product->setLocalisation($place->getLocalisation());
        $product->setIdRegion($place->getIdRegion());



        $manager->persist($product);
        $manager->flush();

        return new JsonResponse(['msg' => 'succes!'], 200);
    }


    public function getPlaceByidAction(Place $place)
    {
        $data = $this->get('jms_serializer')->serialize($place, 'json');
        $response = new Response($data);

        return $response;
    }

    public function deleteAction(Request $request)
    {
        //$event variable est une instanciation de class event
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $place = $em->getRepository('HikingBundle:Place')->find($id);
        $em->remove($place);
        $em->flush();
        return new JsonResponse(['msg' => 'deleted with succes!'], 200);
    }


}


