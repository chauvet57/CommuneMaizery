<?php

namespace App\Controller;

use Twig\Environment;
use App\Repository\ActiviteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementController extends AbstractController
{ 
    /**
     * @Route("/evenement", name="evenement")
     * @return Response
     */
    public function index(ActiviteRepository $evenement): Response
    {
        $evenements = $evenement->findAllEvenement();

        return $this->render('pages/evenement.html.twig',[
            'current_menu' => 'evenement',
            'evenements' => $evenements
        ]);
    }

}