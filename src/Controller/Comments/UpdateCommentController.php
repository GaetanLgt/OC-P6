<?php

namespace App\Controller\Comments;

use App\Entity\Comment;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UpdateCommentController extends AbstractController
{
    #[Route('/tricks/{slug}/comments/{id}/update', name: 'comment_update')]
    public function update($slug, $id, Request $request, EntityManagerInterface $entityManager): Response
    {
        $comment = $entityManager->getRepository(Comment::class)->findOneBy(['id' => $id]);

        if (!$comment) {
            throw $this->createNotFoundException(
                'No comment found for id ' . $id
            );
        }

        $form = $this->createForm(CommentType::class, $comment);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $comment = $form->getData();
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('trick_show', ['slug' => $slug]);
        }

        return $this->render('comments/update.html.twig', [
            'form' => $form->createView(),
            'comment' => $comment
        ]);
    }
}