<?php

namespace App\Controller\Comments;

use App\Entity\Comment;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CreateCommentController extends AbstractController
{
    #[Route('/tricks/{slug}/comments/new', name: 'comment_new')]
    public function new($slug, EntityManagerInterface $entityManager, Request $request): Response
    {
        $trick = $entityManager->getRepository(Figure::class)->findOneBy(['slug' => $slug]);

        if (!$trick) {
            throw $this->createNotFoundException(
                'No trick found for slug ' . $slug
            );
        }

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $comment = $form->getData();
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('trick_show', ['slug' => $trick->getSlug()]);
        }

        return $this->render('comments/new.html.twig', [
            'controller_name' => 'CommentsController',
            'form' => $form->createView()
        ]);
    }
}

