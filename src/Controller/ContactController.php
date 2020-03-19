<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Contact;
use App\Entity\NewLetter;
use App\Form\ContactType;
use App\Form\NewLetterType;
use Symfony\Component\Mime\Email;
use App\Repository\HoraireRepository;
use App\Repository\TelephoneRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{ 

public function __construct(Environment $renderer,EntityManagerInterface $em){

    $this->em = $em;
    $this->renderer = $renderer;
}

    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function index(Request $request,MailerInterface $mailer,HoraireRepository $horaire,TelephoneRepository $telephone): Response
    {
        $telephones = $telephone->findAll();
        $horaires = $horaire->findAll();

        $newLetter = new NewLetter();
        $contact = new Contact();

        $form = $this->createForm(ContactType::class,$contact);
        $formLetter = $this->createForm(NewLetterType::class,$newLetter);
        
        $formLetter-> handleRequest($request);
        $form-> handleRequest($request);
        
        if($formLetter->isSubmitted() && $formLetter ->isValid() ){
            $this->em->persist($newLetter);
            $this->em->flush();
            $this->addFlash('success','Vous etes inscrit a la newletter');
            return $this->redirectToRoute('contact');
        }
            if ($form->isSubmitted() && $form->isValid()) {
                
            $contact = $form->getData();

            $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('colligny.maizery@gmail.com')
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
            'telephones' => $telephones,
            'horaires' => $horaires,
            'form' => $form->createView(),
            'formLetter' => $formLetter->createView()
        ]);
    }



  

}