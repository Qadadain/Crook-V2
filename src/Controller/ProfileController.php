<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * @Route("/mes-sheets", name="my_sheet")
     * @return Response
     */
    public function userSheet(): Response
    {
        return $this->render('sheet/index.html.twig', [
            'sheets' => $this->getUser()->getSheets(),
        ]);
    }

    /**
     * @Route("/mes-tutoriels", name="my_sheet")
     * @return Response
     */
    public function userTutorial()
    {
        return $this->render('sheet/index.html.twig', [
            'tutorials' => $this->getUser()->getTutorials(),
        ]);
    }

}
