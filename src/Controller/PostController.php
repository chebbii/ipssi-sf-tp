<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Post;

class PostController extends AbstractController
{

    /**
     * @param $repository
     * @return Response
     */
    public function index($repository) : Response
    {
        $repository=$this->getDoctrine()->getRepository(Post::class);
        $post= $repository->findAll();


        return new Response('post.html.twig',array('post' => $post));
    }






}



