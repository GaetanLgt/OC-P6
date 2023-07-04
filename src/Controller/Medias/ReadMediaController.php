<?php

namespace App\Controller\Medias;

use App\Entity\Media;
use App\Form\MediaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReadMediaController extends AbstractController
{
    #[Route('/tricks/{slug}/medias/{id}', name: 'media_show')]
    public function show($slug, $id, EntityManagerInterface $entityManager): Response
    {
        $media = $entityManager->getRepository(Media::class)->findOneBy(['id' => $id]);

        return $this->render('medias/show.html.twig', [
            'controller_name' => 'MediasController',
            'media' => $media
        ]);
    }
}