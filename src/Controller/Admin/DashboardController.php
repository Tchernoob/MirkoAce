<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Flash;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

class DashboardController extends AbstractDashboardController
{
     // Sécuriser la page 
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mirko Ace');
            
    }

    // Affichage du logo pour l'avatar de l'Utilisateur Connecté, lien pour la page à propos du tatoueur
    public function configureUserMenu(UserInterface $user): UserMenu
    {
        if (!$user instanceof User) {
            throw new \Exception('Wrong user');
        }

        return parent::configureUserMenu($user)
            ->setAvatarUrl($user->getLogoUrl())
            ->setMenuItems([
                // à modifier quand j'ai créé la page à propos de Mirko Ace
                MenuItem::linkToUrl('Mon profil', 'fas fa-user', $this->generateUrl('app_home')),
                MenuItem::linkToLogout('Déconnexion', 'fa fa-exit'),
            ]);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-university');
        yield MenuItem::linkToCrud('Flashs', 'fa fa-area-chart', Flash::class);
        yield MenuItem::linkToCrud('Catégories', 'fa fa-filter', Category::class);
        yield MenuItem::linkToCrud('Tatoueurs', 'fa fa-users', User::class);
        yield MenuItem::linkToUrl('Mirko Ace', 'fas fa-home', $this->generateUrl('app_home'));
    }

    // Ajout de la page detail pour les objets de chaques entités 
    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}