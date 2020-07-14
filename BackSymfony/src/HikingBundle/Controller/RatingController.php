<?php

namespace HikingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


use HikingBundle\Entity\Rating;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RatingController extends Controller
{
    public function addRatingAction(Request $request)
    {

        $data = $request->getContent();
        $rating = $this->get('jms_serializer')->deserialize($data, 'HikingBundle\Entity\Rating', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($rating);
        $em->flush();
        return new Response('rating added successfully', 201);
    }

    public function showAction()
    {
        $repository = $this->getDoctrine()->getRepository(Rating::class);
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
            ->getRepository('HikingBundle:Rating')
            ->find($id);
        $data = $request->getContent();

        $rating = $this->get('jms_serializer')
            ->deserialize($data, 'HikingBundle\Entity\Rating', 'json');
        $product->setIdUser($rating->getIdUser());
        $product->setIdPlace($rating->getIdPlace());
        $product->setnbLike($rating->getnbLike());

        $manager->persist($product);
        $manager->flush();

        return new JsonResponse(['msg' => 'succes!'], 200);
    }


    public function getRatingByidAction(Rating $rating)
    {
        $data = $this->get('jms_serializer')->serialize($rating, 'json');
        $response = new Response($data);

        return $response;
    }

    public function deleteAction(Request $request)
    {
        //$event variable est une instanciation de class event
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $rating = $em->getRepository('HikingBundle:Rating')->find($id);
        $em->remove($rating);
        $em->flush();
        return new JsonResponse(['msg' => 'deleted with succes!'], 200);
    }



}
