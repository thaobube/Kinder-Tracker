<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Level;

class LevelFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($i =0; $i < 3; $i ++) {
            $levels = ['Super', 'Moderate','Bad'];
            $level = new Level([
                'value' => $levels[$i]
            ]);
            $manager->persist($level);
        }

        $manager->flush();
    }
}
