<?php

namespace HostingBundle\Controller;
use HostingBundle\Entity\Host;
use HostingBundle\Entity\Post_Ownership;
use HostingBundle\Entity\Post;
use UserBundle\Entity\User;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
/**
 * Shop controller.
 *
 * @Route("post")
 */
class PostController extends Controller
{
    /**
     * Lists all post entities.
     *
     * @Route("/", name="post_index")
     * @Method("GET")
     */
    public function ListAllPostsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $className = 'HostingBundle:Post';
        $posts = $em->getRepository($className)->findAll();

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize( $posts, 'json');
        $response =  new Response($jsonContent);
        $response->headers->set("Content-Type","application/json");
        return $response;
        //return $this->json(array('posts'=>$posts),200);

    }

    /**
     * get post by id
     *
     * @Route("/view/{id}", name="post_view")
     *
     * @Method("GET")
     */
    public function getPostAction(Post $post)
    {

        $jsonContent = $this->get('jms_serializer')->serialize($post, 'json');

        $response =  new Response($jsonContent);
        $response->headers->set("Content-Type","application/json");
        return $response;

    }

    /**
     * Creates a new post entity.
     *
     * @Route("/new", name="post_new")
     * @Method("POST")
     */
    public function addPostAction(Request $request)

    {
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();

        //deserialize the data
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build() ;
        $posts = $serializer-> deserialize($data, 'HostingBundle\Entity\Post',
            'json');

        // added my data in data base
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("UserBundle:User")->find($posts->getUser()->getId());
        $posts->setUser($user);
        $em->persist($posts);
        $em->flush();

        return $this->json(array('msg'=>'Posts added successfully'),200);

    }

    /**
     * get post by By City
     *
     * @Route("/city/{postCityName}", name="posts_city")
     * @Method("GET")
     */
    public function getPostByCityAction($postCityName)
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository(Post::class)->findBy(['postCityName' => $postCityName
        ]);
        //return json array of posts
        $posts = array($posts);
        $jsonContent = $this->get('jms_serializer')->serialize($posts, 'json');
        $response =  new Response($jsonContent);
        $response->headers->set("Content-Type","application/json");
        return $response;

    }

    /**
     * update post by ID
     *
     * @Route("/update/{id}", name="posts_update")
     * @Method("POST")
     */
    public function updatePostAction(Request $request , $id)
    {
        //update post data
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('HostingBundle:Post')->findOneById($id);
        $user = $em->getRepository("UserBundle:User")->find($post->getUser()->getId());
        $data = $request->getContent();
        //deserialize the data
        $post = $this->get('jms_serializer')->deserialize($data, 'HostingBundle\Entity\Post', 'json');
        $post->setUser($user);
        $em->persist($post);
        $em->flush();
        $jsonContent = $this->get('jms_serializer')->serialize($post, 'json');
        $response =  new Response($jsonContent);
        $response->headers->set("Content-Type","application/json");
        return $response;

    }
    /**
     * delete post by ID
     *
     * @Route("/delete/{id}", name="posts_delete")
     * @Method("GET")
     */
    public function deletePostAction($id)
    {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository(Post::class)->findOneById($id);
        //remove from the ORM
        if (!$post) {
            throw $this->createNotFoundException('No post found for id '.$id);
        }
        $em->remove($post);
        $em->flush();
        //return  posts
        return $this->json(array("msg"=>"successfully deleted."),200);
    }

    /**
     *
     * @param Request $request
     * @Route("/new/image", name="post_image_new")
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

        $post = new Post();
        $post->setTitle($request->get("title"));
        $post->setPostDescription($request->get("description"));
        $post->setPostCityName($request->get("city"));
        $post->setPostImage($newFilename);

        $em = $this->getDoctrine()->getManager();

//note to get active user if loggedin
        $user = $em->getRepository("UserBundle:User")->find(1);
        //$request->get("userid")
        $post->setUser($user);

        $em->persist($post);
        $em->flush();

        $serializer = SerializerBuilder::create()->build();
        return new Response($serializer->serialize($post, 'json'));
    }



}
