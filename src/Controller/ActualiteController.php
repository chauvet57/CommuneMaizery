<?php

namespace App\Controller;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActualiteController extends AbstractController
{ 
    /**
     * @Route("/actualite", name="actualite")
     * @return Response
     */
    public function index(): Response
    {
        
        return $this->render('pages/actualite.html.twig',[
            'current_menu' => 'actualite'
        ]);
    }

}