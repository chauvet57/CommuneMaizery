<?php

namespace App\Controller;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HistoireController extends AbstractController
{ 
    /**
     * @Route("/histoire", name="histoire")
     * @return Response
     */
    public function index(): Response
    {
        
        return $this->render('pages/histoire.html.twig',[
            'current_menu' => 'histoire'
        ]);
    }

}