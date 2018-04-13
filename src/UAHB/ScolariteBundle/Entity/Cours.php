<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\CoursRepository")
 */
class Cours
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
     * @ORM\Column(name="jour", type="string", length=12)
     */
    private $jour;

    /**
     * @var string
     *
     * @ORM\Column(name="heureDebut", type="string", length=10)
     */
    private $heureDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="heureFin", type="string", length=10)
     */
    private $heureFin;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreHeureParSeance", type="integer")
     */
    private $nombreHeureParSeance;
    
    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\Semestre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $semestre;
    
    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\Professeur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $professeur;
    
    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\Matiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matiere;


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
     * Set jour.
     *
     * @param string $jour
     *
     * @return Cours
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour.
     *
     * @return string
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set heureDebut.
     *
     * @param string $heureDebut
     *
     * @return Cours
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    /**
     * Get heureDebut.
     *
     * @return string
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * Set heureFin.
     *
     * @param string $heureFin
     *
     * @return Cours
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    /**
     * Get heureFin.
     *
     * @return string
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * Set nombreHeureParSeance.
     *
     * @param int $nombreHeureParSeance
     *
     * @return Cours
     */
    public function setNombreHeureParSeance($nombreHeureParSeance)
    {
        $this->nombreHeureParSeance = $nombreHeureParSeance;

        return $this;
    }

    /**
     * Get nombreHeureParSeance.
     *
     * @return int
     */
    public function getNombreHeureParSeance()
    {
        return $this->nombreHeureParSeance;
    }

    /**
     * Set semestre.
     *
     * @param \UAHB\ScolariteBundle\Entity\Semestre|null $semestre
     *
     * @return Cours
     */
    public function setSemestre(\UAHB\ScolariteBundle\Entity\Semestre $semestre = null)
    {
        $this->semestre = $semestre;

        return $this;
    }

    /**
     * Get semestre.
     *
     * @return \UAHB\ScolariteBundle\Entity\Semestre|null
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * Set professeur.
     *
     * @param \UAHB\ScolariteBundle\Entity\Professeur|null $professeur
     *
     * @return Cours
     */
    public function setProfesseur(\UAHB\ScolariteBundle\Entity\Professeur $professeur = null)
    {
        $this->professeur = $professeur;

        return $this;
    }

    /**
     * Get professeur.
     *
     * @return \UAHB\ScolariteBundle\Entity\Professeur|null
     */
    public function getProfesseur()
    {
        return $this->professeur;
    }

    /**
     * Set matiere.
     *
     * @param \UAHB\ScolariteBundle\Entity\Matiere|null $matiere
     *
     * @return Cours
     */
    public function setMatiere(\UAHB\ScolariteBundle\Entity\Matiere $matiere = null)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere.
     *
     * @return \UAHB\ScolariteBundle\Entity\Matiere|null
     */
    public function getMatiere()
    {
        return $this->matiere;
    }
}
