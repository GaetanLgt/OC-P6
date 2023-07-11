<?php

namespace App\Controller\Tricks;

use App\Entity\Figure;
use App\Form\FigureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteTrickController extends AbstractController
{
    #[Route('/tricks/{slug}/delete', name: 'trick_delete')]
    public function delete($slug, EntityManagerInterface $entityManager): Response
    {
        $trick = $entityManager->getRepository(Figure::class)->findOneBy(['slug' => $slug]);

        if (!$trick) {
            throw $this->createNotFoundException(
                'No trick found for slug ' . $slug
            );
        }
        foreach ($trick->getMedia() as $image) {
            $entityManager->remove($image);
        }
        $entityManager->remove($trick);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }
}