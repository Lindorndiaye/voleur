<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\DepartementRepository")
 */
class Departement
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
     * @ORM\Column(name="libelle", type="string", length=50, unique=true)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="UAHB\ScolariteBundle\Entity\Faculte", inversedBy="departements")
     * @ORM\JoinColumn(nullable=false)
    */
    private $faculte;

    /**
     * @ORM\OneToMany(targetEntity="UAHB\ScolariteBundle\Entity\Filiere", mappedBy="departement")
     */
    private $filieres;


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
     * @return Departement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = trim($libelle);

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
        $this->filieres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set faculte
     *
     * @param \UAHB\ScolariteBundle\Entity\Faculte $faculte
     *
     * @return Departement
     */
    public function setFaculte(\UAHB\ScolariteBundle\Entity\Faculte $faculte)
    {
        $this->faculte = $faculte;

        return $this;
    }

    /**
     * Get faculte
     *
     * @return \UAHB\ScolariteBundle\Entity\Faculte
     */
    public function getFaculte()
    {
        return $this->faculte;
    }

    /**
     * Add filiere
     *
     * @param \UAHB\ScolariteBundle\Entity\Filiere $filiere
     *
     * @return Departement
     */
    public function addFiliere(\UAHB\ScolariteBundle\Entity\Filiere $filiere)
    {
        $this->filieres[] = $filiere;

        return $this;
    }

    /**
     * Remove filiere
     *
     * @param \UAHB\ScolariteBundle\Entity\Filiere $filiere
     */
    public function removeFiliere(\UAHB\ScolariteBundle\Entity\Filiere $filiere)
    {
        $this->filieres->removeElement($filiere);
    }

    /**
     * Get filieres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFilieres()
    {
        return $this->filieres;
    }

    public function __toString(){
        return $this->libelle;
    }
}
