<?php

namespace HikingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="HikingBundle\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(name="name_event", type="string", length=255)
     */
    private $nameEvent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_event", type="date")
     */
    private $dateEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="Place_event", type="string", length=255)
     */
    private $placeEvent;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_Place", type="integer")
     */
    private $nbPlace;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_participant", type="integer")
     */
    private $nbParticipant;


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
     * Set nameEvent
     *
     * @param string $nameEvent
     *
     * @return Event
     */
    public function setNameEvent($nameEvent)
    {
        $this->nameEvent = $nameEvent;

        return $this;
    }

    /**
     * Get nameEvent
     *
     * @return string
     */
    public function getNameEvent()
    {
        return $this->nameEvent;
    }

    /**
     * Set dateEvent
     *
     * @param \DateTime $dateEvent
     *
     * @return Event
     */
    public function setDateEvent($dateEvent)
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }

    /**
     * Get dateEvent
     *
     * @return \DateTime
     */
    public function getDateEvent()
    {
        return $this->dateEvent;
    }

    /**
     * Set placeEvent
     *
     * @param string $placeEvent
     *
     * @return Event
     */
    public function setPlaceEvent($placeEvent)
    {
        $this->placeEvent = $placeEvent;

        return $this;
    }

    /**
     * Get placeEvent
     *
     * @return string
     */
    public function getPlaceEvent()
    {
        return $this->placeEvent;
    }

    /**
     * Set nbPlace
     *
     * @param integer $nbPlace
     *
     * @return Event
     */
    public function setNbPlace($nbPlace)
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    /**
     * Get nbPlace
     *
     * @return int
     */
    public function getNbPlace()
    {
        return $this->nbPlace;
    }

    /**
     * Set nbParticipant
     *
     * @param integer $nbParticipant
     *
     * @return Event
     */
    public function setNbParticipant($nbParticipant)
    {
        $this->nbParticipant = $nbParticipant;

        return $this;
    }

    /**
     * Get nbParticipant
     *
     * @return int
     */
    public function getNbParticipant()
    {
        return $this->nbParticipant;
    }


    public function getAvailable()
    {
        return $this->nbPlace - $this->nbParticipant;
    }
}

