<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="matiere")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\MatiereRepository")
 */
class Matiere
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
     * @ORM\Column(name="libelle", type="string", length=40, unique=true)
     */
    private $libelle;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreDeCredit", type="integer")
     */
    private $nombreDeCredit;
    
    /**
     * @ORM\ManyToOne(targetEntity="UAHB\ScolariteBundle\Entity\UniteEnseignement", inversedBy="matiere")
     * @ORM\JoinColumn(nullable=false)
    */
    private $uniteenseignement;

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
     * @return Matiere
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
     * Set nombreDeCredit.
     *
     * @param int $nombreDeCredit
     *
     * @return Matiere
     */
    public function setNombreDeCredit($nombreDeCredit)
    {
        $this->nombreDeCredit = $nombreDeCredit;

        return $this;
    }

    /**
     * Get nombreDeCredit.
     *
     * @return int
     */
    public function getNombreDeCredit()
    {
        return $this->nombreDeCredit;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->professeurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set uniteenseignement.
     *
     * @param \UAHB\ScolariteBundle\Entity\UniteEnseignement $uniteenseignement
     *
     * @return Matiere
     */
    public function setUniteenseignement(\UAHB\ScolariteBundle\Entity\UniteEnseignement $uniteenseignement)
    {
        $this->uniteenseignement = $uniteenseignement;

        return $this;
    }

    /**
     * Get uniteenseignement.
     *
     * @return \UAHB\ScolariteBundle\Entity\UniteEnseignement
     */
    public function getUniteenseignement()
    {
        return $this->uniteenseignement;
    }

}
