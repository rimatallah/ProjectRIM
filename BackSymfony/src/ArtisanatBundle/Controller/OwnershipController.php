<?php

namespace ArtisanatBundle\Controller;

use ArtisanatBundle\Entity\Ownership;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;


/**
 * Ownership controller.
 *
 * @Route("ownership")
 */
class OwnershipController extends Controller
{
    /**
     * Lists all ownership entities.
     *
     * @Route("/", name="ownership_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'ArtisanatBundle:Ownership';
        $ownerships = $em->getRepository($className)->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $ownerships, 'json');

        return new Response($jsonContent);
    }

    /**
     * Creates a new ownership entity.
     *
     * @Route("/new", name="ownership_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $parsedData = json_decode($data,true);
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("UserBundle:User")->find($parsedData["user"]);
        $shop = $em->getRepository("ArtisanatBundle:Shop")->find($parsedData["shop"]);
        $ownership = new Ownership();
        $ownership->setType($parsedData["type"]);
        $ownership->setUser($user);
        $ownership->setShop($shop);
        $em->persist($ownership);
        $em->flush();

        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($ownership, 'json'));
    }

    /**
     * Finds and displays a ownership entity.
     *
     * @Route("/{id}", name="ownership_show")
     * @Method("GET")
     */
    public function showAction(Ownership $ownership)
    {
    $jsonContent = $this->get('jms_serializer')->serialize($ownership, 'json');


    return new Response($jsonContent);
    }

    /**
     * Displays a form to edit an existing ownership entity.
     *
     * @Route("/{id}/edit", name="ownership_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ownership $ownership)
    {
    $data = $request->getContent();
    $ownershipData = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Ownership', 'json');

    $em = $this->getDoctrine()->getManager();
    $em->persist($ownership);
    $em->flush();

    return new Response($this->get('jms_serializer')->serialize($ownership, 'json'));
    }

    /**
     * Deletes a ownership entity.
     *
     * @Route("/{id}", name="ownership_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ownership $ownership)
    {
    $em = $this->getDoctrine()->getManager();
    $em->remove($ownership);
    $em->flush();

        return $this->redirectToRoute('ownership_index');
    }
}
