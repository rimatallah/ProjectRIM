<?php

namespace ArtisanatBundle\Controller;

use ArtisanatBundle\Entity\Ownership;
use ArtisanatBundle\Entity\Shop;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Shop controller.
 *
 * @Route("shop")
 */
class ShopController extends Controller
{
    /**
     * Lists all shop entities.
     *
     * @Route("/", name="shop_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'ArtisanatBundle:Shop';
        $shops = $em->getRepository($className)->findAll();
        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $shops, 'json');

        return new Response($jsonContent);
    }

    /**
     * Creates a new shop entity.
     *
     * @Route("/new", name="shop_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $data = $request->getContent();
        $shop = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Shop', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($shop);
        $em->flush();


        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($shop, 'json'));
    }

    /**
     *
     * @param Request $request
     * @Route("/new/image", name="shop_image_new")
     * @Method({"POST"})
     *
     * @return JsonResponse
     */
    public function newImage(Request $request)
    {

        $imageUploaded = $request->files->get("file");
        $newFilename = uniqid().'.'.$imageUploaded->guessExtension();
        if($imageUploaded){
            $imageUploaded->move($this->getParameter("image_dir"), $newFilename);
        }

        $shop = new Shop();
        $shop->setName($request->get("name"));
        $shop->setKeyWords($request->get("keyWords"));
        $shop->setCity($request->get("city"));
        $shop->setCountry($request->get("country"));
        $shop->setImageName($newFilename);
        $em = $this->getDoctrine()->getManager();
        $em->persist($shop);
        $em->flush();


        $request->get("userid");

        $user = $em->getRepository("UserBundle:User")->find($request->get("userid"));
        $shop = $em->getRepository("ArtisanatBundle:Shop")->find($shop->getId());
        $ownership = new Ownership();
        $ownership->setUser($user);
        $ownership->setShop($shop);
        $em->persist($ownership);
        $em->flush();

        // var_dump($newFilename);
        /*$data = $request->getContent();
        $em = $this->getDoctrine()->getManager();
        $em->persist($shop);
        $em->flush();
        $serializer = SerializerBuilder::create()->build();*/
        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($shop, 'json'));
    }

    /**
     * Finds and displays a shop entity.
     *
     * @Route("/{id}", name="shop_show")
     * @Method("GET")
     */
    public function showAction(Shop $shop)
    {
    $jsonContent = $this->get('jms_serializer')->serialize($shop, 'json');


    return new Response($jsonContent);
    }

    /**
     * Displays a form to edit an existing shop entity.
     *
     * @Route("/{id}/edit", name="shop_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Shop $shop)
    {
    $data = $request->getContent();
    $shopData = $this->get('jms_serializer')->deserialize($data, 'ArtisanatBundle\Entity\Shop', 'json');

    $em = $this->getDoctrine()->getManager();
    $em->persist($shop);
    $em->flush();

        return new Response($this->get('jms_serializer')->serialize($shop, 'json'));
    }

    /**
     * Deletes a shop entity.
     *
     * @Route("/{id}", name="shop_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Shop $shop)
    {
    $em = $this->getDoctrine()->getManager();
    $em->remove($shop);
    $em->flush();

        return $this->redirectToRoute('shop_index');
    }
}
