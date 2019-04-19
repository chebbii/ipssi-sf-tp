<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Form\AddCommentType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="comment")
     */
    public function test(Request $request)
    {
        $comment = new Comment();

        $form =$this->createForm(AddCommentType::class, $comment);

        $form->handleRequest($request);

        if($form->isSubmitted()){
            // enregister l'utilisateur dans la base
            $en = $this->getDoctrine()->getManager();
            $en->persist($comment);
            $en->flush();
            return new Response('commentaire ajouter');
        }

        return $this->render('comment.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
