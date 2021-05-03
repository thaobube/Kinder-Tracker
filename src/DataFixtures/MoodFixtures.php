<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use App\Entity\Mood;

class MoodFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($i =0; $i < 5; $i ++) {
            $moods = ['Happy', 'Unhappy', 'Tired', 'Cry', 'Sick'];
            $mood = new Mood([
                'value' => $moods[$i]
            ]);
            $manager->persist($mood);
        }
        $manager->flush();
    }
}
