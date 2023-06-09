<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Wallet;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    private $passwordHasher ;

    public function  __construct(UserPasswordHasherInterface $passwordHasher){
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('mail@mail.com');
        $user->setUsername('MatthieuI0');
        $user->setPassword($this->passwordHasher->hashPassword($user, '123'));

        $wallet = new Wallet();

        $wallet->setLabel('Credits')->setCredits(100)->setAuthor($user);

        $manager->persist($user);
        $manager->persist($wallet);

        $manager->flush();
    }
}
