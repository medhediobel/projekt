<?php

namespace App\Controller;


use App\Entity\Beteiligte;
use App\Form\BeteiligteType;
use App\Repository\BeteiligteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BeteiligteController extends AbstractController 
{
    /**
     * @var BeteiligteRepository
     */
    private $repository;
    protected $em;

    public function __construct(BeteiligteRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->em = $entityManager;
        
    }

    /**
     * @Route("/beteiligte", name="beteiligte")
     * @return Response
     */

    public function index()
    {
        $beteiligtes = $this->repository->findAll();
        return $this->render('beteiligte/index.html.twig', ['beteiligtes' => $beteiligtes ]);
    }

    /**
     * @Route("beteiligte/create", name="beteiligte.new")
     */

    public function new (Request $request)
    {
        $beteiligte = new Beteiligte();
        $form = $this->createForm(BeteiligteType::class, $beteiligte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            
              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->persist($beteiligte);
              $entityManager->flush();
              $this->addFlash('success', 'Erfolgreich erstellt');
            return $this->redirectToRoute('beteiligte.index');
        }
        return $this->render('beteiligte/new.html.twig', [
            'beteiligte' =>$beteiligte,
            'form' => $form->createView()
        ]);

    }


    /**
     * @Route("beteiligte/{id}", name="beteiligte.edit", methods="GET|POST")
     * @param Beteiligte $beteiligte
     * @param Request $request
     * @return Response
     */
    public function edit(Beteiligte $beteiligte, Request $request)
    {
        $form = $this->createForm(BeteiligteType::class, $beteiligte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
           
            $this->addFlash('success', 'Erfolgreich modifiziert');
            return $this->redirectToRoute('beteiligte.index');
        }

        return $this->render('beteiligte/edit.html.twig', [
            'beteiligte' =>$beteiligte,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/admin/beteiligte/{id}", name="beteiligte.delete", methods="DELETE")
     * @param Beteiligte $beteiligte
     * @return RedirectResponse
     */
    public function delete(Beteiligte $beteiligte, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $beteiligte->getId(), $request->get('_token')))
        {
            $this->em->remove($beteiligte);
            $this->em->flush();
            $this->addFlash('success', 'Erfolgreich entfernen');
        }
      
        return $this->redirectToRoute('beteiligte.index');
    }

}