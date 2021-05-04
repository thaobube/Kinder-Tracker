<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {

        for ($i =1; $i <= 10; $i ++) {
            $user = new User();
            $user->setUsername ("user".$i);
            $user->setPassword($this->passwordEncoder->encodePassword(
                 $user,
                 'password'.$i
             ));
            $manager->persist($user);
        }

        $manager->flush();
    }
}
