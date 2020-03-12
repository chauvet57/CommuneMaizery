<?php

namespace App\Controller;


use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\ActiviteRepository;

use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
  /**
   * @var ActiviteRepository
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
        $properties = $this->repository->findAll();
        return $this->render( 'admin/index.html.twig', compact('activites'));
    }



    
    

}
