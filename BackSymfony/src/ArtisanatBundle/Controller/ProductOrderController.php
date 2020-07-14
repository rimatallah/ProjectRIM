<?php

namespace ArtisanatBundle\Controller;

use ArtisanatBundle\Entity\ProductOrder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;


/**
 * Productorder controller.
 *
 * @Route("productorder")
 */
class ProductOrderController extends Controller
{
    /**
     * Lists all productOrder entities.
     *
     * @Route("/", name="productorder_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'ArtisanatBundle:ProductOrder';
        $productOrders = $em->getRepository($className)->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $productOrders, 'json');

        return new Response($jsonContent);
    }

    /**
     * Creates a new productOrder entity.
     *
     * @Route("/new", name="productorder_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $productOrder = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Productorder', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($productOrder);
        $em->flush();


        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($productOrder, 'json'));
    }

    /**
     * Finds and displays a productOrder entity.
     *
     * @Route("/{id}", name="productorder_show")
     * @Method("GET")
     */
    public function showAction(ProductOrder $productOrder)
    {
    $jsonContent = $this->get('jms_serializer')->serialize($productOrder, 'json');


    return new Response($jsonContent);
    }

    /**
     * Displays a form to edit an existing productOrder entity.
     *
     * @Route("/{id}/edit", name="productorder_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProductOrder $productOrder)
    {
    $data = $request->getContent();
    $productOrderData = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\ProductOrder', 'json');

    $em = $this->getDoctrine()->getManager();
    $em->persist($productOrder);
    $em->flush();

        return new Response($this->get('jms_serializer')->serialize($productOrder, 'json'));
    }

    /**
     * Deletes a productOrder entity.
     *
     * @Route("/{id}", name="productorder_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProductOrder $productOrder)
    {
    $em = $this->getDoctrine()->getManager();
    $em->remove($productOrder);
    $em->flush();

        return $this->redirectToRoute('productorder_index');
    }
}
