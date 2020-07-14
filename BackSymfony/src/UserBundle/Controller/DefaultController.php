<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use UserBundle\Entity\User;


class DefaultController extends Controller
{
    /**
     * @Route("/user/{id}")
     */
    public function indexAction()
    {
        return $this->render('@User\Default\index.html.twig');
    }


    /**
     * @Route("/user/add/{id}")
     * @param Request $request
     * @return Response
     */

    public function addUserAction( Request $request)

    {

        $passwordEncoder = $this->container->get('security.password_encoder');
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $user = $this->get('jms_serializer')->
        deserialize($data, 'UserBundle\Entity\User',
            'json');
        // added my data in data base

        $user->setPassword($passwordEncoder->encodePassword($user, $user->getPassword()));
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        return new Response('user added successfully',
            201);
    }

    /**
     * @Route("/user/findBy/{id}")
     */
    public function getUserByidAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findBy([
            'id' => $id
        ]);

        $data = $this->get('jms_serializer')->serialize($user, 'json');
        $response = new Response($data);
        return $response;
    }

    /**
     * @Route("/user/delete/{id}")
     */
    public function deleteUserByidAction($id)
    {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->find($id);
        //remove from the ORM
        $em->remove($user);
        //update the data base
        $em->flush();
        $response = new Response('succes');
        return $response;
    }

    /**
     * @Route("/user/update/{id}")
     */
    public function updateUserAction($id, Request $request)
    {
        //get the club with $id with manager permission
        $em = $this->getDoctrine()->getManager();
        $oldUser = $em->getRepository(User::class)->find($id);
        //third step:
        // check is the from is sent
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $user = $this->get('jms_serializer')->
        deserialize($data, 'UserBundle\Entity\User',
            'json');
        $oldUser->setNom($user->getNom());
        $oldUser->setPrenom($user->getPrenom());
        $oldUser->setType($user->getType());
        $oldUser->setRole($user->getRole());

        //fresh the data base
        $em->flush();
        //Redirect to the read
        return new Response('User updated successfully',
            201);

    }
}
