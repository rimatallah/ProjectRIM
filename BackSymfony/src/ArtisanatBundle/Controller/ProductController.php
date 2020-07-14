<?php

namespace ArtisanatBundle\Controller;

use ArtisanatBundle\ArtisanatBundle;
use ArtisanatBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Product controller.
 *
 * @Route("product")
 */
class ProductController extends Controller
{
    /**
     * Lists all product entities.
     *
     * @Route("/", name="product_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('ArtisanatBundle:Product')->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($products, 'json');
        return new Response($jsonContent);
    }

    /**
     * Creates a new product entity.
     *
     * @Route("/new", name="product_new")
     * @Method("POST")
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $product = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Product', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($product, 'json'));
    }

    /**
     * Displays a form to edit an existing product entity.
     *
     * @Route("/edit/{id}", name="product_edit")
     * @Method("POST")
     */
    public function editAction(Request $request, Product $product)
    {
        $data = $request->getContent();
        $productData = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Product', 'json');
        $product->setName($productData->getName());
        $product->setDescription($productData->getDescription());
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        return new Response($this->get('jms_serializer')->serialize($product, 'json'));
    }

    /**
     * Deletes a product entity.
     *
     * @Route("/delete/{id}", name="product_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();
        return $this->redirectToRoute('product_index');
    }

    /**
     * Finds and displays a product entity.
     *
     * @Route("/{id}", name="product_show")
     * @Method("GET")
     */
    public function showAction(Product $product)
    {
        $jsonContent = $this->get('jms_serializer')->serialize($product, 'json');
        return new Response($jsonContent);
    }



}
