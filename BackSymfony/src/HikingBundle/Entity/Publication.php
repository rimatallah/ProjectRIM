<?php

namespace HikingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="HikingBundle\Repository\PublicationRepository")
 */
class Publication
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;


    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob")
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_comments", type="integer")
     */
    private $nbComments;

    /**
     * @var int
     *
     * @ORM\Column(name="id_participant", type="integer")
     */
    private $idParticipant;

    /**
     * @return int
     */
    public function getIdParticipant()
    {
        return $this->idParticipant;
    }

    /**
     * @param int $idParticipant
     */
    public function setIdParticipant($idParticipant)
    {
        $this->idParticipant = $idParticipant;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set text
     *
     * @param string $text
     *
     * @return Publication
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }



    /**
     * Set image
     *
     * @param string $image
     *
     * @return Publication
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set nbComments
     *
     * @param integer $nbComments
     *
     * @return Publication
     */
    public function setNbComments($nbComments)
    {
        $this->nbComments = $nbComments;

        return $this;
    }

    /**
     * Get nbComments
     *
     * @return int
     */
    public function getNbComments()
    {
        return $this->nbComments;
    }
}

