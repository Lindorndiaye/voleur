<?php

namespace UAHB\ScolariteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EtudiantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('prenom')->add('nom')
        ->add('civilite')->add('sexe')
        ->add('situationMaritale')->add('region')
        ->add('religion')
        ->add('dateNaissance', 
            DateTimeType::class,array('widget' => 'single_text',
            'date_format' => 'yyyy-MM-dd  HH:i'))
        ->add('lieuNaissance')->add('adresse')
        ->add('email')->add('nbenfant')->add('etablissementDorigine')
        ->add('adresseEtablissementDorigine')->add('filiereAnterieur')
        ->add('classeAnterieur')->add('niveauDentreeUahb')->add('commentConnaisTuUahb')
        ->add('posteOccupe')->add('employeur')->add('lieuDeTravail')
        ->add('adresseProfessionnelle')
        ->add('pere', PersonneType::class)
        ->add('mere', PersonneType::class)
        ->add('tuteur', PersonneType::class)
        ->add('personneAcontacter', PersonneType::class)
        ->add('paysOrigine')
        ->add('nationalite')
        ->add('diplome', DiplomeType::class)
        ->add('telephoneFixe')->add('telephonePortable1')->add('telephonePortable2');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UAHB\ScolariteBundle\Entity\Etudiant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'uahb_scolaritebundle_etudiant';
    }


}
