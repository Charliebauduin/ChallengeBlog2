<?php

namespace App\Controller;

use DateTime;
use App\Entity\Post;
use App\Entity\Author;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AuthorController extends AbstractController
{
    /**
     * @Route("/author/create/{id}", name="authorCreate")
     *
     */
    public function createAuthor(Post $post, EntityManagerInterface $manager)
    {

        $author = new Author;

        $author->setFirstname('Lea');
        $author->setLastname('Petite Patate');
        $author->setCreatedAt(new DateTime('now'));
        
        $author->setPost($post);
        
        $manager->persist($author);
        $manager->flush();

        dd($author);
    }
}
