<?php

namespace App\Controller;

use App\Entity\Figure;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TricksController extends AbstractController
{
    #[Route('/tricks', name: 'app_tricks')]
    public function index(): Response
    {
        return $this->render('tricks/index.html.twig', [
            'controller_name' => 'TricksController',
        ]);
    }

    #[Route('/tricks/{slug}', name: 'trick_show')]
    public function show($slug, EntityManagerInterface $entityManager): Response
    {
        $trick = $entityManager->getRepository(Figure::class)->findOneBy(['slug' => $slug]);

        return $this->render('tricks/show.html.twig', [
            'controller_name' => 'TricksController',
            'trick' => $trick
        ]);
    }
}
