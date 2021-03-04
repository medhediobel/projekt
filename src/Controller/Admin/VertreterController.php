<?php

namespace App\Controller\Admin;



use App\Entity\Vertreta;
use App\Form\VertretaType;
use App\Repository\VertretaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VertreterController extends AbstractController
{
    /**
     * @var VertreterRepository
     */
    private $repository;
    protected $em;

    public function __construct(VertretaRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->em = $entityManager;
    }

    /**
     * @Route("/admin", name="admin.vertreter.index")
     * @return Response
     */

    public function index()
    {
        $vertreters = $this->repository->findAll();
        return $this->render('admin/vertreter/index.html.twig', compact('vertreters'));
    }

    /**
     * @Route("/admin/vertreter/create", name="admin.vertreter.new")
     */

    public function new(Request $request)
    {
        $vertreter = new Vertreta();
        $form = $this->createForm(VertretaType::class, $vertreter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vertreter);
            $entityManager->flush();
            $this->addFlash('success', 'Erfolgreich erstellt');
            return $this->redirectToRoute('admin.vertreter.index');
        }
        return $this->render('admin/vertreter/new.html.twig', [
            'vertreter' => $vertreter,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/admin/vertreter/{id}", name="admin.vertreter.edit", methods="GET|POST")
     * @param Vertreter $vertreter
     * @param Request $request
     * @return Response
     */
    public function edit(Vertreta $vertreter, Request $request)
    {
        $form = $this->createForm(VertreterType::class, $vertreter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success', 'Erfolgreich modifiziert');
            return $this->redirectToRoute('admin.vertreter.index');
        }

        return $this->render('admin/vertreter/edit.html.twig', [
            'vertreter' => $vertreter,
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/admin/vertreter/{id}", name="admin.vertreter.delete", methods="DELETE")
     * @param Vertreter $vertreter
     * @return RedirectResponse
     */
    public function delete(Vertreta $vertreter, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $vertreter->getId(), $request->get('_token'))) {
            $this->em->remove($vertreter);
            $this->em->flush();
            $this->addFlash('success', 'Erfolgreich entfernen');
        }

        return $this->redirectToRoute('admin.vertreter.index');
    }
}
