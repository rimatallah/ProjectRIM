<?php

namespace ActiviteBundle\Controller;

use ActiviteBundle\Entity\activite;
use ActiviteBundle\Entity\billet;
use ActiviteBundle\Entity\commentaire;
use ActiviteBundle\Entity\lieux;
use ActiviteBundle\Entity\periodeActiviteDispo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiviteController extends Controller
{
    /**
     * @Route("/lieux/add")
     */
    public function addlieuxAction(Request $request)

    {
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $lieux = $this->get('jms_serializer')->
        deserialize($data, 'ActiviteBundle\Entity\lieux',
            'json');
        // added my data in data base
        $em = $this->getDoctrine()->getManager();
        $em->persist($lieux);
        $em->flush();
        return new Response('lieux added successfully',
            201);
    }

    /**
     * @Route("/lieux/findBy/{id}")
     */
    public function getlieuxByidAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $lieux = $em->getRepository(lieux::class)->findBy([
            'id' => $id
        ]);
        $data = $this->get('jms_serializer')->serialize($lieux, 'json');
        $response = new Response($data);
        return $response;
    }

    /**
     * @Route("/lieux/delete/{id}")
     */
    public function deletelieuxByidAction($id)
    {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $lieux = $em->getRepository(lieux::class)->find($id);
        //remove from the ORM
        $em->remove($lieux);
        //update the data base
        $em->flush();
        $response = new Response('succes');
        return $response;
    }

    /**
     * @Route("/lieux/update/{id}")
     */
    public function updateLieuxAction($id,Request $request)
    {
        //get the club with $id with manager permission
        $em = $this->getDoctrine()->getManager();
        $oldlieux = $em->getRepository(lieux::class)->find($id);
        //third step:
        // check is the from is sent
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $lieux = $this->get('jms_serializer')->
        deserialize($data, 'ActiviteBundle\Entity\lieux',
            'json');
        $oldlieux->setLongitude($lieux->getLongitude());
        $oldlieux->setLatitude($lieux->getLatitude());
        $oldlieux->setNomRegion($lieux->getNomRegion());
        $oldlieux->setNomPays($lieux->getNomPays());

        //fresh the data base
        $em->flush();
        //Redirect to the read
        return new Response('lieux updated successfully',
            201);
    }

    /**
     * @Route("/activite/add")
     */
    public function addActiviteAction(Request $request)

    {
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $activite = $this->get('jms_serializer')->
        deserialize($data, 'ActivitiBundle\Entity\lieux',
            'json');
        // added my data in data base
        $em = $this->getDoctrine()->getManager();
        $em->persist($activite);
        $em->flush();
        return new Response('lieux added successfully',
            201);
    }

    /**
     * @Route("/activite/findBy/{id}")
     */
    public function getActiviteByidAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository(activite::class)->findBy([
            'id' => $id
        ]);
        $data = $this->get('jms_serializer')->serialize($activite, 'json');
        $response = new Response($data);
        return $response;
    }

    /**
     * @Route("/activite/delete/{id}")
     */
    public function deleteActiviteByidAction($id)
    {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository(activite::class)->find($id);
        //remove from the ORM
        $em->remove($activite);
        //update the data base
        $em->flush();
        $response = new Response('succes');
        return $response;
    }

    /**
     * @Route("/activite/update/{id}")
     */
    public function updateActiviteAction($id,Request $request)
    {
        //get the club with $id with manager permission
        $em = $this->getDoctrine()->getManager();
        $oldactivite = $em->getRepository(activite::class)->find($id);
        //third step:
        // check is the from is sent
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $activite = $this->get('jms_serializer')->
        deserialize($data, 'ActiviteBundle\Entity\activite',
            'json');
        $oldactivite->setNomAct($activite->getNomAct());
        $oldactivite->setDescription($activite->getDescription());
        $oldactivite->setType($activite->getType());
        $oldactivite->setImg($activite->getImg());

        //fresh the data base
        $em->flush();
        //Redirect to the read
        return new Response('activite updated successfully',
            201);
    }

    /**
     * @Route("/commentaire/add")
     */
    public function addCommentaireAction(Request $request)

    {
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $commentaire = $this->get('jms_serializer')->
        deserialize($data, 'ActiviteBundle\Entity\lieux',
            'json');
        // added my data in data base
        $em = $this->getDoctrine()->getManager();
        $em->persist($commentaire);
        $em->flush();
        return new Response('lieux added successfully',
            201);
    }

    /**
     * @Route("/commentaire/findBy/{id}")
     */
    public function getCommentaireByidAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository(commentaire::class)->findBy([
            'id' => $id
        ]);
        $data = $this->get('jms_serializer')->serialize($commentaire, 'json');
        $response = new Response($data);
        return $response;
    }

    /**
     * @Route("/commentaire/delete/{id}")
     */
    public function deleteCommentaireByidAction($id)
    {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository(commentaire::class)->find($id);
        //remove from the ORM
        $em->remove($commentaire);
        //update the data base
        $em->flush();
        $response = new Response('succes');
        return $response;
    }

    /**
     * @Route("/commentaire/update/{id}")
     */
    public function updateCommentaireAction($id,Request $request)
    {
        //get the club with $id with manager permission
        $em = $this->getDoctrine()->getManager();
        $oldcommentaire = $em->getRepository(commentaire::class)->find($id);
        //third step:
        // check is the from is sent
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $commentaire = $this->get('jms_serializer')->
        deserialize($data, 'ActiviteBundle\Entity\commentaire',
            'json');
        $oldcommentaire->setIdUser($commentaire->getIdUser());
        $oldcommentaire->setComment($commentaire->getComment());
        $oldcommentaire->setDateInsert($commentaire->getDateInsert());
        $oldcommentaire->setIdAct($commentaire->getIdAct());

        //fresh the data base
        $em->flush();
        //Redirect to the read
        return new Response('commentaire updated successfully',
            201);
    }

    /**
     * @Route("/billet/add")
     */
    public function addBilletAction(Request $request)

    {
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $billet = $this->get('jms_serializer')->
        deserialize($data, 'ActiviteBundle\Entity\lieux',
            'json');
        // added my data in data base
        $em = $this->getDoctrine()->getManager();
        $em->persist($billet);
        $em->flush();
        return new Response('lieux added successfully',
            201);
    }

    /**
     * @Route("/billet/findBy/{id}")
     */
    public function getBilletByidAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $billet = $em->getRepository(billet::class)->findBy([
            'id' => $id
        ]);
        $data = $this->get('jms_serializer')->serialize($billet, 'json');
        $response = new Response($data);
        return $response;
    }

    /**
     * @Route("/billet/delete/{id}")
     */
    public function deleteBilletByidAction($id)
    {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $billet = $em->getRepository(billet::class)->find($id);
        //remove from the ORM
        $em->remove($billet);
        //update the data base
        $em->flush();
        $response = new Response('succes');
        return $response;
    }

    /**
     * @Route("/billet/update/{id}")
     */
    public function updateBilletAction($id,Request $request)
    {
        //get the club with $id with manager permission
        $em = $this->getDoctrine()->getManager();
        $oldbillet = $em->getRepository(billet::class)->find($id);
        //third step:
        // check is the from is sent
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $billet = $this->get('jms_serializer')->
        deserialize($data, 'ActiviteBundle\Entity\billet',
            'json');
        $oldbillet->setActId($billet->getActId());
        $oldbillet->setPrix($billet->getPrix());
        $oldbillet->setStatus($billet->getStatus());
        $oldbillet->setQuantite($billet->getQuantite());

        //fresh the data base
        $em->flush();
        //Redirect to the read
        return new Response('billet updated successfully',
            201);
    }

    /**
     * @Route("/dateinactive/add")
     */
    public function addDateInactiveAction(Request $request)

    {
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $dateinactive = $this->get('jms_serializer')->
        deserialize($data, 'ActiviteBundle\Entity\lieux',
            'json');
        // added my data in data base
        $em = $this->getDoctrine()->getManager();
        $em->persist($dateinactive);
        $em->flush();
        return new Response('lieux added successfully',
            201);
    }

    /**
     * @Route("/dateinactive/findBy/{id}")
     */
    public function getdateinactiveByidAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $dateinactive = $em->getRepository(periodeActiviteDispo::class)->findBy([
            'id' => $id
        ]);
        $data = $this->get('jms_serializer')->serialize($dateinactive, 'json');
        $response = new Response($data);
        return $response;
    }

    /**
     * @Route("/dateinactive/delete/{id}")
     */
    public function deletedateinactiveByidAction($id)
    {
        //get the object to be removed given the submitted id
        $em = $this->getDoctrine()->getManager();
        $dateinactive = $em->getRepository(periodeActiviteDispo::class)->find($id);
        //remove from the ORM
        $em->remove($dateinactive);
        //update the data base
        $em->flush();
        $response = new Response('succes');
        return $response;
    }

    /**
     * @Route("/dateinactive/update/{id}")
     */
    public function updatedateinactiveAction($id,Request $request)
    {
        //get the club with $id with manager permission
        $em = $this->getDoctrine()->getManager();
        $olddateinactive = $em->getRepository(periodeActiviteDispo::class)->find($id);
        //third step:
        // check is the from is sent
        //get content of data sent by ARC(or postman) tools
        $data = $request->getContent();
        //deserialize the data
        $dateinactive = $this->get('jms_serializer')->
        deserialize($data, 'ActivitiBundle\Entity\dateinactive',
            'json');
        $olddateinactive->setDateInactive($dateinactive->getDateInactive());


        //fresh the data base
        $em->flush();
        //Redirect to the read
        return new Response('dateinactive updated successfully',
            201);
    }
}
