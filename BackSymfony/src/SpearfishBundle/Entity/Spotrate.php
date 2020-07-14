<?php

namespace SpearfishBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spotrate
 *
 * @ORM\Table(name="spotrate")
 * @ORM\Entity(repositoryClass="SpearfishBundle\Repository\SpotrateRepository")
 */
class Spotrate
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
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="n_stars", type="integer")
     */
    private $nStars;


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
     * @return Spotrate
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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Spotrate
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set nStars
     *
     * @param integer $nStars
     *
     * @return Spotrate
     */
    public function setNStars($nStars)
    {
        $this->nStars = $nStars;

        return $this;
    }

    /**
     * Get nStars
     *
     * @return int
     */
    public function getNStars()
    {
        return $this->nStars;
    }
}

