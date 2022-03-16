<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('boochebee@admin.com');
        $user->setName('Tim');
        $password = $this->hasher->hashPassword($user, 'admin');
        $user->setPassword($password);
        $user->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);

        for ($i = 1; $i <= 49; $i++) {

            $user = new User();
            $user->setEmail('Jobs'.$i.'@test.com');
            $user->setName('Steve'.$i);
            $password = $this->hasher->hashPassword($user, 'user');
            $user->setPassword($password);
            $user->setRoles(['ROLE_USER']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
