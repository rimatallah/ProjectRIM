<?php

namespace HostingBundle\Controller;

use HostingBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;


/**
 * Comment controller.
 *
 * @Route("comment")
 */
class CommentController extends Controller
{
    /**
     * Lists all comment entities.
     *
     * @Route("/", name="comment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'HostingBundle:Comment';
        $comments = $em->getRepository($className)->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $comments, 'json');

        return new Response($jsonContent);
    }

    /**
     * Creates a new comment entity.
     *
     * @Route("/new", name="comment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $comment = $this->get('jms_serializer')->deserialize($data, 'HostingBundle\Entity\Comment', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();


        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($comment, 'json'));
    }

    /**
     * Finds and displays a comment entity.
     *
     * @Route("/{id}", name="comment_show")
     * @Method("GET")
     */
    public function showAction(Comment $comment)
    {
    $jsonContent = $this->get('jms_serializer')->serialize($comment, 'json');


    return new Response($jsonContent);
    }

    /**
     * Displays a form to edit an existing comment entity.
     *
     * @Route("/{id}/edit", name="comment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comment $comment)
    {
    $data = $request->getContent();
    $commentData = $this->get('jms_serializer')->deserialize($data, 'HostingBundle\Entity\Comment', 'json');

    $em = $this->getDoctrine()->getManager();
    $em->persist($comment);
    $em->flush();

        return new Response($this->get('jms_serializer')->serialize($comment, 'json'));
    }

    /**
     * Deletes a comment entity.
     *
     * @Route("/{id}", name="comment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comment $comment)
    {
    $em = $this->getDoctrine()->getManager();
    $em->remove($comment);
    $em->flush();

        return $this->redirectToRoute('comment_index');
    }
}
