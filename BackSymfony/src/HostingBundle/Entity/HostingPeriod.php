<?php

namespace HostingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HostingPeriod
 *
 * @ORM\Table(name="hosting_period")
 * @ORM\Entity(repositoryClass="HostingBundle\Repository\HostingPeriodRepository")
 */
class HostingPeriod
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
     * @ORM\Column(name="start_date", type="date")
     */
    private $startDate;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_days_confirmed", type="integer")
     */
    private $nbrDaysConfirmed;

    /**
     * @var string
     *
     * @ORM\Column(name="text_demande", type="string", length=255)
     */
    private $textDemande;


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
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return HostingPeriod
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set nbrDaysConfirmed
     *
     * @param integer $nbrDaysConfirmed
     *
     * @return HostingPeriod
     */
    public function setNbrDaysConfirmed($nbrDaysConfirmed)
    {
        $this->nbrDaysConfirmed = $nbrDaysConfirmed;

        return $this;
    }

    /**
     * Get nbrDaysConfirmed
     *
     * @return int
     */
    public function getNbrDaysConfirmed()
    {
        return $this->nbrDaysConfirmed;
    }

    /**
     * Set textDemande
     *
     * @param string $textDemande
     *
     * @return HostingPeriod
     */
    public function setTextDemande($textDemande)
    {
        $this->textDemande = $textDemande;

        return $this;
    }

    /**
     * Get textDemande
     *
     * @return string
     */
    public function getTextDemande()
    {
        return $this->textDemande;
    }
}

