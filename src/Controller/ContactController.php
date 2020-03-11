<?php

namespace App\Controller;

use Twig\Environment;
use App\Form\ContactType;
use App\Form\NewLetterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{ 
    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactType::class);
        $form-> handleRequest($request);

        $formLetter = $this->createForm(NewLetterType::class);
        $formLetter-> handleRequest($request);


        return $this->render('pages/contact.html.twig',[
            'current_menu' => 'contact',
            'form' => $form->createView(),
            'formLetter' => $formLetter->createView()
        ]);
    }

}