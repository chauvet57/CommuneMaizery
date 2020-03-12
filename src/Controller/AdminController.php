<?php

namespace App\Controller;

use App\Entity\Activite;
use App\Repository\ActiviteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
  /**
   * @var $repository
   */
    private $repository;

    public function __construct(ActiviteRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="index")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $activites = $this->repository->findAll();
        return $this->render( 'admin/index.html.twig', compact('activites'));
    }








    /**
     * @Route("/admin/edit{id}", name="admin.edit", methods="GET|POST")
     * @param Activite $activite
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Activite $activite, Request $request)
    {
       //$form =  $this->createForm(activiteType::class, $activite);
       //$form-> handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
        //    $this->em->flush();
        //    $this->addFlash('success','Bien modifié avec succès');
         //   return $this->redirectToRoute('admin.index');
        //}

        return $this->render( 'admin/edit.html.twig');
    }




    
    

}
