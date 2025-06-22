<?php

namespace App\DataFixtures;

use App\Entity\Candidat;
use App\Entity\Entreprise;
use App\Entity\User;
use App\Enums\UserRole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher
    ) {}

    // In src/DataFixtures/AppFixtures.php

    public function load(ObjectManager $manager): void
    {
        // Admin User
        $admin = new User();
        $admin->setNom('Admin User')  // ← Make sure to set this required field
        ->setEmail('admin@recrutement.com')
            ->setRole(UserRole::ADMIN)
            ->setDateInscription(new \DateTime())
            ->setEtat(true)
            ->setMotDePasse(
                $this->passwordHasher->hashPassword($admin, 'admin123')
            );
        $manager->persist($admin);

        // Company User
        $companyUser = new Entreprise();
        $companyUser->setNom('Company User')
            ->setNomEntreprise("ACTIA")// ← Required
        ->setEmail('company@test.com')
            ->setRole(UserRole::ENTREPRISE)
            ->setDateInscription(new \DateTime())
            ->setEtat(true)
            ->setSecteur("Tech")
            ->setMotDePasse(
                $this->passwordHasher->hashPassword($companyUser, 'company123')
            );
        $manager->persist($companyUser);

        // Candidate User
        $candidateUser = new Candidat();
        $candidateUser->setNom('Candidate User')
                    ->setPrenom("Ahmed")// ← Required
                ->setEmail('candidate@test.com')
                  ->setRole(UserRole::CANDIDAT)
                  ->setDateInscription(new \DateTime())
                    ->setCv(".")
                    ->setEtat(true)
            ->setMotDePasse(
                $this->passwordHasher->hashPassword($candidateUser, 'candidate123')
            );
        $manager->persist($candidateUser);

        $manager->flush();
    }
}
