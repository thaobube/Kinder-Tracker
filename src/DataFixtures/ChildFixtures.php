<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Child;

class ChildFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        
        for ($i =0; $i < 50; $i ++) {
            $classes = ['Butterfly', 'Ant','Bee'];
            $child = new Child([
                'firstName' => $faker->firstName,
                'lastName' => $faker->lastName,
                'birthDate' => $faker->date,
                'parentEmail' => $faker->email,
                'fatherPhone' => $faker->phoneNumber,
                'motherPhone' => $faker->phoneNumber,
                'address' => $faker->address,
                'class' => $classes[array_rand($classes)]
            ]);
            $manager->persist($child);
        }

        $manager->flush();
    }
}
