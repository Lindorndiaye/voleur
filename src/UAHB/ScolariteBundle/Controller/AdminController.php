<?php

namespace UAHB\ScolariteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use UAHB\ScolariteBundle\Entity\Inscription;
use UAHB\ScolariteBundle\Entity\Personne;
use UAHB\ScolariteBundle\Entity\Pays;
use UAHB\ScolariteBundle\Entity\Filiere;
use UAHB\ScolariteBundle\Entity\Faculte;
use UAHB\ScolariteBundle\Entity\Departement;
use UAHB\ScolariteBundle\Entity\Classe;
use UAHB\ScolariteBundle\Entity\ClasseOption;
use UAHB\ScolariteBundle\Entity\UniteEnseignement;


use UAHB\ScolariteBundle\Form\EtudiantType;
use UAHB\ScolariteBundle\Form\InscriptionType;
use UAHB\ScolariteBundle\Form\FiliereType;
use UAHB\ScolariteBundle\Form\ClasseType;
use UAHB\ScolariteBundle\Form\ClasseOptionType;
use UAHB\ScolariteBundle\Form\UniteEnseignementType;

use UAHB\ScolariteBundle\Form\FaculteType;
use UAHB\ScolariteBundle\Form\DepartementType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;


class AdminController extends Controller
{
    /**
     * @Route("/inscription")
     */
    public function incsriptionAction()
    {
        $inscription = new Inscription();
        
        $form = $this->createForm(InscriptionType::class, $inscription);
        
        return $this->render('UAHBScolariteBundle:Admin:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/facultes", name="uahb_scolarite_admin_loadfaculte")
     * @Route("/edit/{action}/{id}", name="uahb_scolarite_admin_editfaculte")
     */
    public function faculteAction(Request $request, $action = "", $id=0)
    {
        $em = $this->getDoctrine()->getManager();
        
        $message = "";
        $faculte = null;
        $dept = null;
        $paginator  = $this->get('knp_paginator');
        if($action != "")
        {
            if(!is_Numeric($id)){
                return $this->redirectToRoute('uahb_scolarite_admin_loadfaculte');
            }
            if($action == "editfaculte"){
                
                $faculte = $em->getRepository(Faculte::class)->find($id);
            }
            else if($action == "editdept"){
                $dept = $em->getRepository(Departement::class)->find($id);
            }
            else if($action == "removefaculte"){
                $faculte = $em->getRepository(Faculte::class)->find($id);
                if($faculte != null  && count($faculte->getDepartements())  > 0) {
                    $message = "Impossible de supprimer cette faculté car elle contient des départements";
                }else{
                    $em->remove($faculte);
                    $em->flush();
                    return $this->redirectToRoute('uahb_scolarite_admin_loadfaculte');
                }
            }
            else if($action == "removedept"){
                $dept = $em->getRepository(Departement::class)->find($id);
                if($dept != null  && count($dept-vgetFilieres())  > 0) {
                    $message = "Impossible de supprimer ce département car elle contient des filières";
                }else{
                    $em->remove($dept);
                    $em->flush();
                    return $this->redirectToRoute('uahb_scolarite_admin_loadfaculte');
                }
            }
            else{
                return $this->redirectToRoute('uahb_scolarite_admin_loadfaculte');
            }
        }else{
            $faculte = new Faculte();
            $dept = new Departement();
            
            
        }
        
        $formFaculte = $this->createForm(FaculteType::class, $faculte);
        $formDept = $this->createForm(DepartementType::class, $dept);

            
            
        //var_dump($request->request->all());
        $formFaculte->handleRequest($request);
        $formDept->handleRequest($request);
        
        if ($request->isMethod('POST')) {
            
            
            if($formFaculte->isSubmitted()){
                //var_dump($request->request->all());
                if($faculte == null){
                    return $this->redirectToRoute('uahb_scolarite_admin_loadfaculte');
                }
                $fac = $em->getRepository(Faculte::class)->findBy(array('libelle'=>trim($faculte->getLibelle())));
                if($fac == null){
                    $em->persist($faculte);
                    $em->flush();
                }
                else{
                    $message =  'cette faculté existe déjà ';
                }
            }
            else if($formDept->isSubmitted()){
                if($dept == null){
                    return $this->redirectToRoute('uahb_scolarite_admin_loadfaculte');
                }
                $dp = $em->getRepository('UAHBScolariteBundle:Departement')->findBy(array('libelle'=>trim($dept->getLibelle())));
                if($dp == null){
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($dept);
                    $em->flush();
                }
                else{
                    $message =  'ce département existe déjà ';
                }               
            }
        }
        
        $facultes = $em->getRepository('UAHBScolariteBundle:Faculte')->findAll();
        $depts = $em->getRepository('UAHBScolariteBundle:Departement')->findAll();
        

        $deptpagination = $paginator->paginate(
            $depts, 
            $request->query->getInt('page', 1)/*page number*/,
            2/*limit per page*/
        );
        
        return $this->render('UAHBScolariteBundle:Admin:faculte.html.twig', array(
            'formFaculte' => $formFaculte->createView(),
            'formDept' => $formDept->createView(),
            'facultes' => $facultes,
            'depts' => $deptpagination,
            'message' => $message
        ));
    }
    
    public function editAction()
    {
        $inscription = new Inscription();
        
        $form = $this->createForm(InscriptionType::class, $inscription);
        $message = "";
        return $this->render('UAHBScolariteBundle:Admin:faculte.html.twig', array(
            'form' => $form->createView(),
            'message' => $message
        ));
    }

    /**
     * @Route("/filieres", name="uahb_scolarite_admin_loadfiliere")
     * @Route("/editfiliere/{action}/{id}", name="uahb_scolarite_admin_editfiliere")
     */
    public function filiereAction(Request $request, $action="", $id=0)
    { 
        $filiere = new Filiere();
        $message = "";
        $em = $this->getDoctrine()->getManager();
        if($action != "")
        {
            if(!is_Numeric($id)){
                return $this->redirectToRoute('uahb_scolarite_admin_loadfiliere');
            }
            else
            {
                
                
                if($id != 0){
                    if($action == "del"){
                        $filiere = $em->getRepository(Filiere::class)->find($id);
                        if($filiere != null  && count($filiere->getClasses())  > 0) {
                            $message = "Impossible de supprimer cette filière car elle contient des classes";
                        }else if($filiere != null){
                            $em->remove($filiere);
                            $em->flush();
                            return $this->redirectToRoute('uahb_scolarite_admin_loadfiliere');
                        }
                        else{
                            return $this->redirectToRoute('uahb_scolarite_admin_loadfiliere');
                        }
                    }
                    else if($action == "edit"){
                        $filiere = $em->getRepository(Filiere::class)->find($id);
                    }
                    
                }
            }
        }
        $formFiliere = $this->createForm(FiliereType::class, $filiere);
        $formFiliere->handleRequest($request);
        
        if ($request->isMethod('POST')) {
            if($filiere == null){
                return $this->redirectToRoute('uahb_scolarite_admin_loadfiliere');
            }
            $fil = $em->getRepository(Filiere::class)->findBy(array('libelle'=>trim($filiere->getLibelle())));
            if($fil == null){
                $em->persist($filiere);
                $em->flush();
                return $this->redirectToRoute('uahb_scolarite_admin_loadfiliere');
            }
            else{
                $message =  'cette filiere existe déjà ';
            }    
        }

        

        $filieres = $em->getRepository('UAHBScolariteBundle:Filiere')->findAll();
        $paginator  = $this->get('knp_paginator');
        $filierepagination = $paginator->paginate(
            $filieres, 
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );
        return $this->render('UAHBScolariteBundle:Admin:filiere.html.twig', array(
            'formFiliere' => $formFiliere->createView(),
            'filieres' => $filierepagination,
            'message' => $message
        ));
    }

    /**
     * @Route("/classes", name="uahb_scolarite_admin_loadclasse")
     * @Route("/editclasse/{action}/{id}", name="uahb_scolarite_admin_editclasse")
     */
    public function classeAction(Request $request, $action="", $id=0)
    {
        $em = $this->getDoctrine()->getManager();
        $classe = new Classe();
        $message = "";
        if($action != "")
        {
            if(!is_Numeric($id)){
                return $this->redirectToRoute('uahb_scolarite_admin_loadclasse');
            }
            else
            {
                $em = $this->getDoctrine()->getManager();
                
                if($id != 0){
                    if($action == "del"){
                        $classe = $em->getRepository(Classe::class)->find($id);
                        if($classe != null  && count($classe->getClasseOptions())  > 0) {
                            $message = "Impossible de supprimer cette classe car elle contient des options";
                        }else if($classe != null){
                            $em->remove($classe);
                            $em->flush();
                            return $this->redirectToRoute('uahb_scolarite_admin_loadclasse');
                        }
                        else{
                            return $this->redirectToRoute('uahb_scolarite_admin_loadclasse');
                        }
                    }
                    else if($action == "edit"){
                        $classe = $em->getRepository(Classe::class)->find($id);
                    }
                    
                }
            }
        }

        
        $formClasse = $this->createForm(ClasseType::class, $classe);
        $formClasse->handleRequest($request);

        if ($request->isMethod('POST')) {
            if($classe == null){
                return $this->redirectToRoute('uahb_scolarite_admin_loadclasse');
            }
            $cl = $em->getRepository(Classe::class)->findBy(array('libelle'=>trim($classe->getLibelle())));
            if($cl == null){
                $em->persist($classe);
                $em->flush();
                return $this->redirectToRoute('uahb_scolarite_admin_loadclasse');
            }
            else{
                $message =  'cette classe existe déjà ';
            }    
        }
        

        $classes = $em->getRepository('UAHBScolariteBundle:Classe')->findAll();
        $paginator  = $this->get('knp_paginator');
        $classepagination = $paginator->paginate(
            $classes, 
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );


        return $this->render('UAHBScolariteBundle:Admin:classe.html.twig', array(
            'formClasse' => $formClasse->createView(),
            'classes' => $classepagination,
            'message'=> $message
        ));
    }

    /**
     * @Route("/classeoptions", name="uahb_scolarite_admin_loadclasseoption")
     * @Route("/editclasseoption/{action}/{id}", name="uahb_scolarite_admin_editclasseoption")
     */
    public function classeOptionAction(Request $request, $action="", $id=0)
    {
        $em = $this->getDoctrine()->getManager();
        $classeOption = new ClasseOption();
        
        $message = "";
        if($action != ""){
            if(!is_Numeric($id)){
                return $this->redirectToRoute('uahb_scolarite_admin_loadclasseoption');
            }
            else
            {
                $em = $this->getDoctrine()->getManager();
                
                if($id != 0){
                    if($action == "del"){
                        $classeOption = $em->getRepository(ClasseOption::class)->find($id);
                        if($classeOption != null){
                            $em->remove($classeOption);
                            $em->flush();
                            return $this->redirectToRoute('uahb_scolarite_admin_loadclasseoption');
                        }
                        else{
                            return $this->redirectToRoute('uahb_scolarite_admin_loadclasseoption');
                        }
                    }
                    else if($action == "edit"){
                        $classeOption = $em->getRepository(ClasseOption::class)->find($id);
                    }
                    
                }
            }

        }
        $formClasseOption = $this->createForm(ClasseOptionType::class, $classeOption);
        $formClasseOption->handleRequest($request);

        if ($request->isMethod('POST')) {
            
            if($classeOption == null){
                return $this->redirectToRoute('uahb_scolarite_admin_loadclasseoption');
            }
            $cl = $em->getRepository(ClasseOption::class)->findBy(array('libelle'=>trim($classeOption->getLibelle())));
            if($cl == null){
                $em->persist($classeOption);
                $em->flush();
                return $this->redirectToRoute('uahb_scolarite_admin_loadclasseoption');
            }
            else{
                $message =  'cette specialité existe déjà ';
            }    
        }
        

        $classeOptions = $em->getRepository('UAHBScolariteBundle:ClasseOption')->findAll();
        $paginator  = $this->get('knp_paginator');
        $optionspagination = $paginator->paginate(
            $classeOptions, 
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );


        return $this->render('UAHBScolariteBundle:Admin:classeOption.html.twig', array(
            'formClasseOption' => $formClasseOption->createView(),
            'classeOptions' => $optionspagination,
            'message'=> $message
        ));
    }

    /**
     * @Route("/test")
     */
    public function loadAction()
    {
        return $this->render('UAHBScolariteBundle:Admin:test.html.twig', array(
            
        ));
    }

    /**
     * @Route("/uens", name="uahb_scolarite_admin_loaduens")
     * @Route("/edituens/{action}/{id}", name="uahb_scolarite_admin_edituens")
     */
    public function ueParClasseAction(Request $request)
    {
        $ue = new UniteEnseignement();
        $formUe = $this->createForm(UniteEnseignementType::class, $ue);
        $formUe->handleRequest($request);
        
        $em = $this->getDoctrine()->getManager();
        $filieres = $em->getRepository('UAHBScolariteBundle:Filiere')->findAll();
        return $this->render('UAHBScolariteBundle:Admin:uniteEnsClasse.html.twig', array(
            'filieres'=>$filieres,
            'formUe'=>$formUe->createView(),
            'uens' => $ue
        ));
    }

    /**
     * @Route("/classeParFiliere/{idfil}")
     */
    public function classeParFiliereAction($idfil)
    {
        $em = $this->getDoctrine()->getManager();
        $filiere = $em->getRepository('UAHBScolariteBundle:Filiere')->find($idfil);
        $data = array();
        if($filiere != null){
            $classes = $filiere->getClasses();
            
            foreach($classes as $val)
            {
                $data[] = array("id"=>$val->getId(),"libelle"=>$val->getLibelle());
            }
        }
        

        return new JsonResponse($data);
    }
}
