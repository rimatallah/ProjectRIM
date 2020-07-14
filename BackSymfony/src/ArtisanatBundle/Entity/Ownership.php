<?php

namespace ArtisanatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ownership
 *
 * @ORM\Table(name="ownership" ,
   uniqueConstraints={
    @ORM\UniqueConstraint(name="ownership_unique", columns={"user", "shop", "type"})
    })
 * @ORM\Entity(repositoryClass="ArtisanatBundle\Repository\OwnershipRepository")
 */
class Ownership
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
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Shop")
     * @ORM\JoinColumn(name="shop", referencedColumnName="id", nullable=false)
     */
    private $shop;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type = "OWNER";


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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * @param mixed $shop
     */
    public function setShop($shop)
    {
        $this->shop = $shop;
    }



    /**
     * Set type
     *
     * @param string $type
     *
     * @return Ownership
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}

