<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Tutorial;
use App\Form\CommentType;
use App\Form\TutorialType;
use App\Repository\TutorialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tutorial", name="tutorial_")
 */
class TutorialController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param TutorialRepository $tutorial
     * @return Response
     */
    public function index(TutorialRepository $tutorial): Response
    {
        $tutorials = $tutorial->findAll();

        return $this->render('tutorial/index.html.twig', [
            'tutorials' => $tutorials,
        ]);
    }

    /**
     * @Route("/new", name="new")
     * @return Response
     */
    public function new(): Response
    {
        $form = $this->createForm(TutorialType::class);
        return $this->render('tutorial/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="show")
     * @param Tutorial $tutorial
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function show(Tutorial $tutorial, Request $request, EntityManagerInterface $em): Response
    {
        $comment = new Comment();

        $comments = $tutorial->getComments();

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $comment->setUser($this->getUser());
            $comment->setTutorial($tutorial);

            $em->persist($comment);

            $em->flush();

        }
        return $this->render('tutorial/show.html.twig', [
            'tutorial' => $tutorial,
            'form'     => $form->createView(),
            'comments' => $comments
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", requirements={"id"="[0-9]+"})
     * @param Tutorial $tutorial
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function edit(Tutorial $tutorial, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($tutorial->getAuthor() === $this->getUser()) {
            $form = $this->createForm(TutorialType::class, $tutorial);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $entityManager->flush();

                return $this->redirectToRoute('tutorial_index');
            }
            return $this->render('tutorial/edit.html.twig', [
                'form' => $form->createView(),
            ]);
        }
        throw new Exception('Vous n\'êtes pas l\'auteur de ce sheet ou veuillez vous connecter', 401);
    }
}
