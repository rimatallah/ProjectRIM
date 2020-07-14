<?php

namespace ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * billet
 *
 * @ORM\Table(name="billet")
 * @ORM\Entity(repositoryClass="ActiviteBundle\Repository\billetRepository")
 */
class billet
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
     * @ORM\Column(name="act_id", type="integer")
     */
    private $actId;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


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
     * Set actId
     *
     * @param integer $actId
     *
     * @return billet
     */
    public function setActId($actId)
    {
        $this->actId = $actId;

        return $this;
    }

    /**
     * Get actId
     *
     * @return int
     */
    public function getActId()
    {
        return $this->actId;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return billet
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return billet
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return billet
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }
}

