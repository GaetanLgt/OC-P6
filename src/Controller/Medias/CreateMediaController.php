<?php

namespace App\Controller\Medias;

use App\Entity\Media;
use App\Form\MediaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateMediaController extends AbstractController
{
    #[Route('/tricks/{slug}/medias/create', name: 'media_create')]
    public function create($slug, Request $request, EntityManagerInterface $entityManager): Response
    {
        $media = new Media();
        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $media->setFigure($slug);
            $entityManager->persist($media);
            $entityManager->flush();

            return $this->redirectToRoute('trick_show', ['slug' => $slug]);
        }

        return $this->render('medias/create.html.twig', [
            'controller_name' => 'MediasController',
            'form' => $form->createView()
        ]);
    }
}