<?php

namespace HostingBundle\Controller;

use HostingBundle\Entity\Avis;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;


/**
 * Avi controller.
 *
 * @Route("avis")
 */
class AvisController extends Controller
{
    /**
     * Lists all avi entities.
     *
     * @Route("/", name="avis_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'HostingBundle:Avis';
        $avis = $em->getRepository($className)->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $avis, 'json');

        return new Response($jsonContent);
    }

    /**
     * Creates a new avi entity.
     *
     * @Route("/new", name="avis_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $avi = $this->get('jms_serializer')->deserialize($data, 'HostingBundle\Entity\Avi', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($avi);
        $em->flush();


        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($avi, 'json'));
    }

    /**
     * Finds and displays a avi entity.
     *
     * @Route("/{id}", name="avis_show")
     * @Method("GET")
     */
    public function showAction(Avis $avi)
    {
    $jsonContent = $this->get('jms_serializer')->serialize($avi, 'json');


    return new Response($jsonContent);
    }

    /**
     * Displays a form to edit an existing avi entity.
     *
     * @Route("/{id}/edit", name="avis_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Avis $avi)
    {
    $data = $request->getContent();
    $aviData = $this->get('jms_serializer')->deserialize($data, 'HostingBundle\Entity\Avis', 'json');

    $em = $this->getDoctrine()->getManager();
    $em->persist($avi);
    $em->flush();

        return new Response($this->get('jms_serializer')->serialize($avi, 'json'));
    }

    /**
     * Deletes a avi entity.
     *
     * @Route("/{id}", name="avis_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Avis $avi)
    {
    $em = $this->getDoctrine()->getManager();
    $em->remove($avi);
    $em->flush();

        return $this->redirectToRoute('avis_index');
    }
}
