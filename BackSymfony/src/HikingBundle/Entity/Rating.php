<?php

namespace HikingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity(repositoryClass="HikingBundle\Repository\RatingRepository")
 */
class Rating
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
     * @var int
     *
     * @ORM\Column(name="id_participant", type="integer")
     */
    private $idParticipant;

    /**
     * @var int
     *
     * @ORM\Column(name="id_Event", type="integer")
     */
    private $idEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_like", type="integer")
     */
    private $nbLike;


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
     * Set idParticipant
     *
     * @param int $idParticipant
     *
     * @return Rating
     */
    public function setIdParticipant($idParticipant)
    {
        $this->idParticipant = $idParticipant;

        return $this;
    }

    /**
     * Get idParticipant
     *
     * @return int
     */
    public function getIdParticipant()
    {
        return $this->idPartcipant;
    }

    /**
     * Set idEvent
     *
     * @param int $idEvent
     *
     * @return Rating
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    /**
     * Get idEvent
     *
     * @return int
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set nbLike
     *
     * @param integer $nbLike
     *
     * @return Rating
     */
    public function setNbLike($nbLike)
    {
        $this->nbLike = $nbLike;

        return $this;
    }

    /**
     * Get nbLike
     *
     * @return int
     */
    public function getNbLike()
    {
        return $this->nbLike;
    }
}

