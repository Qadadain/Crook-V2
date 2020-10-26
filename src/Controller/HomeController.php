<?php

namespace App\Controller;

use App\Repository\SheetRepository;
use App\Repository\TutorialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request,SheetRepository $sheetRepository, TutorialRepository $tutorialRepository)
    {
        $sheets = $sheetRepository->findBy([], ['createAt' => 'DESC' ], 3 );
        $tutorials = $tutorialRepository->findBy([], ['createAt' => 'DESC'], 2);

        if ($request->request->has('searchBar')) {
            $search = $sheetRepository->searchSheetAndTuto($request->request->get('searchBar'));
        }

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

    /**
     * @Route("/home/axiosSearch")
     * @param Request $request
     * @return Response
     */
    public function axiosNavBar(Request $request, SheetRepository $sheetRepository): Response
    {
        return new JsonResponse(dump($sheetRepository->searchSheetAndTuto($request->request->get('searchNav'))));
    }
}
