<?php

namespace App\Controller;

use App\Entity\Sheet;
use App\Form\SheetType;
use App\Repository\LanguageRepository;
use App\Repository\SheetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
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
     * @param SheetRepository $sheetRepository
     * @return Response
     */
    public function index(SheetRepository $sheetRepository): Response
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
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
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
        if ($sheet->getAuthor() === $this->getUser()) {
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
        throw new Exception('Vous n\'êtes pas l\'auteur de ce sheet ou veuillez vous connecter', 401);
    }

    /**
     * @Route("/{slugLanguage}/{slug}", name="show", requirements={"language": "[a-z]+", "slug": "[a-z0-9-]+"})
     * @param string $slugLanguage
     * @param string $slug
     * @param LanguageRepository $languageRepository
     * @param SheetRepository $sheetRepository
     * @return Response
     * @throws \Exception
     */
    public function show(string $slugLanguage, string $slug, LanguageRepository $languageRepository, SheetRepository $sheetRepository): Response
    {
        $language = $languageRepository->findOneBy(['slug' => $slugLanguage]);
        if (!$language) {
            throw new \Exception('Le language est invalide', 404);
        }
        $sheet = $sheetRepository->findOneBy(['slug' => $slug, 'language' => $language]);
        if (!$sheet) {
            throw new \Exception('Le sheet n\'existe pas', 404);
        }
        return $this->render('sheet/show.html.twig', [
            'content' => $sheet,
        ]);
    }
}
