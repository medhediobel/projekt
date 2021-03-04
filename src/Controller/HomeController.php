<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Form\ContactemailType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, MailerInterface $mailer)
    {
        $form = $this->createForm(ContactemailType::class);

        $contact = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {

            $email = (new TemplatedEmail())
             ->from($contact->get('email')->getData())
             ->to('mh.belkhiria@gmail.com')
             ->subject('Email von DLR Portal')
             ->htmlTemplate('emails/contact_user.html.twig')
             ->context([
                 'mail' => $contact->get('email')->getData(),
                 'sujet' => $contact->get('sujet')->getData(),
                 'message' => $contact->get('message')->getData()
             ]);
             $mailer->send($email);
             $this->addFlash('message', 'Email gesendet');
             return $this->redirectToRoute('contact');

        }

        return $this->render('home/contact.html.twig', [
            'form' => $form->createView()
        ]);
    
    }




}
