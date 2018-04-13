<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\InscriptionRepository")
 */
class Inscription
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
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="typeSocial", type="string", length=20)
     */
    private $typeSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="modePaiement", type="string", length=40)
     */
    private $modePaiement;

    /**
     * @var int
     *
     * @ORM\Column(name="montantAccorde", type="integer")
     */
    private $montantAccorde;

    /**
     * @var string
     *
     * @ORM\Column(name="regime", type="string", length=20)
     */
    private $regime;

    /**
     * @var string
     *
     * @ORM\Column(name="observation", type="string", length=255)
     */
    private $observation;

    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\Etudiant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\ClasseOption", inversedBy="inscriptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classeOption;
    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\AnneeScolaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anneeAccad;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etudiant = new \UAHB\ScolariteBundle\Entity\Etudiant();
        $this->classeOption = new \UAHB\ScolariteBundle\Entity\ClasseOption();
    }


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Inscription
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set typeSocial
     *
     * @param string $typeSocial
     *
     * @return Inscription
     */
    public function setTypeSocial($typeSocial)
    {
        $this->typeSocial = $typeSocial;

        return $this;
    }

    /**
     * Get typeSocial
     *
     * @return string
     */
    public function getTypeSocial()
    {
        return $this->typeSocial;
    }

    /**
     * Set modePaiement
     *
     * @param string $modePaiement
     *
     * @return Inscription
     */
    public function setModePaiement($modePaiement)
    {
        $this->modePaiement = $modePaiement;

        return $this;
    }

    /**
     * Get modePaiement
     *
     * @return string
     */
    public function getModePaiement()
    {
        return $this->modePaiement;
    }

    /**
     * Set montantAccorde
     *
     * @param integer $montantAccorde
     *
     * @return Inscription
     */
    public function setMontantAccorde($montantAccorde)
    {
        $this->montantAccorde = $montantAccorde;

        return $this;
    }

    /**
     * Get montantAccorde
     *
     * @return int
     */
    public function getMontantAccorde()
    {
        return $this->montantAccorde;
    }

    /**
     * Set regime
     *
     * @param string $regime
     *
     * @return Inscription
     */
    public function setRegime($regime)
    {
        $this->regime = $regime;

        return $this;
    }

    /**
     * Get regime
     *
     * @return string
     */
    public function getRegime()
    {
        return $this->regime;
    }

    /**
     * Set observation
     *
     * @param string $observation
     *
     * @return Inscription
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set etudiant
     *
     * @param \UAHB\ScolariteBundle\Entity\Etudiant $etudiant
     *
     * @return Inscription
     */
    public function setEtudiant(\UAHB\ScolariteBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \UAHB\ScolariteBundle\Entity\Etudiant
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }

    /**
     * Set classeOption
     *
     * @param \UAHB\ScolariteBundle\Entity\ClasseOption $classeOption
     *
     * @return Inscription
     */
    public function setClasseOption(\UAHB\ScolariteBundle\Entity\ClasseOption $classeOption)
    {
        $this->classeOption = $classeOption;

        return $this;
    }

    /**
     * Get classeOption
     *
     * @return \UAHB\ScolariteBundle\Entity\ClasseOption
     */
    public function getClasseOption()
    {
        return $this->classeOption;
    }

    /**
     * Set anneeAccad
     *
     * @param \UAHB\ScolariteBundle\Entity\AnneeScolaire $anneeAccad
     *
     * @return Inscription
     */
    public function setAnneeAccad(\UAHB\ScolariteBundle\Entity\AnneeScolaire $anneeAccad)
    {
        $this->anneeAccad = $anneeAccad;

        return $this;
    }

    /**
     * Get anneeAccad
     *
     * @return \UAHB\ScolariteBundle\Entity\AnneeScolaire
     */
    public function getAnneeAccad()
    {
        return $this->anneeAccad;
    }
}
