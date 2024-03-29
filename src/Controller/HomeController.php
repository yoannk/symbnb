<?php

namespace App\Controller;

use App\Repository\AdRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'homepage')]
    public function index(AdRepository $adRepository, UserRepository $userRepository): Response
    {
        return $this->render('home.html.twig', [
            'bestAds' => $adRepository->findBestAds(3),
            'bestUsers' => $userRepository->findBestUsers(2),
        ]);
    }
}
