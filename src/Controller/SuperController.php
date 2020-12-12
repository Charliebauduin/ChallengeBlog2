<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SuperController extends AbstractController
{
    /**
     * @Route("/create", name="create", methods="POST")
    */
    public function create(Request $request): Response
    {
        $post = new Post;

        $titleToAdd = $request->request->get('title');
        $bodyToAdd = $request->request->get('body');
        $nbLikesToAdd = $request->request->get('nbLikes');


        $post->setTitle($titleToAdd);
        $post->setBody($bodyToAdd);
        $post->setNbLikes($nbLikesToAdd);
        $post->setCreatedAt(new \DateTime());
        // $post->setUpdatedAt(new \DateTime());
        $post->setPublishedAt(new \DateTime());

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($post);

        $entityManager->flush();


        return $this->redirectToRoute('showAll');
        
    }
    /**
     * @Route("/showAll", name="showAll")
     */
    public function showAll(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);

        $post = $repository->findAll();

        return $this->render('home/viewDb.html.twig', ['allPost' => $post]);

    }
    /**
     * @Route("/showone/{id}", name="showone")
     */
    public function showOne($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);

        $post = $repository->find($id);

        return $this->render('home/viewOne.html.twig', ['post' => $post]);

    }
    /**
     * @Route("/update/{id}", name="update")
     */
    public function update($id): Response
    {
        $repository = $this->getDoctrine()->getRepository(Post::class);

        $post = $repository->find($id);

        return $this->render('home/update.html.twig', ['post' => $post]);
    }

    /**
     * @Route("/modify/{id}", name="modify", methods="POST")
     */
    public function modify($id, Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()->getRepository(Post::class);

        $postToUpdate = $repository->find($id);

        $titleToUpdate   =   $request->request->get('title');
        $bodyToUpdate    =   $request->request->get('body');
        $nbLikesToUpdate =   $request->request->get('nbLikes');

        dump($titleToUpdate);
        dump($bodyToUpdate);
        dump($nbLikesToUpdate);


        $postToUpdate->setTitle($titleToUpdate);
        $postToUpdate->setBody($bodyToUpdate);
        $postToUpdate->setNbLikes($nbLikesToUpdate);
        // $postToUpdate->setCreatedAt(new \DateTime());
        $postToUpdate->setUpdatedAt(new \DateTime('now'));
        $postToUpdate->setPublishedAt(new \DateTime('now'));

        $entityManager->flush();

        return $this->redirectToRoute('showAll');

    }



    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $repository = $this->getDoctrine()->getRepository(Post::class);

        $postToDelete = $repository->find($id);

        $entityManager->remove($postToDelete);
        $entityManager->flush();

        return $this->redirectToRoute('showAll');


    }

}
