<?php

namespace ArtisanatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * price
 *
 * @ORM\Table(name="price")
 * @ORM\Entity(repositoryClass="ArtisanatBundle\Repository\priceRepository")
 */
class Price
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
     * @ORM\ManyToOne(targetEntity="Shop")
     * @ORM\JoinColumn(name="shop", referencedColumnName="id")
     */
    private $shop;

    /**
     * @ORM\ManyToOne(targetEntity="ArtisanatBundle\Entity\Product")
     * @ORM\JoinColumn(name="product", referencedColumnName="id")
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;


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
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }



    /**
     * Set value
     *
     * @param string $value
     *
     * @return price
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}

