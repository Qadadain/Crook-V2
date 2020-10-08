<?php

namespace App\Controller;

use App\Repository\SheetRepository;
use App\Repository\TutorialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param SheetRepository $sheetRepository
     * @param TutorialRepository $tutorialRepository
     * @return Response
     */
    public function index(SheetRepository $sheetRepository, TutorialRepository $tutorialRepository)
    {
        $sheets = $sheetRepository->findBy([], ['createAt' => 'DESC' ], 3 );
        $tutorials = $tutorialRepository->findBy([], ['createAt' => 'DESC'], 2);

        return $this->render('home/index.html.twig', [
            'sheets' => $sheets,
            'tutorials' => $tutorials,
        ]);
    }

    /**
     * @Route("/about", name="_about")
     */
    public function about()
    {
    return $this->render('home/about.html.twig');
    }
}
