<?php

namespace App\Controller\Admin;

use App\Entity\Actor;
use App\Entity\Movie;
use App\Entity\Studio;
use App\Entity\Genre;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            ->setTitle('MyMovieDB');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linktoCrud('Actor', 'fa fa-list', Actor::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linktoCrud('Movie', 'fa fa-list', Movie::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linktoCrud('Genre', 'fa fa-list', Genre::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linktoCrud('Studio', 'fa fa-list', Studio::class)
        ->setPermission('ROLE_ADMIN');
        yield MenuItem::linktoCrud('User', 'fa fa-list', User::class)
        ->setPermission('ROLE_ADMIN');
    }
}
