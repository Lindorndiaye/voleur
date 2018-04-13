<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cycle
 *
 * @ORM\Table(name="cycle")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\CycleRepository")
 */
class Cycle
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
     * @ORM\OneToMany(targetEntity="UAHB\ScolariteBundle\Entity\Semestre", mappedBy="cycle")
     */
    private  $semestres;
    
    /**
     * @ORM\ManyToMany(targetEntity="UAHB\ScolariteBundle\Entity\Professeur")
     */
    private $professeurs;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle.
     *
     * @param string $libelle
     *
     * @return Cycle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle.
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
        $this->semestres = new \Doctrine\Common\Collections\ArrayCollection();
        $this->professeurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add semestre.
     *
     * @param \UAHB\ScolariteBundle\Entity\Semestre $semestre
     *
     * @return Cycle
     */
    public function addSemestre(\UAHB\ScolariteBundle\Entity\Semestre $semestre)
    {
        $this->semestres[] = $semestre;

        return $this;
    }

    /**
     * Remove semestre.
     *
     * @param \UAHB\ScolariteBundle\Entity\Semestre $semestre
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSemestre(\UAHB\ScolariteBundle\Entity\Semestre $semestre)
    {
        return $this->semestres->removeElement($semestre);
    }

    /**
     * Get semestres.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSemestres()
    {
        return $this->semestres;
    }

    /**
     * Add professeur.
     *
     * @param \UAHB\ScolariteBundle\Entity\Professeur $professeur
     *
     * @return Cycle
     */
    public function addProfesseur(\UAHB\ScolariteBundle\Entity\Professeur $professeur)
    {
        $this->professeurs[] = $professeur;

        return $this;
    }

    /**
     * Remove professeur.
     *
     * @param \UAHB\ScolariteBundle\Entity\Professeur $professeur
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProfesseur(\UAHB\ScolariteBundle\Entity\Professeur $professeur)
    {
        return $this->professeurs->removeElement($professeur);
    }

    /**
     * Get professeurs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfesseurs()
    {
        return $this->professeurs;
    }
}
