<?php

namespace App\Controller;

use DateTime;
use App\Entity\Planes;
use App\Form\PlanType;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Form\ContactType;
use App\Repository\PlanesRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PlanesController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
    
     /** 
      * @Route("/planes", name="planes") 
      * @return Response
     */
     
    public function index(PlanesRepository $planesRepository,  PaginatorInterface $paginator, Request $request): Response
    {
            $planes = $paginator->paginate( $planesRepository->findAll(), 
                                            $request->query->getInt('page', 1), 5  );
            /** $planes = $planesRepository->findAll();
            *dump($planes);
            * die();  oder dd($planes); */
            return $this->render('planes/index.html.twig', ['planes' => $planes ]);
    }
     
     /**  @Route("article/new", name="article_new") */
     
    public function new(Request $request)
    {
        $plane =new Planes();
        $form = $this->createForm(PlanType::class, $plane);
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid() ) 
            {
                $plane->setCreatedAt(new DateTime());
                $plane->setPlan("https://picsum.photos/id/237/200/300");
                $plane->setUser($this->security->getUser());
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($plane);
                $entityManager->flush();

                return $this->redirectToRoute("article_show", ['id'=>$plane->getId() ]);
            }
        return $this->render( 'planes/new.html.twig', [ 'form' =>$form->createView() ] );
    }

     /** 
     * @Route("article/{id}/edit", name="article_edit")
     */

    public function edit(Request $request, Planes $plane): Response
    {
        $form = $this->createForm(PlanType::class, $plane);
        $form->handleRequest($request);
        if( $form->isSubmitted() && $form->isValid() ) 
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($plane);
            $entityManager->flush();
            return $this->redirectToRoute("article_show", ['id'=>$plane->getId() ]);
        }
        return $this->render('planes/edit.html.twig', ['editForm' =>$form->createView() ] );
    }

    /** 
     * @Route("article/{id}", name="article_show", methods={"GET","POST"})
     */
    public function show(Planes $plane, Request $request, MailerInterface $mailer)
    {
        $comment =new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        $contact = $this->createForm(ContactType::class);
        $contact->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $comment->setCreatedAt(new DateTime());
            $comment->setArticle($plane);
            $entityManager = $this->getDoctrine()->getmanager();
            $entityManager->persist($comment);
            $entityManager->flush();

             //on cree le mail
             $email = (new TemplatedEmail())
             ->from($contact->get('email')->getData())
             ->to($plane->getUser()->getEmail())
             ->subject('Objekt Email'. $plane->getTitle(). '"')
             ->htmlTemplate('emails/contact_user.html.twig')
             ->context([
                 'planes' =>$plane,
                 'mail' => $contact->get('email')->getData(),
                 'message' => $contact->get('message')->getData()
             ]);
             //on envoie le mail
             $mailer->send($email);
                 //on confirme et on redirige
             $this->addFlash('message', 'Email ist gesendet');

            return $this->redirectToRoute("article_show", ['id'=>$plane->getId() ]);
        }

        return $this->render( 'planes/show.html.twig', [
             'plane' => $plane, 'commentForm' => $form->createView(),
             'contact' => $contact->createView(), ]);
    }
}
