<?php

namespace SpearfishBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * spevent
 *
 * @ORM\Table(name="spevent")
 * @ORM\Entity(repositoryClass="SpearfishBundle\Repository\speventRepository")
 */
class spevent
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="id_spot", type="integer")
     */
    private $idSpot;

    /**
     * @var int
     *
     * @ORM\Column(name="n_place", type="integer")
     */
    private $nPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="departure_location", type="string", length=255)
     */
    private $departureLocation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departure_date", type="date")
     */
    private $departureDate;

    /**
     * @var int
     *
     * @ORM\Column(name="sp_event_rate", type="integer")
     */
    private $spEventRate;


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
     * Set title
     *
     * @param string $title
     *
     * @return spevent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set idSpot
     *
     * @param integer $idSpot
     *
     * @return spevent
     */
    public function setIdSpot($idSpot)
    {
        $this->idSpot = $idSpot;

        return $this;
    }

    /**
     * Get idSpot
     *
     * @return int
     */
    public function getIdSpot()
    {
        return $this->idSpot;
    }

    /**
     * Set nPlace
     *
     * @param integer $nPlace
     *
     * @return spevent
     */
    public function setNPlace($nPlace)
    {
        $this->nPlace = $nPlace;

        return $this;
    }

    /**
     * Get nPlace
     *
     * @return int
     */
    public function getNPlace()
    {
        return $this->nPlace;
    }

    /**
     * Set departureLocation
     *
     * @param string $departureLocation
     *
     * @return spevent
     */
    public function setDepartureLocation($departureLocation)
    {
        $this->departureLocation = $departureLocation;

        return $this;
    }

    /**
     * Get departureLocation
     *
     * @return string
     */
    public function getDepartureLocation()
    {
        return $this->departureLocation;
    }

    /**
     * Set departureDate
     *
     * @param \DateTime $departureDate
     *
     * @return spevent
     */
    public function setDepartureDate($departureDate)
    {
        $this->departureDate = $departureDate;

        return $this;
    }

    /**
     * Get departureDate
     *
     * @return \DateTime
     */
    public function getDepartureDate()
    {
        return $this->departureDate;
    }

    /**
     * Set spEventRate
     *
     * @param integer $spEventRate
     *
     * @return spevent
     */
    public function setSpEventRate($spEventRate)
    {
        $this->spEventRate = $spEventRate;

        return $this;
    }

    /**
     * Get spEventRate
     *
     * @return int
     */
    public function getSpEventRate()
    {
        return $this->spEventRate;
    }
}

