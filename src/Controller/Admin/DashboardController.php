<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Flash;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    
    // Sécuriser la page 
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mirko Ace');
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-university');
        yield MenuItem::linkToCrud('Flashs', 'fa fa-area-chart', Flash::class);
        yield MenuItem::linkToCrud('Catégories', 'fa fa-filter', Category::class);
        yield MenuItem::linkToCrud('Tatoueurs', 'fa fa-users', User::class);
    }
}
