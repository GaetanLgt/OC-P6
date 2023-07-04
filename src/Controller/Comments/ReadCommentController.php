<?php

namespace App\Controller\Comments;

use App\Entity\Comment;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReadCommentController extends AbstractController
{
    #[Route('/tricks/{slug}/comments/{id}', name: 'comment_show')]
    public function show($slug, $id, EntityManagerInterface $entityManager): Response
    {
        $comment = $entityManager->getRepository(Comment::class)->findOneBy(['id' => $id]);

        return $this->render('comments/show.html.twig', [
            'controller_name' => 'CommentsController',
            'comment' => $comment
        ]);
    }
}