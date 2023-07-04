<?php

namespace App\Controller\Tricks;

use App\Entity\Figure;
use App\Form\FigureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateTrickController extends AbstractController
{
    #[Route('/tricks/new', name: 'trick_new')]
    public function new(EntityManagerInterface $entityManager, Request $request): Response
    {
        /* TODO: Create a new trick */
        $trick = new Figure();
        $form = $this->createForm(FigureType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trick = $form->getData();
            $entityManager->persist($trick);
            $entityManager->flush();

            return $this->redirectToRoute('trick_show', ['slug' => $trick->getSlug()]);
        }

        return $this->render('tricks/new.html.twig', [
            'controller_name' => 'TricksController',
            'form' => $form->createView()
        ]);
    }
}
