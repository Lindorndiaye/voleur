<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semestre
 *
 * @ORM\Table(name="semestre")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\SemestreRepository")
 */
class Semestre
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
     * @ORM\Column(name="libelle", type="string", length=20)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="UAHB\ScolariteBundle\Entity\Cycle", inversedBy="semestres")
     * @ORM\JoinColumn(nullable=false)
    */
    private $cycle;

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
     * @return Semestre
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
     * Set cycle.
     *
     * @param \UAHB\ScolariteBundle\Entity\Cycle $cycle
     *
     * @return Semestre
     */
    public function setCycle(\UAHB\ScolariteBundle\Entity\Cycle $cycle)
    {
        $this->cycle = $cycle;

        return $this;
    }

    /**
     * Get cycle.
     *
     * @return \UAHB\ScolariteBundle\Entity\Cycle
     */
    public function getCycle()
    {
        return $this->cycle;
    }
}
