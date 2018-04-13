<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filiere
 *
 * @ORM\Table(name="filiere")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\FiliereRepository")
 */
class Filiere
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
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="UAHB\ScolariteBundle\Entity\Departement", inversedBy="filieres")
     * @ORM\JoinColumn(nullable=false)
    */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity="UAHB\ScolariteBundle\Entity\Classe", mappedBy="filiere")
     * @ORM\JoinColumn(nullable=true)
     */
    private $classes;


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
     * @return Filiere
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
        $this->classes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set departement
     *
     * @param \UAHB\ScolariteBundle\Entity\Departement $departement
     *
     * @return Filiere
     */
    public function setDepartement(\UAHB\ScolariteBundle\Entity\Departement $departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \UAHB\ScolariteBundle\Entity\Departement
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Add class
     *
     * @param \UAHB\ScolariteBundle\Entity\Classe $class
     *
     * @return Filiere
     */
    public function addClass(\UAHB\ScolariteBundle\Entity\Classe $class)
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * Remove class
     *
     * @param \UAHB\ScolariteBundle\Entity\Classe $class
     */
    public function removeClass(\UAHB\ScolariteBundle\Entity\Classe $class)
    {
        $this->classes->removeElement($class);
    }

    /**
     * Get classes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClasses()
    {
        return $this->classes;
    }

    public function __toString(){
        return $this->libelle;
    }
}
