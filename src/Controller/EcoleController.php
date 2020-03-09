<?php

namespace App\Controller;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EcoleController extends AbstractController
{ 
    /**
     * @Route("/ecole", name="ecole")
     * @return Response
     */
    public function index(): Response
    {
        
        return $this->render('pages/ecole.html.twig',[
            'current_menu' => 'ecole'
        ]);
    }

}