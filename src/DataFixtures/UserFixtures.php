<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements OrderedFixtureInterface
{
    public $passwordHasher;
    public function __construct(userPasswordHasherInterface $passwordHasher) {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $plaintextPassword = 'test12345';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setEmail('test@test.fr')
            ->setPseudo('test')
            ->setPicture('https://picsum.photos/200/300')
            ->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
        $plaintextPassword = 'admin12345';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $plaintextPassword
        );
        $user->setPassword($hashedPassword);
        $user->setEmail('admin@admin.fr')
            ->setPseudo('Admin')
            ->setPicture('https://picsum.photos/200/300')
            ->setIsVerified(true);
        $manager->persist($user);

        $manager->flush();


    }

    public function getOrder()
    {
        return 1;
    }
}
