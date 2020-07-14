<?php

namespace HostingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis")
 * @ORM\Entity(repositoryClass="HostingBundle\Repository\AvisRepository")
 */
class Avis
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
     * @ORM\Column(name="id_host", type="integer")
     */
    private $idHost;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;


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
     * Set idHost
     *
     * @param integer $idHost
     *
     * @return Avis
     */
    public function setIdHost($idHost)
    {
        $this->idHost = $idHost;

        return $this;
    }

    /**
     * Get idHost
     *
     * @return int
     */
    public function getIdHost()
    {
        return $this->idHost;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Avis
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}

