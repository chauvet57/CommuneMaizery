<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Contact;
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

public function __construct(Environment $renderer){

    $this->renderer = $renderer;
}

    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function index(Request $request,MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class,$contact);
        $form-> handleRequest($request);

        $formLetter = $this->createForm(NewLetterType::class);
        $formLetter-> handleRequest($request);

        

            if ($form->isSubmitted() && $form->isValid()) {

                
            $contact = $form->getData();

            $email = (new TemplatedEmail())
                ->from('hello@example.com')
                ->to('hello@example.com')
                ->subject('')
                ->htmlTemplate('modele/mail.html.twig')
                ->context([
                    'contact' => $contact
                ]);

                $mailer->send($email);

                $this->addFlash('success', 'Votre mail a bien été envoyé');
                return $this->redirect('/contact');
        
        }

        return $this->render('pages/contact.html.twig',[
            'current_menu' => 'contact',
            'form' => $form->createView(),
            'formLetter' => $formLetter->createView()
        ]);
    }

}