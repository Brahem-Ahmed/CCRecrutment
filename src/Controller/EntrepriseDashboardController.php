<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EntrepriseDashboardController extends AbstractController
{
    #[Route('/entreprise/dashboard', name: 'app_entreprise_dashboard')]
    public function index(): Response
    {
        return $this->render('entreprise_dashboard/index.html.twig', [
            'controller_name' => 'EntrepriseDashboardController',
        ]);
    }
}
