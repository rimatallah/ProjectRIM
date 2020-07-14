<?php

namespace HikingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity(repositoryClass="HikingBundle\Repository\CommentsRepository")
 */
class Comments
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
     * @ORM\Column(name="id_participant", type="integer")
     * @ORM\Column(name="id_participant", type="integer")
     */
    private $idParticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="id_publication", type="string", length=255)
     */
    private $idPublication;


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
     * Set idParticipant
     *
     * @param string $idParticipant
     *
     * @return Comments
     */
    public function setIdParticipant($idParticipant)
    {
        $this->idParticipant = $idParticipant;

        return $this;
    }

    /**
     * Get idParticipant
     *
     * @return string
     */
    public function getIdParticipant()
    {
        return $this->idParticipant;
    }

    /**
     * Set idPublication
     *
     * @param string $idPublication
     *
     * @return Comments
     */
    public function setIdPublication($idPublication)
    {
        $this->idPublication = $idPublication;

        return $this;
    }

    /**
     * Get idPublication
     *
     * @return string
     */
    public function getIdPublication()
    {
        return $this->idPublication;
    }


    /**
     * Set text
     *
     * @param string $text
     *
     * @return Comments
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

