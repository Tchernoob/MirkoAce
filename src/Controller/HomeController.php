<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\FlashRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(FlashRepository $fr, CategoryRepository $cr): Response
    {
        $flashs = $fr->findAll();
        $categories = $cr->findAll(); 
        return $this->render('home/index.html.twig', [
            'flashs' => $flashs,
            'categories' => $categories
        ]);
    }
}
