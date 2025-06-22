<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Http\SecurityRequestAttributes;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils,Request $request): Response
    {
            if ($this->getUser()) {
        return $this->redirectToRoute($this->getDashboardRouteForUser());
    }

        // Custom error messages
        $error = $authenticationUtils->getLastAuthenticationError();

        if ($error) {
            $request->getSession()->set(SecurityRequestAttributes::AUTHENTICATION_ERROR, $error);
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $error,
            'user_type' => $request->query->get('type') // For registration link context
        ]);
    }

    private function getDashboardRouteForUser(): string
    {
        $user = $this->getUser();

        return match (true) {
            in_array('ROLE_ADMIN', $user->getRoles()) => 'admin_dashboard',
            in_array('ROLE_ENTREPRISE', $user->getRoles()) => 'company_dashboard',
            default => 'candidate_dashboard',
        };


    /// if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one


    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new   \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
