<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faculte
 *
 * @ORM\Table(name="faculte")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\FaculteRepository")
 */
class Faculte
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
     * @ORM\Column(name="libelle", type="string", length=100)
     */
    private $libelle;
    /**
     * @ORM\OneToMany(targetEntity="UAHB\ScolariteBundle\Entity\Departement", mappedBy="faculte")
     */
    private $departements;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Faculte
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->departements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add departement
     *
     * @param \UAHB\ScolariteBundle\Entity\Departement $departement
     *
     * @return Faculte
     */
    public function addDepartement(\UAHB\ScolariteBundle\Entity\Departement $departement)
    {
        $this->departements[] = $departement;

        return $this;
    }

    /**
     * Remove departement
     *
     * @param \UAHB\ScolariteBundle\Entity\Departement $departement
     */
    public function removeDepartement(\UAHB\ScolariteBundle\Entity\Departement $departement)
    {
        $this->departements->removeElement($departement);
    }

    /**
     * Get departements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDepartements()
    {
        return $this->departements;
    }
}
