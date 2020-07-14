<?php

namespace HikingBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use HikingBundle\Entity\Comments;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CommentsController extends Controller
{
    public function addCommentsAction(Request $request)
    {

        $data = $request->getContent();
        $comments = $this->get('jms_serializer')->deserialize($data, 'HikingBundle\Entity\Comments', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($comments);
        $em->flush();
        return new Response('comments added successfully', 201);
    }

    public function showAction()
    {
        $repository = $this->getDoctrine()->getRepository(Comments::class);
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
            ->getRepository('HikingBundle:Comments')
            ->find($id);
        $data = $request->getContent();

        $comments = $this->get('jms_serializer')
            ->deserialize($data, 'HikingBundle\Entity\Comments', 'json');
        $product->setIdParticipant($comments->getIdParticipant());
        $product->setIdPublication($comments->getIdPublication());
        $product->setText($comments->getText());


        $manager->persist($product);
        $manager->flush();

        return new JsonResponse(['msg' => 'succes!'], 200);
    }


    public function getCommentsByidAction(Comments $comments)
    {
        $data = $this->get('jms_serializer')->serialize($comments, 'json');
        $response = new Response($data);

        return $response;
    }

    public function deleteAction(Request $request)
    {
        //$event variable est une instanciation de class event
        $id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('HikingBundle:Event')->find($id);
        $em->remove($comments);
        $em->flush();
        return new JsonResponse(['msg' => 'deleted with succes!'], 200);
    }


}
