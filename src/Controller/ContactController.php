<?php

namespace App\Controller;

use Twig\Environment;
use App\Form\ContactType;
use App\Form\NewLetterType;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{ 
    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function index(Request $request,MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form-> handleRequest($request);

        $formLetter = $this->createForm(NewLetterType::class);
        $formLetter-> handleRequest($request);

        

            if ($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();

            $email = (new TemplatedEmail())
                ->from('hello@example.com')
                ->to($contactFormData->getEmail())
                ->subject('')
                ->text($contactFormData->getNom())
                ->text($contactFormData->getMessage())
                ->html('');

                $mailer->send($email);

                return $this->render('pages/contact.html.twig',[
                    'current_menu' => 'contact',
                    'form' => $form->createView(),
                    'formLetter' => $formLetter->createView()
                ]);
        
        }

        return $this->render('pages/contact.html.twig',[
            'current_menu' => 'contact',
            'form' => $form->createView(),
            'formLetter' => $formLetter->createView()
        ]);
    }

}