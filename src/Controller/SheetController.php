<?php

namespace App\Controller;

use App\Entity\Sheet;
use App\Form\SheetType;
use App\Repository\SheetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sheet", name="sheet_")
 */
class SheetController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(SheetRepository $sheetRepository)
    {
        $sheets = $sheetRepository->findAll();

        return $this->render('sheet/index.html.twig', [
            'sheets' => $sheets,
        ]);
    }

    /**
     * @Route("/new", name="new")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
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
            $this->redirectToRoute('sheet_index');
        }
        return $this->render('sheet/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit", requirements={"id"="[0-9]+"})
     * @param Sheet $sheet
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function edit(Sheet $sheet, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SheetType::class, $sheet);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('sheet_index');
        }
        return $this->render('sheet/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
