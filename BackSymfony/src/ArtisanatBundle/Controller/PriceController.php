<?php

namespace ArtisanatBundle\Controller;

use ArtisanatBundle\Entity\Price;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;


/**
 * Price controller.
 *
 * @Route("price")
 */
class PriceController extends Controller
{
    /**
     * Lists all price entities.
     *
     * @Route("/", name="price_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'ArtisanatBundle:Price';
        $prices = $em->getRepository($className)->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $prices, 'json');

        return new Response($jsonContent);
    }

    /**
     * Creates a new price entity.
     *
     * @Route("/new", name="price_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $price = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Price', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($price);
        $em->flush();


        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($price, 'json'));
    }

    /**
     * Finds and displays a price entity.
     *
     * @Route("/{id}", name="price_show")
     * @Method("GET")
     */
    public function showAction(Price $price)
    {
    $jsonContent = $this->get('jms_serializer')->serialize($price, 'json');


    return new Response($jsonContent);
    }

    /**
     * Displays a form to edit an existing price entity.
     *
     * @Route("/{id}/edit", name="price_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Price $price)
    {
    $data = $request->getContent();
    $priceData = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Price', 'json');

    $em = $this->getDoctrine()->getManager();
    $em->persist($price);
    $em->flush();

        return new Response($this->get('jms_serializer')->serialize($price, 'json'));
    }

    /**
     * Deletes a price entity.
     *
     * @Route("/{id}", name="price_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Price $price)
    {
    $em = $this->getDoctrine()->getManager();
    $em->remove($price);
    $em->flush();

        return $this->redirectToRoute('price_index');
    }
}
