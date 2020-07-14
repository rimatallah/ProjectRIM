<?php

namespace ArtisanatBundle\Controller;

use ArtisanatBundle\Entity\Stock;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;


/**
 * Stock controller.
 *
 * @Route("stock")
 */
class StockController extends Controller
{
    /**
     * Lists all stock entities.
     *
     * @Route("/", name="stock_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'ArtisanatBundle:Stock';
        $stocks = $em->getRepository($className)->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $stocks, 'json');

        return new Response($jsonContent);
    }

    /**
     * Creates a new stock entity.
     *
     * @Route("/new", name="stock_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $stock = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Stock', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($stock);
        $em->flush();


        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($stock, 'json'));
    }

    /**
     * Finds and displays a stock entity.
     *
     * @Route("/{id}", name="stock_show")
     * @Method("GET")
     */
    public function showAction(Stock $stock)
    {
    $jsonContent = $this->get('jms_serializer')->serialize($stock, 'json');


    return new Response($jsonContent);
    }

    /**
     * Displays a form to edit an existing stock entity.
     *
     * @Route("/{id}/edit", name="stock_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Stock $stock)
    {
    $data = $request->getContent();
    $stockData = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Stock', 'json');

    $em = $this->getDoctrine()->getManager();
    $em->persist($stock);
    $em->flush();

        return new Response($this->get('jms_serializer')->serialize($stock, 'json'));
    }

    /**
     * Deletes a stock entity.
     *
     * @Route("/{id}", name="stock_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Stock $stock)
    {
    $em = $this->getDoctrine()->getManager();
    $em->remove($stock);
    $em->flush();

        return $this->redirectToRoute('stock_index');
    }
}
