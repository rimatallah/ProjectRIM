<?php

namespace SpearfishBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fishspot
 *
 * @ORM\Table(name="fishspot")
 * @ORM\Entity(repositoryClass="SpearfishBundle\Repository\FishspotRepository")
 */
class Fishspot
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
     * @ORM\Column(name="id_spot", type="integer")
     */
    private $idSpot;

    /**
     * @var string
     *
     * @ORM\Column(name="id_fish", type="string", length=255)
     */
    private $idFish;


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
     * Set idSpot
     *
     * @param integer $idSpot
     *
     * @return Fishspot
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
     * Set idFish
     *
     * @param string $idFish
     *
     * @return Fishspot
     */
    public function setIdFish($idFish)
    {
        $this->idFish = $idFish;

        return $this;
    }

    /**
     * Get idFish
     *
     * @return string
     */
    public function getIdFish()
    {
        return $this->idFish;
    }
}

