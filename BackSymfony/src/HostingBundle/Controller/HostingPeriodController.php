<?php

namespace HostingBundle\Controller;

use HostingBundle\Entity\HostingPeriod;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;


/**
 * Hostingperiod controller.
 *
 * @Route("hostingperiod")
 */
class HostingPeriodController extends Controller
{
    /**
     * Lists all hostingPeriod entities.
     *
     * @Route("/", name="hostingperiod_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'HostingBundle:HostingPeriod';
        $hostingPeriods = $em->getRepository($className)->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $hostingPeriods, 'json');

        return new Response($jsonContent);
    }

    /**
     * Creates a new hostingPeriod entity.
     *
     * @Route("/new", name="hostingperiod_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $hostingPeriod = $this->get('jms_serializer')->deserialize($data, 'HostingBundle\Entity\Hostingperiod', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($hostingPeriod);
        $em->flush();


        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($hostingPeriod, 'json'));
    }

    /**
     * Finds and displays a hostingPeriod entity.
     *
     * @Route("/{id}", name="hostingperiod_show")
     * @Method("GET")
     */
    public function showAction(HostingPeriod $hostingPeriod)
    {
    $jsonContent = $this->get('jms_serializer')->serialize($hostingPeriod, 'json');


    return new Response($jsonContent);
    }

    /**
     * Displays a form to edit an existing hostingPeriod entity.
     *
     * @Route("/{id}/edit", name="hostingperiod_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, HostingPeriod $hostingPeriod)
    {
    $data = $request->getContent();
    $hostingPeriodData = $this->get('jms_serializer')->deserialize($data, 'HostingBundle\Entity\HostingPeriod', 'json');

    $em = $this->getDoctrine()->getManager();
    $em->persist($hostingPeriod);
    $em->flush();

        return new Response($this->get('jms_serializer')->serialize($hostingPeriod, 'json'));
    }

    /**
     * Deletes a hostingPeriod entity.
     *
     * @Route("/{id}", name="hostingperiod_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, HostingPeriod $hostingPeriod)
    {
    $em = $this->getDoctrine()->getManager();
    $em->remove($hostingPeriod);
    $em->flush();

        return $this->redirectToRoute('hostingperiod_index');
    }
}
