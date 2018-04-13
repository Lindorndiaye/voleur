<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UniteEnseignement
 *
 * @ORM\Table(name="unite_enseignement")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\UniteEnseignementRepository")
 */
class UniteEnseignement
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
     * @ORM\OneToMany(targetEntity="UAHB\ScolariteBundle\Entity\Matiere", mappedBy="uniteeseignement")
     */
    private $matieres;
    
    /**
     * @ORM\ManyToOne(targetEntity="UAHB\ScolariteBundle\Entity\ClasseOption", inversedBy="uniteenseignements")
     * @ORM\JoinColumn(nullable=true)
    */
    private $classeOption;

    /**
     * @ORM\ManyToOne(targetEntity="UAHB\ScolariteBundle\Entity\Classe", inversedBy="uniteenseignements")
     * @ORM\JoinColumn(nullable=false)
    */
    private $classe;

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
     * @return UniteEnseignement
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
        $this->matieres = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add matiere.
     *
     * @param \UAHB\ScolariteBundle\Entity\Filiere $matiere
     *
     * @return UniteEnseignement
     */
    public function addMatiere(\UAHB\ScolariteBundle\Entity\Filiere $matiere)
    {
        $this->matieres[] = $matiere;

        return $this;
    }

    /**
     * Remove matiere.
     *
     * @param \UAHB\ScolariteBundle\Entity\Filiere $matiere
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMatiere(\UAHB\ScolariteBundle\Entity\Filiere $matiere)
    {
        return $this->matieres->removeElement($matiere);
    }

    /**
     * Get matieres.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMatieres()
    {
        return $this->matieres;
    }

    /**
     * Set classeOption.
     *
     * @param \UAHB\ScolariteBundle\Entity\Matiere $classeOption
     *
     * @return UniteEnseignement
     */
    public function setClasseOption(\UAHB\ScolariteBundle\Entity\Matiere $classeOption)
    {
        $this->classeOption = $classeOption;

        return $this;
    }

    /**
     * Get classeOption.
     *
     * @return \UAHB\ScolariteBundle\Entity\Matiere
     */
    public function getClasseOption()
    {
        return $this->classeOption;
    }

    /**
     * Set classe
     *
     * @param \UAHB\ScolariteBundle\Entity\Classe $classe
     *
     * @return UniteEnseignement
     */
    public function setClasse(\UAHB\ScolariteBundle\Entity\Classe $classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return \UAHB\ScolariteBundle\Entity\Classe
     */
    public function getClasse()
    {
        return $this->classe;
    }
}
