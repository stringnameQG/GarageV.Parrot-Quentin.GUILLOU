<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }


    public function load(ObjectManager $manager): void
    {
        

        $user = new User();
        $user->setName("Vincent");
        $user->setFirstName("Parrot");
        $user->setEmail("Parrot@email.fr");
        $user->setPassword($this->passwordHasher->hashPassword($user, "ParrotPassword"));
        $user->setRoles(["ROLE_ADMIN"]);

        $manager->persist($user);

        /*
        $user1 = new User();
        $user1->setName("robert");
        $user1->setFirstName("Parrot");
        $user1->setEmail("employe@email.fr");
        $user1->setPassword($this->passwordHasher->hashPassword($user, "ParrotPassword"));
        $user1->setRoles(["ROLE_USER"]);
        
        $manager->persist($user1);
        */
        
        $manager->flush();
    }
}
