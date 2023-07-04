<?php

namespace App\Controller\Medias;

use App\Entity\Media;
use App\Form\MediaType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteMediaController extends AbstractController
{
    #[Route('/tricks/{slug}/medias/{id}/delete', name: 'media_delete')]
    public function delete($slug, $id, EntityManagerInterface $entityManager): Response
    {
        $media = $entityManager->getRepository(Media::class)->findOneBy(['id' => $id]);

        if (!$media) {
            throw $this->createNotFoundException(
                'No media found for id ' . $id
            );
        }
        $entityManager->remove($media);
        $entityManager->flush();

        return $this->redirectToRoute('trick_show', ['slug' => $slug]);
    }
}