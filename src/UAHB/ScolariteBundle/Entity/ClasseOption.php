<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClasseOption
 *
 * @ORM\Table(name="classe_option")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\ClasseOptionRepository")
 */
class ClasseOption
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
     * @ORM\Column(name="libelle", type="string", length=30)
     */
    private $libelle;


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
     * @ORM\ManyToOne(targetEntity="UAHB\ScolariteBundle\Entity\Classe", inversedBy="classeOptions")
     * @ORM\JoinColumn(nullable=false)
    */
    private $classe;

    /**
     * @ORM\OneToMany(targetEntity="UAHB\ScolariteBundle\Entity\Inscription", mappedBy="classeOption")
     * @ORM\JoinColumn(nullable=false)
    */
    private $inscriptions; 
    
    /**
     * @ORM\OneToMany(targetEntity="UAHB\ScolariteBundle\Entity\UniteEnseignement", mappedBy="classeOption")
     * @ORM\JoinColumn(nullable=false)
    */
    private $uniteenseignements; 


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->inscriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->uniteenseignements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return ClasseOption
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
     * Set classe
     *
     * @param \UAHB\ScolariteBundle\Entity\Classe $classe
     *
     * @return ClasseOption
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

    /**
     * Add inscription
     *
     * @param \UAHB\ScolariteBundle\Entity\Inscription $inscription
     *
     * @return ClasseOption
     */
    public function addInscription(\UAHB\ScolariteBundle\Entity\Inscription $inscription)
    {
        $this->inscriptions[] = $inscription;

        return $this;
    }

    /**
     * Remove inscription
     *
     * @param \UAHB\ScolariteBundle\Entity\Inscription $inscription
     */
    public function removeInscription(\UAHB\ScolariteBundle\Entity\Inscription $inscription)
    {
        $this->inscriptions->removeElement($inscription);
    }

    /**
     * Get inscriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInscriptions()
    {
        return $this->inscriptions;
    }

    /**
     * Add uniteenseignement
     *
     * @param \UAHB\ScolariteBundle\Entity\UniteEnseignement $uniteenseignement
     *
     * @return ClasseOption
     */
    public function addUniteenseignement(\UAHB\ScolariteBundle\Entity\UniteEnseignement $uniteenseignement)
    {
        $this->uniteenseignements[] = $uniteenseignement;

        return $this;
    }

    /**
     * Remove uniteenseignement
     *
     * @param \UAHB\ScolariteBundle\Entity\UniteEnseignement $uniteenseignement
     */
    public function removeUniteenseignement(\UAHB\ScolariteBundle\Entity\UniteEnseignement $uniteenseignement)
    {
        $this->uniteenseignements->removeElement($uniteenseignement);
    }

    /**
     * Get uniteenseignements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUniteenseignements()
    {
        return $this->uniteenseignements;
    }
}
