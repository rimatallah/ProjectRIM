<?php

namespace SpearfishBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fish
 *
 * @ORM\Table(name="fish")
 * @ORM\Entity(repositoryClass="SpearfishBundle\Repository\FishRepository")
 */
class Fish
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
     * @ORM\Column(name="id_fish", type="string", length=255, unique=true)
     */
    private $idFish;

    /**
     * @var string
     *
     * @ORM\Column(name="fish_image", type="string",length=255, nullable=true)
     */
    private $fishImage;

    /**
     * @var string
     *
     * @ORM\Column(name="fish_description", type="string", length=500)
     */
    private $fishDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="season", type="string", length=255)
     */
    private $season;

    /**
     * @var int
     *
     * @ORM\Column(name="min_depth", type="integer")
     */
    private $minDepth;


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
     * Set idFish
     *
     * @param string $idFish
     *
     * @return Fish
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

    /**
     * Set fishImage
     *
     * @param string $fishImage
     *
     * @return Fish
     */
    public function setFishImage($fishImage)
    {
        $this->fishImage = $fishImage;

        return $this;
    }

    /**
     * Get fishImage
     *
     * @return string
     */
    public function getFishImage()
    {
        return $this->fishImage;
    }

    /**
     * Set fishDescription
     *
     * @param string $fishDescription
     *
     * @return Fish
     */
    public function setFishDescription($fishDescription)
    {
        $this->fishDescription = $fishDescription;

        return $this;
    }

    /**
     * Get fishDescription
     *
     * @return string
     */
    public function getFishDescription()
    {
        return $this->fishDescription;
    }

    /**
     * Set season
     *
     * @param string $season
     *
     * @return Fish
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return string
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set minDepth
     *
     * @param integer $minDepth
     *
     * @return Fish
     */
    public function setMinDepth($minDepth)
    {
        $this->minDepth = $minDepth;

        return $this;
    }

    /**
     * Get minDepth
     *
     * @return int
     */
    public function getMinDepth()
    {
        return $this->minDepth;
    }
}

