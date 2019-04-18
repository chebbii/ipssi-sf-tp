<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Post;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $post = new Post();
        $post->setTitle('testtest');
        $post->setContent('blablablablablablablablablabla');


        // tell doctrine you want to save the post

        $entityManager->persist($post);

        //executes the queries(i.e the INSERT query)
        $entityManager->flush();
        return new Response('save the new post with id '.$post->getId());

    }

    public function show($id) : Response
    {
        $post =$this->getDoctrine()
            ->getRepository(Post::class)
            ->find($id);

        if(!$post){
            throw $this->createNotFoundException(
                'no post found for id'.$id
            );
        }

        return new Response('check this out'.$post->getTitle());
    }





    /*public function show()
    {
        $articleQuery = $db->query('SELECT * FROM Post');
        $article = $articleQuery->fetchAll();

        $template = $twig->loadTemplate('post.html.twig');
        return $this->render(array('articles' => $articles,
        ));

        }
    */
}



