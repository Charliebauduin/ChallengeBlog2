<?php

namespace App\Controller;

use DateTime;
use App\Entity\Post;
use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentController extends AbstractController
{

    /**
     * @Route("/comment/create/{id}", name="commentCreate")
     *
     */
    public function createComment(Post $post, EntityManagerInterface $manager)
    {

        $comment = new Comment;

        $comment->setUsername('Lea');
        $comment->setBody('Petite Patate');
        $comment->setPublishedAt(new DateTime('now'));
        $comment->setCreatedAt(new DateTime('now'));

        $comment->setPost($post);

        $manager->persist($comment);
        $manager->flush();

        dd($comment);
    }

}
