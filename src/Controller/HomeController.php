<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(EntityManagerInterface $em)
    {
        $sheets = $em->getRepository('App:Sheet')->findBy([], ['createAt' => 'ASC' ], 6 );

        return $this->render('home/index.html.twig', [
            'sheets' => $sheets
        ]);
    }
}
