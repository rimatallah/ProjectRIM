<?php

namespace HikingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use HikingBundle\Entity\Participant;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ParticipantController extends Controller
{
    public function addParticipantAction(Request $request)
    {

        $data = $request->getContent();
        $participant = $this->get('jms_serializer')->deserialize($data, 'HikingBundle\Entity\Participant', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($participant);
        $em->flush();
        return new Response('participant added successfully', 201);
    }

    public function showAction()
    {
        $repository = $this->getDoctrine()->getRepository(Participant::class);
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
            ->getRepository('HikingBundle:Participant')
            ->find($id);
        $data = $request->getContent();

        $participant = $this->get('jms_serializer')
            ->deserialize($data, 'HikingBundle\Entity\Participant', 'json');
         $product->setAlias($participant->getAlias());

        $manager->persist($product);
        $manager->flush();

        return new JsonResponse(['msg' => 'succes!'], 200);
    }


    public function getParticipantByidAction(Participant $participant)
    {
        $data = $this->get('jms_serializer')->serialize($participant, 'json');
        $response = new Response($data);

        return $response;
    }

    public function deleteAction(Request $request)
    {
        //$event variable est une instanciation de class event
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $participant = $em->getRepository('HikingBundle:Participant')->find($id);
        $em->remove($participant);
        $em->flush();
        return new JsonResponse(['msg' => 'deleted with succes!'], 200);
    }



}
