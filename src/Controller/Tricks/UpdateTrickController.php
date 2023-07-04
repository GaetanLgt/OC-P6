<?php

namespace App\Controller\Tricks;

use App\Entity\Figure;
use App\Form\FigureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UpdateTrickController extends AbstractController
{
    #[Route('/tricks/{slug}/edit', name: 'trick_edit')]
    public function edit($slug, EntityManagerInterface $entityManager, Request $request): Response
    {
        $trick = $entityManager->getRepository(Figure::class)->findOneBy(['slug' => $slug]);

        if (!$trick) {
            throw $this->createNotFoundException(
                'No trick found for slug ' . $slug
            );
        }

        $form = $this->createForm(FigureType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick = $form->getData();
            $entityManager->persist($trick);
            $entityManager->flush();

            return $this->redirectToRoute('trick_show', ['slug' => $trick->getSlug()]);
        }


        return $this->render('tricks/edit.html.twig', [
            'controller_name' => 'TricksController',
            'trick' => $trick,
            'form' => $form->createView()
        ]);
    }
}