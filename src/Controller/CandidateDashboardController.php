<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CandidateDashboardController extends AbstractController
{
    #[Route('/candidate/dashboard', name: 'app_candidate_dashboard')]
    public function index(): Response
    {
        return $this->render('candidate_dashboard/index.html.twig', [
            'controller_name' => 'CandidateDashboardController',
        ]);
    }
}
