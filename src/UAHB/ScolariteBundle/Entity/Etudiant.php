<?php

namespace UAHB\ScolariteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="UAHB\ScolariteBundle\Repository\EtudiantRepository")
 */
class Etudiant
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
     * @ORM\Column(name="prenom", type="string", length=50)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=50)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=10)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="situationMaritale", type="string", length=25)
     */
    private $situationMaritale;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=50, nullable=true)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="religion", type="string", length=50, nullable=true)
     */
    private $religion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuNaissance", type="string", length=50)
     */
    private $lieuNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="telephoneFixe", type="string", length=20)
     */
    private $telephoneFixe;

    /**
     * @var string
     *
     * @ORM\Column(name="telephonePostable1", type="string", length=20)
     */
    private $telephonePortable1;

    /**
     * @var string
     *
     * @ORM\Column(name="telephonePostable2", type="string", length=20)
     */
    private $telephonePortable2;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\Personne", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $pere;
    
    
    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\Personne", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $mere;


    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\Personne", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $tuteur;

    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\Personne", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $personneAcontacter;
    
    /**
     * @var int
     *
     * @ORM\Column(name="nbenfant", type="integer", length=20, nullable=true)
     */
    private $nbenfant;


    /**
     * @ORM\ManyToOne(targetEntity="UAHB\ScolariteBundle\Entity\Pays")
     * @ORM\JoinColumn(name="pays_id", referencedColumnName="id",nullable=false)
     */
    private $paysOrigine;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=80)
     */
    private $nationalite;

    /**
     * @ORM\OneToOne(targetEntity="UAHB\ScolariteBundle\Entity\Diplome", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $diplome;

    /**
     * @var string
     *
     * @ORM\Column(name="etablissementDorigine", type="string", length=100, nullable=true)
     */
    private $etablissementDorigine;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseEtablissementDorigine", type="string", length=100, nullable=true)
     */
    private $adresseEtablissementDorigine;

    /**
     * @var string
     *
     * @ORM\Column(name="filiereAnterieur", type="string", length=100, nullable=true)
     */
    private $filiereAnterieur;

    /**
     * @var string
     *
     * @ORM\Column(name="classeAnterieur", type="string", length=100, nullable=true)
     */
    private $classeAnterieur;

    /**
     * @var string
     *
     * @ORM\Column(name="niveauDentreeUahb", type="string", length=100, nullable=true)
     */
    private $niveauDentreeUahb;

    /**
     * @var string
     *
     * @ORM\Column(name="commentConnaisTuUahb", type="string", length=100, nullable=true)
     */
    private $commentConnaisTuUahb;

    /**
     * @var string
     *
     * @ORM\Column(name="posteOccupe", type="string", length=30, nullable=true)
     */
    private $posteOccupe;

    /**
     * @var string
     *
     * @ORM\Column(name="employeur", type="string", length=30, nullable=true)
     */
    private $employeur;

    /**
     * @var string
     *
     * @ORM\Column(name="timing", type="string", length=30, nullable=true)
     */
    private $timing;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuDeTravail", type="string", length=30, nullable=true)
     */
    private $lieuDeTravail;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseProfessionnelle", type="string", length=100, nullable=true)
     */
    private $adresseProfessionnelle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="data", type="blob", nullable=true)
     */
    private $photo;
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pere = new \UAHB\ScolariteBundle\Entity\Personne();
        $this->mere = new \UAHB\ScolariteBundle\Entity\Personne();
        $this->tuteur = new \UAHB\ScolariteBundle\Entity\Personne();
        $this->personneAcontacter = new \UAHB\ScolariteBundle\Entity\Personne();
        $this->diplome = new \UAHB\ScolariteBundle\Entity\Diplome();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Etudiant
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Etudiant
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Etudiant
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set situationMaritale
     *
     * @param string $situationMaritale
     *
     * @return Etudiant
     */
    public function setSituationMaritale($situationMaritale)
    {
        $this->situationMaritale = $situationMaritale;

        return $this;
    }

    /**
     * Get situationMaritale
     *
     * @return string
     */
    public function getSituationMaritale()
    {
        return $this->situationMaritale;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Etudiant
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Etudiant
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Etudiant
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Etudiant
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nbenfant
     *
     * @param integer $nbenfant
     *
     * @return Etudiant
     */
    public function setNbenfant($nbenfant)
    {
        $this->nbenfant = $nbenfant;

        return $this;
    }

    /**
     * Get nbenfant
     *
     * @return integer
     */
    public function getNbenfant()
    {
        return $this->nbenfant;
    }

    /**
     * Set etablissementDorigine
     *
     * @param string $etablissementDorigine
     *
     * @return Etudiant
     */
    public function setEtablissementDorigine($etablissementDorigine)
    {
        $this->etablissementDorigine = $etablissementDorigine;

        return $this;
    }

    /**
     * Get etablissementDorigine
     *
     * @return string
     */
    public function getEtablissementDorigine()
    {
        return $this->etablissementDorigine;
    }

    /**
     * Set adresseEtablissementDorigine
     *
     * @param string $adresseEtablissementDorigine
     *
     * @return Etudiant
     */
    public function setAdresseEtablissementDorigine($adresseEtablissementDorigine)
    {
        $this->adresseEtablissementDorigine = $adresseEtablissementDorigine;

        return $this;
    }

    /**
     * Get adresseEtablissementDorigine
     *
     * @return string
     */
    public function getAdresseEtablissementDorigine()
    {
        return $this->adresseEtablissementDorigine;
    }

    /**
     * Set filiereAnterieur
     *
     * @param string $filiereAnterieur
     *
     * @return Etudiant
     */
    public function setFiliereAnterieur($filiereAnterieur)
    {
        $this->filiereAnterieur = $filiereAnterieur;

        return $this;
    }

    /**
     * Get filiereAnterieur
     *
     * @return string
     */
    public function getFiliereAnterieur()
    {
        return $this->filiereAnterieur;
    }

    /**
     * Set classeAnterieur
     *
     * @param string $classeAnterieur
     *
     * @return Etudiant
     */
    public function setClasseAnterieur($classeAnterieur)
    {
        $this->classeAnterieur = $classeAnterieur;

        return $this;
    }

    /**
     * Get classeAnterieur
     *
     * @return string
     */
    public function getClasseAnterieur()
    {
        return $this->classeAnterieur;
    }

    /**
     * Set niveauDentreeUahb
     *
     * @param string $niveauDentreeUahb
     *
     * @return Etudiant
     */
    public function setNiveauDentreeUahb($niveauDentreeUahb)
    {
        $this->niveauDentreeUahb = $niveauDentreeUahb;

        return $this;
    }

    /**
     * Get niveauDentreeUahb
     *
     * @return string
     */
    public function getNiveauDentreeUahb()
    {
        return $this->niveauDentreeUahb;
    }

    /**
     * Set commentConnaisTuUahb
     *
     * @param string $commentConnaisTuUahb
     *
     * @return Etudiant
     */
    public function setCommentConnaisTuUahb($commentConnaisTuUahb)
    {
        $this->commentConnaisTuUahb = $commentConnaisTuUahb;

        return $this;
    }

    /**
     * Get commentConnaisTuUahb
     *
     * @return string
     */
    public function getCommentConnaisTuUahb()
    {
        return $this->commentConnaisTuUahb;
    }


    /**
     * Set pere
     *
     * @param \UAHB\ScolariteBundle\Entity\Personne $pere
     *
     * @return Etudiant
     */
    public function setPere(\UAHB\ScolariteBundle\Entity\Personne $pere)
    {
        $this->pere = $pere;

        return $this;
    }

    /**
     * Get pere
     *
     * @return \UAHB\ScolariteBundle\Entity\Personne
     */
    public function getPere()
    {
        return $this->pere;
    }

    /**
     * Set mere
     *
     * @param \UAHB\ScolariteBundle\Entity\Personne $mere
     *
     * @return Etudiant
     */
    public function setMere(\UAHB\ScolariteBundle\Entity\Personne $mere)
    {
        $this->mere = $mere;

        return $this;
    }

    /**
     * Get mere
     *
     * @return \UAHB\ScolariteBundle\Entity\Personne
     */
    public function getMere()
    {
        return $this->mere;
    }

    /**
     * Set tuteur
     *
     * @param \UAHB\ScolariteBundle\Entity\Personne $tuteur
     *
     * @return Etudiant
     */
    public function setTuteur(\UAHB\ScolariteBundle\Entity\Personne $tuteur = null)
    {
        $this->tuteur = $tuteur;

        return $this;
    }

    /**
     * Get tuteur
     *
     * @return \UAHB\ScolariteBundle\Entity\Personne
     */
    public function getTuteur()
    {
        return $this->tuteur;
    }

    /**
     * Set personneAcontacter
     *
     * @param \UAHB\ScolariteBundle\Entity\Personne $personneAcontacter
     *
     * @return Etudiant
     */
    public function setPersonneAcontacter(\UAHB\ScolariteBundle\Entity\Personne $personneAcontacter = null)
    {
        $this->personneAcontacter = $personneAcontacter;

        return $this;
    }

    /**
     * Get personneAcontacter
     *
     * @return \UAHB\ScolariteBundle\Entity\Personne
     */
    public function getPersonneAcontacter()
    {
        return $this->personneAcontacter;
    }

    
    /**
     * Set paysOrigine
     *
     * @param \UAHB\ScolariteBundle\Entity\Pays $paysOrigine
     *
     * @return Etudiant
     */
    public function setPaysOrigine(\UAHB\ScolariteBundle\Entity\Pays $paysOrigine)
    {
        $this->paysOrigine = $paysOrigine;

        return $this;
    }

    /**
     * Get paysOrigine
     *
     * @return \UAHB\ScolariteBundle\Entity\Pays
     */
    public function getPaysOrigine()
    {
        return $this->paysOrigine;
    }

    
    /**
     * Set diplome
     *
     * @param \UAHB\ScolariteBundle\Entity\Diplome $diplome
     *
     * @return Etudiant
     */
    public function setDiplome(\UAHB\ScolariteBundle\Entity\Diplome $diplome = null)
    {
        $this->diplome = $diplome;

        return $this;
    }

    /**
     * Get diplome
     *
     * @return \UAHB\ScolariteBundle\Entity\Diplome
     */
    public function getDiplome()
    {
        return $this->diplome;
    }

    /**
     * Set religion
     *
     * @param string $religion
     *
     * @return Etudiant
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * Get religion
     *
     * @return string
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * Set civilite.
     *
     * @param string $civilite
     *
     * @return Etudiant
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite.
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set posteOccupe.
     *
     * @param string|null $posteOccupe
     *
     * @return Etudiant
     */
    public function setPosteOccupe($posteOccupe = null)
    {
        $this->posteOccupe = $posteOccupe;

        return $this;
    }

    /**
     * Get posteOccupe.
     *
     * @return string|null
     */
    public function getPosteOccupe()
    {
        return $this->posteOccupe;
    }

    /**
     * Set employeur.
     *
     * @param string|null $employeur
     *
     * @return Etudiant
     */
    public function setEmployeur($employeur = null)
    {
        $this->employeur = $employeur;

        return $this;
    }

    /**
     * Get employeur.
     *
     * @return string|null
     */
    public function getEmployeur()
    {
        return $this->employeur;
    }

    /**
     * Set timing.
     *
     * @param string|null $timing
     *
     * @return Etudiant
     */
    public function setTiming($timing = null)
    {
        $this->timing = $timing;

        return $this;
    }

    /**
     * Get timing.
     *
     * @return string|null
     */
    public function getTiming()
    {
        return $this->timing;
    }

    /**
     * Set lieuDeTravail.
     *
     * @param string|null $lieuDeTravail
     *
     * @return Etudiant
     */
    public function setLieuDeTravail($lieuDeTravail = null)
    {
        $this->lieuDeTravail = $lieuDeTravail;

        return $this;
    }

    /**
     * Get lieuDeTravail.
     *
     * @return string|null
     */
    public function getLieuDeTravail()
    {
        return $this->lieuDeTravail;
    }

    /**
     * Set adresseProfessionnelle.
     *
     * @param string|null $adresseProfessionnelle
     *
     * @return Etudiant
     */
    public function setAdresseProfessionnelle($adresseProfessionnelle = null)
    {
        $this->adresseProfessionnelle = $adresseProfessionnelle;

        return $this;
    }

    /**
     * Get adresseProfessionnelle.
     *
     * @return string|null
     */
    public function getAdresseProfessionnelle()
    {
        return $this->adresseProfessionnelle;
    }

    /**
     * Set nationalite.
     *
     * @param string $nationalite
     *
     * @return Etudiant
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite.
     *
     * @return string
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set lieuNaissance.
     *
     * @param string $lieuNaissance
     *
     * @return Etudiant
     */
    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * Get lieuNaissance.
     *
     * @return string
     */
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    /**
     * Set telephoneFixe.
     *
     * @param string $telephoneFixe
     *
     * @return Etudiant
     */
    public function setTelephoneFixe($telephoneFixe)
    {
        $this->telephoneFixe = $telephoneFixe;

        return $this;
    }

    /**
     * Get telephoneFixe.
     *
     * @return string
     */
    public function getTelephoneFixe()
    {
        return $this->telephoneFixe;
    }

    

    /**
     * Set telephonePortable1.
     *
     * @param string $telephonePortable1
     *
     * @return Etudiant
     */
    public function setTelephonePortable1($telephonePortable1)
    {
        $this->telephonePortable1 = $telephonePortable1;

        return $this;
    }

    /**
     * Get telephonePortable1.
     *
     * @return string
     */
    public function getTelephonePortable1()
    {
        return $this->telephonePortable1;
    }

    /**
     * Set telephonePortable2.
     *
     * @param string $telephonePortable2
     *
     * @return Etudiant
     */
    public function setTelephonePortable2($telephonePortable2)
    {
        $this->telephonePortable2 = $telephonePortable2;

        return $this;
    }

    /**
     * Get telephonePortable2.
     *
     * @return string
     */
    public function getTelephonePortable2()
    {
        return $this->telephonePortable2;
    }

    /**
     * Set photo.
     *
     * @param string|null $photo
     *
     * @return Etudiant
     */
    public function setPhoto($photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo.
     *
     * @return string|null
     */
    public function getPhoto()
    {
        return $this->photo;
    }
}
