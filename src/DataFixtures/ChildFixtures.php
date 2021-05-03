<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Child;
use App\Entity\User;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ChildFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        $repUser = $manager->getRepository(User::class);
        $users = $repUser->findAll();
        
        for ($i =0; $i < 50; $i ++) {
            $classes = ['Butterfly', 'Ant','Bee'];
            $child = new Child([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'birthDate' => $faker->datetime,
                'parentEmail' => $faker->email,
                'fatherPhone' => $faker->phoneNumber,
                'motherPhone' => $faker->phoneNumber,
                'address' => $faker->address,
                'class' => $classes[array_rand($classes)],
                'user' => $users[$i]
            ]);
            $manager->persist($child);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
