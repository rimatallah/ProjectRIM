<?php

namespace HikingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use HikingBundle\Entity\Participation_Event;
use HikingBundle\Entity\Event;
use HikingBundle\Entity\Participant;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Participation_EventController extends Controller
{
    public function addParticipationAction(Request $request)
    {
        $data = $request->getContent();
        $participation = $this->get('jms_serializer')->deserialize($data, 'HikingBundle\Entity\Participation_Event', 'json');
        $em = $this->getDoctrine()->getManager();
        $participant = $em->find('HikingBundle:Participant',$participation->getIdParticipant());

        $event = $em->find('HikingBundle:Event',$participation->getIdEvent());
        if (is_null ( $event ))
        {
            return new Response('L\'évènement demandé n\'existe pas', 400);
        }
        elseif (!is_null ( $em->getRepository('HikingBundle:Participation_Event')->findOneBy(['idEvent'=>$participation->getIdEvent(), 'idParticipant'=>$participation->getIdParticipant()]) ))
        {
            return new Response('vous pêtes déjà inscrit à cet évènement', 400);
        }
        if ($event->getAvailable() > 0)
        {
            $event->setNbParticipant($event->getNbParticipant() + 1);
            $em->persist($event);
            $em->persist($participation);
            $em->flush();
            return new Response('participation added successfully', 201);
        }
        else
        {
            return new Response('pas de places diponibles', 400);
        }
    }

    public function showAction()
    {
        $repository = $this->getDoctrine()->getRepository(Participation_Event::class);
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
            ->getRepository('HikingBundle:Participation_Event')
            ->find($id);
        $data = $request->getContent();

        $participation = $this->get('jms_serializer')
            ->deserialize($data, 'HikingBundle\Entity\Participation_Event', 'json');
        $product->setIdParticipant($participation->getIdParticipant());
        $product->setIdEvent($participation->getIdEvent());



        $manager->persist($product);
        $manager->flush();

        return new JsonResponse(['msg' => 'succes!'], 200);
    }


    public function getParticipationByidAction(Participation_Event $participation)
    {
        $data = $this->get('jms_serializer')->serialize($participation, 'json');
        $response = new Response($data);

        return $response;
    }

    public function deleteAction(Request $request)
    {
        //$event variable est une instanciation de class event
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $participation = $em->getRepository('HikingBundle:Participation_Event')->find($id);
        $event = $em->getRepository('HikingBundle:Event')->findOneBy(['idEvent'=>$participation->getIdEvent()]);
        $em->remove($participation);
        $event->setNbParticipant($event->getNbParticipant() - 1);
        $em->persist($event);
        $em->flush();
        return new JsonResponse(['msg' => 'deleted with succes!'], 200);
    }


}

