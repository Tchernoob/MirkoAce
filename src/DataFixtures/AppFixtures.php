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
        // $admin = new User();
        // // hashed le pwd, marche pas actuellement
        // $admin
        //     ->setFirstName('Chloé')
        //     ->setLastName('Hertz')
        //     ->setPassword($this->userPasswordHasherInterface->hashPassword($admin, 'blabla' ))
        //     ->setRoles(['ROLE_ADMIN'])
        //     ->setEmail('chloe.hertz@outlook.fr ')
        //     ->setAlias('Mirko Ace')
        //     ->setCreatedAt(new \DateTimeImmutable());

        $prod = new User();
        $prod
            ->setFirstName('Admin')
            ->setLastName('Admin')
            ->setPassword($this->userPasswordHasherInterface->hashPassword($prod, 'Administrateur' ))
            ->setRoles(['ROLE_ADMIN'])
            ->setEmail('mirko-ace@admin.com')
            ->setAlias('Admin Mirko Ace')
            ->setCreatedAt(new \DateTimeImmutable());

        $manager->persist($prod);
        $manager->flush();
    }
}
