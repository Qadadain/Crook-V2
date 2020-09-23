<?php

namespace App\Controller;

use App\Entity\Language;
use App\Repository\LanguageRepository;
use App\Repository\SheetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/language", name="language_")
 * Class LanguageController
 * @package App\Controller
 */
class LanguageController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param LanguageRepository $languageRepository
     * @return Response
     */
    public function index(LanguageRepository $languageRepository)
    {
        $language = $languageRepository->findAll();

        return $this->render('language/index.html.twig', [
            'languages' => $language,
        ]);
    }

    /**
     * @Route ("/{id}", name="show")
     * @param Language $language
     * @param SheetRepository $sheetRepository
     * @return Response
     */
   public function show(Language $language, SheetRepository $sheetRepository)
   {

       $sheets = $sheetRepository->findBy(['language' => $language ]);
       return $this->render('language/show.html.twig', [
        "sheets" => $sheets,
       ]);
   }
}
