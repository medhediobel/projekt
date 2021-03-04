<?php

namespace App\Controller;

use App\Entity\Einwendung;
use App\Form\EinwendungType;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class EinwendungController extends AbstractController
{
    /**
     * @Route("/einwendung", name="einwendung")
     */
    public function index(): Response
    {
        return $this->render('einwendung/index.html.twig', [
            'controller_name' => 'EinwendungController',
        ]);
    }

    /**
     * @Route("/einwendung/new", name="app_einwendung_new")
     */
    public function new(Request $request, SluggerInterface $slugger)
    {
        $product = new Einwendung();
        $form = $this->createForm(EinwendungType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

           
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('brochure')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($brochureFile) {
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $brochureFile->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
                $product->setFile($newFilename);
            }

            // ... persist the $product variable or any other work

            return $this->redirectToRoute('planes');
        }

        return $this->render('einwendung/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }




}
