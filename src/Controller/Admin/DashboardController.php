<?php

namespace App\Controller\Admin;

use App\Entity\Comment;
use App\Entity\Language;
use App\Entity\Sheet;
use App\Entity\Tutorial;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Dashboard Crook');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to Crook', 'fa fa-home', 'home');

        yield MenuItem::section('CRUD');
        yield MenuItem::linkToCrud('User', 'far fa-id-card', User::class);
        yield MenuItem::linkToCrud('Sheet', 'fas fa-code', Sheet::class);
        yield MenuItem::linkToCrud('Langage', 'far fa-file-code', Language::class);
        yield MenuItem::linkToCrud('Tutoriel', 'far fa-file-alt', Tutorial::class);
        yield MenuItem::linkToCrud('Commentaire', 	'far fa-comments', Comment::class);

    }
}
