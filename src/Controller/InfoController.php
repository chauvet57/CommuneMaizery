<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Horaire;
use App\Entity\Telephone;
use App\Form\HoraireType;
use App\Form\TelephoneType;
use App\Repository\HoraireRepository;
use App\Repository\TelephoneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InfoController extends AbstractController
{ 

    public function __construct(TelephoneRepository $repositoryTel,HoraireRepository $repositoryHor,EntityManagerInterface $em){

        $this->repositoryHor = $repositoryHor;
        $this->repositoryTel = $repositoryTel;
        $this->em = $em;
    }


 /**
 * @Route("/info", name="info/index")
 */
public function info(Request $request){

        
    $telephones = $this->repositoryTel->findAll();
    $horaires = $this->repositoryHor->findAll();

    return $this->render('info/index.html.twig',[
        'telephones' => $telephones,
        'horaires' => $horaires
    ]);
    
}

/**
     * @Route("/info/telephone-{id}", name="info.telephone", methods="GET|POST")
     * @param Telephone $telephone
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editTel(Telephone $telephone, Request $request)
    {
       $form =  $this->createForm(TelephoneType::class, $telephone);
       $form-> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success','Bien modifié avec succès');
            return $this->redirectToRoute('info/index');
        }

        return $this->render( 'info/telephone.html.twig',[
            'telephone' =>$telephone,
            'form' =>$form->createView()
        ]);
    }

    /**
     * @Route("/info/horaire-{id}", name="info.horaire", methods="GET|POST")
     * @param Horaire $horaire
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editHor(Horaire $horaire, Request $request)
    {
       $form =  $this->createForm(HoraireType::class, $horaire);
       $form-> handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success','Bien modifié avec succès');
            return $this->redirectToRoute('info/index');
        }

        return $this->render( 'info/horaire.html.twig',[
            'horaire' =>$horaire,
            'form' =>$form->createView()
        ]);
    }

}