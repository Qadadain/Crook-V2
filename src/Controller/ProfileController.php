<?php

namespace App\Controller;

use App\Form\UserType;
use App\Repository\SheetRepository;
use App\Repository\TutorialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profil", name="profile_")
 */
class ProfileController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(EntityManagerInterface $em)
    {

        return $this->render('profile/index.html.twig', [
            'sheetCount' => count($this->getUser()->getSheets()),
            'tutorialCount' => count($this->getUser()->getTutorials()),
            'favoriteCount' => count($this->getUser()->getFavorite())
        ]);
    }

    /**
     * @Route("/edit", name="edit")
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {

        $form = $this->createForm(UserType::class, $this->getUser());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('profile_index');
        }
        return $this->render('profile/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/mes-sheets", name="my_sheet")
     * @return Response
     */
    public function userSheet(): Response
    {

        return $this->render('profile/mySheet.html.twig', [
            'sheets' => $this->getUser()->getSheets(),
        ]);
    }

    /**
     * @Route("/mes-tutoriels", name="my_tutorial")
     * @param TutorialRepository $tutorialRepository
     * @return Response
     */
    public function userTutorial(TutorialRepository $tutorialRepository): Response
    {
        $tutorials = $tutorialRepository->findBy(['author' => $this->getUser()]);

        return $this->render('profile/myTutorial.html.twig', [
            'tutorials' => $tutorials,
        ]);
    }

    /**
     * @Route("/mes-favoris", name="my_favorite")
     * @return Response
     */
    public function userFavorite():Response
    {
        return $this->render('profile/myFavorite.html.twig', [
            'sheets' => $this->getUser()->getFavorite(),
        ]);
    }

    /**
     * @Route("/add-favorite", name="add-favorite")
     * @param Request $request
     * @param SheetRepository $sheetRepository
     * @param EntityManagerInterface $entityManager
     * @return JsonResponse
     */
    public function checkFavorite(Request $request, SheetRepository $sheetRepository, EntityManagerInterface $entityManager): JsonResponse
    {
        $id = $request->request->get('id');
        $sheet = $sheetRepository->find($id);
        $user = $this->getUser();

        if (!$user->getFavorite()->contains($sheet)) {
            $newFavorite = $user->addFavorite($sheet);
            $entityManager->persist($newFavorite);
            $entityManager->flush();
            $isRemove = false;
        } else {
            $removeFavorite = $user->removeFavorite($sheet);
            $entityManager->persist($removeFavorite);
            $entityManager->flush();
            $isRemove = true;
        }

        return new JsonResponse($isRemove, 200);
    }

}
