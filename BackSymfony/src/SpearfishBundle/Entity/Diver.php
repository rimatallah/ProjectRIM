<?php

namespace SpearfishBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Diver
 *
 * @ORM\Table(name="diver")
 * @ORM\Entity(repositoryClass="SpearfishBundle\Repository\DiverRepository")
 */
class Diver
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
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="diver_lvl", type="integer")
     */
    private $diverLvl;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255)
     */
    private $region;

    /**
     * @var bool
     *
     * @ORM\Column(name="transportation", type="boolean")
     */
    private $transportation;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Diver
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
     * Set diverLvl
     *
     * @param integer $diverLvl
     *
     * @return Diver
     */
    public function setDiverLvl($diverLvl)
    {
        $this->diverLvl = $diverLvl;

        return $this;
    }

    /**
     * Get diverLvl
     *
     * @return int
     */
    public function getDiverLvl()
    {
        return $this->diverLvl;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Diver
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set transportation
     *
     * @param boolean $transportation
     *
     * @return Diver
     */
    public function setTransportation($transportation)
    {
        $this->transportation = $transportation;

        return $this;
    }

    /**
     * Get transportation
     *
     * @return bool
     */
    public function getTransportation()
    {
        return $this->transportation;
    }
}

