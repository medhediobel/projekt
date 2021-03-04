<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController 
{
    /**
     * @var UserRepository
     */
    private $repository;
    protected $em;

    public function __construct(UserRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->em = $entityManager;
        
    }

    /**
     * @Route("/user", name="user")
     * @return Response
     */

    public function index()
    {
        $users = $this->repository->findAll();
        return $this->render('user/index.html.twig', ['users' => $users ]);
    }

    /**
     * @Route("/user/create", name="user.new")
     */

    public function new (Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($user);
              $entityManager->flush();
              $this->addFlash('success', 'Erfolgreich erstellt');
            return $this->redirectToRoute('admin.user.index');
        }
        return $this->render('user/new.html.twig', [
            'user' =>$user,
            'form' => $form->createView()
        ]);

    }


    /**
     * @Route("/user/{id}", name="user.edit", methods="GET|POST")
     * @param User $user
     * @param Request $request
     * @return Response
     */
    public function edit(User $user, Request $request)
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success', 'Erfolgreich modifiziert');
            return $this->redirectToRoute('admin.user.index');
        }

        return $this->render('admin/user/edit.html.twig', [
            'user' =>$user,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/admin/user/{id}", name="user.delete", methods="DELETE")
     * @param User $user
     * @return RedirectResponse
     */
    public function delete(User $user, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->get('_token')))
        {
            $this->em->remove($user);
            $this->em->flush();
            $this->addFlash('success', 'Erfolgreich entfernen');
        }
      
        return $this->redirectToRoute('admin.user.index');
    }

}