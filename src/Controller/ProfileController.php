<?php

namespace App\Controller;

use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     */
    public function index()
    {
        return $this->render('profile/index.html.twig', [
            'user' => $this->getUser(),
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
     * @return Response
     */
    public function userTutorial(): Response
    {
        return $this->render('profile/myTutorial.html.twig', [
            'tutorials' => $this->getUser()->getTutorials(),
        ]);
    }

}
