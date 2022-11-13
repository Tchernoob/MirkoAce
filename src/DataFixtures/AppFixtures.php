<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $userPasswordHasherInterface;

    public function __construct (UserPasswordHasherInterface $userPasswordHasherInterface)
    {
        $this->userPasswordHasherInterface = $userPasswordHasherInterface;
    }
    
    public function load(ObjectManager $manager): void
    {
        // Load Admin Mirko Ace
        $admin = new User();
        $admin
            ->setFirstName('Admin')
            ->setLastName('Admin')
            ->setPassword($this->userPasswordHasherInterface->hashPassword($admin, 'MotdePasseAdministrateur' ))
            ->setRoles(['ROLE_ADMIN'])
            ->setEmail('administrateur@test.com')
            ->setAlias('Mirko Ace')
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($admin);
        $manager->flush();
    }
}
