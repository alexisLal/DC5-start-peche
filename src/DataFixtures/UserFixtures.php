<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setUsername("admin@gmail.com");
        $user->setRoles(["ROLE_USER"]);
        $hashedPassword = $this->passwordHasher->hashPassword($user, "azerty");
        $user->setPassword($hashedPassword);
        $manager->persist($user);

        $manager->flush();
    }
}
