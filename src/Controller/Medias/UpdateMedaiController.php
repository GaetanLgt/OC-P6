<?php

namespace App\Controller\Medias;

use App\Entity\Media;
use App\Form\MediaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UpdateMediaController extends AbstractController
{
    #[Route('/tricks/{slug}/medias/{id}/update', name: 'media_update')]
    public function update($slug, $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $media = $entityManager->getRepository(Media::class)->findOneBy(['id' => $id]);

        if (!$media) {
            throw $this->createNotFoundException(
                'No media found for id ' . $id
            );
        }

        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $media->setFigure($slug);
            $entityManager->flush();

            return $this->redirectToRoute('trick_show', ['slug' => $slug]);
        }

        return $this->render('medias/update.html.twig', [
            'controller_name' => 'MediasController',
            'form' => $form->createView()
        ]);
    }
}
