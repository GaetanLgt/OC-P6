<?php

namespace App\Controller\Comments;

use App\Entity\Comment;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DeleteCommentController extends AbstractController
{
    #[Route('/tricks/{slug}/comments/{id}/delete', name: 'comment_delete')]
    public function delete($slug, $id, EntityManagerInterface $entityManager): Response
    {
        $comment = $entityManager->getRepository(Comment::class)->findOneBy(['id' => $id]);

        if (!$comment) {
            throw $this->createNotFoundException(
                'No comment found for id ' . $id
            );
        }
        $entityManager->remove($comment);
        $entityManager->flush();

        return $this->redirectToRoute('trick_show', ['slug' => $slug]);
    }
}