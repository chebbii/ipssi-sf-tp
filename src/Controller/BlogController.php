<?php

namespace App\Controller;


use App\Entity\BlogPost;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/BlogPost", name="blog")
     */
    public function add()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $post = new BlogPost();
        $post->setTitle('Trois');
        $post->setDescription('Ergonomic lksdlks ign!');
        $post->setBody('lorem lorem lorem lorem lorem lorem lorem loremloremloremlorem ');
        $post->setAuthor('red');

        $entityManager->persist($post);

        $entityManager->flush();
        return new Response('Saved new product with id ' . $post->getId());
    }

    public function show() : Response
    {
        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository(BlogPost::class)->findAll();

        return $this->render("post.html.twig", array(
            'posts' => $posts
        ));






    }
}
