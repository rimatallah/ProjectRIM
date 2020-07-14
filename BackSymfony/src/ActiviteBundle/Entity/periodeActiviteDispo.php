<?php

namespace ActiviteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * periodeActiviteDispo
 *
 * @ORM\Table(name="periode_activite_dispo")
 * @ORM\Entity(repositoryClass="ActiviteBundle\Repository\periodeActiviteDispoRepository")
 */
class periodeActiviteDispo
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_inactive", type="date")
     */
    private $dateInactive;


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
     * Set dateInactive
     *
     * @param \DateTime $dateInactive
     *
     * @return periodeActiviteDispo
     */
    public function setDateInactive($dateInactive)
    {
        $this->dateInactive = $dateInactive;

        return $this;
    }

    /**
     * Get dateInactive
     *
     * @return \DateTime
     */
    public function getDateInactive()
    {
        return $this->dateInactive;
    }
}

