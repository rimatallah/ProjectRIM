<?php

namespace HikingBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



use HikingBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class EventController extends Controller
{
    public function addEventAction(Request $request)
    {

        $data = $request->getContent();
        $event = $this->get('jms_serializer')->deserialize($data, 'HikingBundle\Entity\Event', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();
        return new Response('event added successfully', 201);
    }

    public function showAction()
    {
        $repository = $this->getDoctrine()->getRepository(Event::class);
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
            ->getRepository('HikingBundle:Event')
            ->find($id);
        $data = $request->getContent();

        $event = $this->get('jms_serializer')
            ->deserialize($data, 'HikingBundle\Entity\Event', 'json');
        $product->setIdEvent($event->getIdEvent());
        $product->setNameEvent($event->getNameEvent());
        $product->setDateEvent($event->getDateEvent());
        $product->setPlaceEvent($event->getPlaceEvent());
        $product->setnbPlaceAvailable($event->getnbPlaceAvailable());
        $product->setnbParticipant($event->getnbParticipant());


        $manager->persist($product);
        $manager->flush();

        return new JsonResponse(['msg' => 'succes!'], 200);
    }


    public function getEventByidAction(Event $event)
    {
        $data = $this->get('jms_serializer')->serialize($event, 'json');
        $response = new Response($data);

        return $response;
    }

    public function deleteAction(Request $request)
    {
        //$event variable est une instanciation de class event
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('HikingBundle:Event')->find($id);
        $em->remove($event);
        $em->flush();
        return new JsonResponse(['msg' => 'deleted with succes!'], 200);
    }


}
