<?php

namespace App\Controller\Admin;



use App\Entity\Behoerde;
use App\Form\BehoerdeType;
use App\Repository\BehoerdeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BehoerdeController extends AbstractController 
{
    /**
     * @var BehoerdeRepository
     */
    private $repository;
    protected $em;

    public function __construct(BehoerdeRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->em = $entityManager;
        
    }

    /**
     * @Route("/admin", name="admin.behoerde.index")
     * @return Response
     */

    public function index()
    {
        $behoerdes = $this->repository->findAll();
        return $this->render('behoerde/index.html.twig', compact('behoerdes'));
    }

    /**
     * @Route("/admin/behoerde/create", name="admin.behoerde.new")
     */

    public function new (Request $request)
    {
        $behoerde = new Behoerde();
        $form = $this->createForm(BehoerdeType::class, $behoerde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($behoerde);
              $entityManager->flush();
              $this->addFlash('success', 'Erfolgreich erstellt');
            return $this->redirectToRoute('admin.behoerde.index');
        }
        return $this->render('behoerde/new.html.twig', [
            'user' =>$behoerde,
            'form' => $form->createView()
        ]);

    }


    /**
     * @Route("/admin/behoerde/{id}", name="admin.behoerde.edit", methods="GET|POST")
     * @param Behoerde $behoerde
     * @param Request $request
     * @return Response
     */
    public function edit(Behoerde $behoerde, Request $request)
    {
        $form = $this->createForm(BehoerdeType::class, $behoerde);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            $this->addFlash('success', 'Erfolgreich modifiziert');
            return $this->redirectToRoute('behoerde.index');
        }

        return $this->render('behoerde/edit.html.twig', [
            'behoerde' =>$behoerde,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/admin/behoerde/{id}", name="admin.behoerde.delete", methods="DELETE")
     * @param Behoerde $behoerde
     * @return RedirectResponse
     */
    public function delete(Behoerde $behoerde, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $behoerde->getId(), $request->get('_token')))
        {
            $this->em->remove($behoerde);
            $this->em->flush();
            $this->addFlash('success', 'Erfolgreich entfernen');
        }
      
        return $this->redirectToRoute('behoerde.index');
    }

}