<?php

namespace HikingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participation_Event
 *
 * @ORM\Table(name="participation__event")
 * @ORM\Entity(repositoryClass="HikingBundle\Repository\Participation_EventRepository")
 */
class Participation_Event
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
     * @ORM\Column(name="id_Participant", type="integer")
     */
    private $idParticipant;

    /**
     * @var int
     *
     * @ORM\Column(name="id_event", type="integer")
     */
    private $idEvent;


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
     * @return Participation_Event
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
        return $this->idParticipant;
    }

    /**
     * Set idEvent
     *
     * @param int $idEvent
     *
     * @return Participation_Event
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
}

