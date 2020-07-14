<?php


namespace SpearfishBundle\Controller;


use SpearfishBundle\Entity\Fish;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FishController extends Controller
{

    public function addFishAction(Request $request)
    {
        $data = $request->getContent();
        var_dump($data);
        $poisson = $this->get('jms_serializer')->deserialize($data, 'SpearfishBundle\Entity\Fish', 'json');
        var_dump($poisson);
        $em = $this->getDoctrine()->getManager();
        $em->persist($poisson);
        $em->flush();
        return new Response('fish added successfully', 201);
    }

    public function getFishByIdAction(Fish $fish)
    {
        $data = $this->get('jms_serializer')->serialize($fish, 'json');
        $response = new Response($data);
        return $response;
    }

    public function updateFishByIdAction(Request $request, $idFish)
    {

        $doctrine = $this->getDoctrine();
        $manager = $doctrine->getManager();
        $fish = $manager->getRepository('SpearfishBundle:Fish')->findOneBy(['idFish'=>$idFish]);
        $data = $request->getContent();
        $fishUpdt = $this->get('jms_serializer')->deserialize($data, 'SpearfishBundle\Entity\Fish', 'json');
        $fish->setFishDescription($fishUpdt->getFishDescription());
        $fish->setFishImage($fishUpdt->getFishImage());
        $manager->persist($fish);
        $manager->flush();
        return new JsonResponse(['msg' => 'succes!'], 200);
    }
    public function  removeFishByIdAction($idFish){
        $doctrine = $this->getDoctrine();
        $manager = $doctrine->getManager();
        $fish = $manager->getRepository('SpearfishBundle:Fish')->findOneBy(['idFish'=>$idFish]);
        $manager->remove($fish);
        $manager->flush();
        return new JsonResponse(['msg' => 'fish removed successfully!'], 200);
    }
    public function uploadImageByIdAction(Request $request, $idFish){
        $doctrine = $this->getDoctrine();
        $manager = $doctrine->getManager();
        $fish = $manager->getRepository('SpearfishBundle:Fish')->findOneBy(['idFish'=>$idFish]);
        $file =$this->get('jms_serializer')->deserialize('file','json');


}

}
