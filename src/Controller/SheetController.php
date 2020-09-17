<?php

namespace App\Controller;

use App\Entity\Sheet;
use App\Form\SheetType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sheet", name="sheet_")
 */
class SheetController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('sheet/index.html.twig', [
            'controller_name' => 'SheetController',
        ]);
    }

    /**
     * @Route("/new", name="new")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request, EntityManagerInterface $entityManager)
    {
        $sheet = new Sheet();
        $form = $this->createForm(SheetType::class, $sheet);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sheet->setAuthor($this->getUser());
            $entityManager->persist($sheet);
            $entityManager->flush();
        }
        return $this->render('sheet/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
