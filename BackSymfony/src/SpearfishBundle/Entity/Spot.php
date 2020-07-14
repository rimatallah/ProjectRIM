<?php

namespace SpearfishBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spot
 *
 * @ORM\Table(name="spot")
 * @ORM\Entity(repositoryClass="SpearfishBundle\Repository\SpotRepository")
 */
class Spot
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
     * @ORM\Column(name="id_region", type="string", length=255)
     */
    private $idRegion;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var bool
     *
     * @ORM\Column(name="acces_route", type="boolean")
     */
    private $accesRoute;

    /**
     * @var int
     *
     * @ORM\Column(name="depth", type="integer")
     */
    private $depth;

    /**
     * @var string
     *
     * @ORM\Column(name="spot_description", type="string", length=255)
     */
    private $spotDescription;

    /**
     * @var int
     *
     * @ORM\Column(name="lvl", type="integer")
     */
    private $lvl;


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
     * Set idRegion
     *
     * @param string $idRegion
     *
     * @return Spot
     */
    public function setIdRegion($idRegion)
    {
        $this->idRegion = $idRegion;

        return $this;
    }

    /**
     * Get idRegion
     *
     * @return string
     */
    public function getIdRegion()
    {
        return $this->idRegion;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     *
     * @return Spot
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     *
     * @return Spot
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set accesRoute
     *
     * @param boolean $accesRoute
     *
     * @return Spot
     */
    public function setAccesRoute($accesRoute)
    {
        $this->accesRoute = $accesRoute;

        return $this;
    }

    /**
     * Get accesRoute
     *
     * @return bool
     */
    public function getAccesRoute()
    {
        return $this->accesRoute;
    }

    /**
     * Set depth
     *
     * @param integer $depth
     *
     * @return Spot
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Get depth
     *
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Set spotDescription
     *
     * @param string $spotDescription
     *
     * @return Spot
     */
    public function setSpotDescription($spotDescription)
    {
        $this->spotDescription = $spotDescription;

        return $this;
    }

    /**
     * Get spotDescription
     *
     * @return string
     */
    public function getSpotDescription()
    {
        return $this->spotDescription;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     *
     * @return Spot
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return int
     */
    public function getLvl()
    {
        return $this->lvl;
    }
}

