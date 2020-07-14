<?php

namespace HostingBundle\Controller;

use HostingBundle\Entity\Host;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;


/**
 * Host controller.
 *
 * @Route("host")
 */
class HostController extends Controller
{
    /**
     * Lists all host entities.
     *
     * @Route("/", name="host_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'HostingBundle:Host';
        $hosts = $em->getRepository($className)->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $hosts, 'json');

        return new Response($jsonContent);
    }

    /**
     * Creates a new host entity.
     *
     * @Route("/new", name="host_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $host = $this->get('jms_serializer')->deserialize($data, 'HostingBundle\Entity\Host', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($host);
        $em->flush();


        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($host, 'json'));
    }

    /**
     * Finds and displays a host entity.
     *
     * @Route("/{id}", name="host_show")
     * @Method("GET")
     */
    public function showAction(Host $host)
    {
    $jsonContent = $this->get('jms_serializer')->serialize($host, 'json');


    return new Response($jsonContent);
    }

    /**
     * Displays a form to edit an existing host entity.
     *
     * @Route("/{id}/edit", name="host_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Host $host)
    {
    $data = $request->getContent();
    $hostData = $this->get('jms_serializer')->deserialize($data, 'HostingBundle\Entity\Host', 'json');

    $em = $this->getDoctrine()->getManager();
    $em->persist($host);
    $em->flush();

        return new Response($this->get('jms_serializer')->serialize($host, 'json'));
    }

    /**
     * Deletes a host entity.
     *
     * @Route("/{id}", name="host_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Host $host)
    {
    $em = $this->getDoctrine()->getManager();
    $em->remove($host);
    $em->flush();

        return $this->redirectToRoute('host_index');
    }
}
