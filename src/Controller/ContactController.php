<?php

namespace App\Controller;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{ 
    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function index(): Response
    {
        
        return $this->render('pages/contact.html.twig',[
            'current_menu' => 'contact'
        ]);
    }

}