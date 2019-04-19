<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurController extends AbstractController
{
    public function utilisateur(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
    
        $utilisateur = new User();
        $form = $this->createForm(UserType::class, $utilisateur);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($utilisateur, 
            $utilisateur->getPassword());
            $utilisateur->setPassword($password);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($utilisateur);
            $entityManager->flush();
        }
        return $this->render('utilisateur.html.twig',
            ['form' => $form->createView()]
        );
    }
}