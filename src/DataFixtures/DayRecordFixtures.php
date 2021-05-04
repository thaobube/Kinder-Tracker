<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Child;
use App\Entity\DayRecord;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DayRecordFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $repChild = $manager->getRepository(Child::class);
        $childs = $repChild->findAll();

        // Create a list contain 5 days until today
        $today = new \DateTime('today');
        $clone = clone $today;
        $dayListString = [$today->format( 'd-m-Y' )];
        $dayListDT = [];
        
        for ($i=1; $i < 5; $i++) { 
            array_unshift($dayListString, ($clone->modify( '-1 day' )->format( 'd-m-Y' )));
        }        

        foreach ($dayListString as $dayString) {
            $dayDT = new \DateTime ($dayString);
            array_push($dayListDT, $dayDT);
        }

        // Records for 5 days
        foreach ($dayListDT as $dayDT) {

            // records of 10 childrens for 1 day
            for ($i =0; $i < 10; $i ++) {
                $isAtHomeList = [0, 1];
                $isAtHomeValue = $isAtHomeList[array_rand($isAtHomeList)];
    
                $reasonAtHomeList = ['Sick with temperature > 38.5', 'Sick - Cough With Vomiting', 'Go for holiday with family'];
    
                $homeDescList = ['Everything is good. At 7h30: drink 200ml bottle milk', 'Night sleep well. At 7h15: drink 250ml bottle milk', 'At 7h00: drink 220ml bottle milk. Pick up at 16h00'];
    
                $morningFoodList = ['Mango', 'Kiwi', 'Apple', 'Avocado'];
                $lunchFoodList = ['Beef spagetti', 'Mini ham pizza', 'Shrim & Brocolli Rice', 'Garlic Butter Bread with Salat'];
                $afternoonFoodList = ['Yogurt', 'Biscuit', 'Caramel'];
    
                $napDurationList = ['12h00 - 13h30', '12h15 - 13h50', '12h30 - 13h30'];
                $otherInfoList = ['Potty training is ok', 'Refuse to use potty', 'Fighting Nap', 'Play well with others'];

                $moods = ['Happy', 'Unhappy', 'Tired', 'Cry', 'Sick'];
                $levels = ['Super', 'Moderate', 'Bad'];
    
                if ($isAtHomeValue == 1) {
                    $dayRecord = new DayRecord([
                        'date' => $dayDT,
                        'isAtHome' => $isAtHomeValue,
                        'reasonAtHome' => $reasonAtHomeList[array_rand($reasonAtHomeList)],
                        'homeDescription' =>null,
                        'morningSnackFood' =>null,
                        'lunchSnackQty' =>null,
                        'lunchFood' =>null,
                        'lunchQty' =>null,
                        'afternoonSnackFood' =>null,
                        'afternoonSnackQty' =>null,
                        'peeCount' =>null,
                        'pooCount' =>null,
                        'napDuration' =>null,
                        'otherInfo' =>null,
                        'homeMood' =>null,
                        'daycareMood' =>null,
                        'child' => $childs[$i]
                    ]);
                } else {
                    $dayRecord = new DayRecord([
                        'date' => $dayDT,
                        'isAtHome' => $isAtHomeValue,
                        'reasonAtHome' => null,
                        'homeDescription' => $homeDescList[array_rand($homeDescList)],
                        'morningSnackFood' => $morningFoodList[array_rand($morningFoodList)],
                        'morningSnackQty' => $levels[array_rand($levels)],
                        'lunchFood' => $lunchFoodList[array_rand($lunchFoodList)],
                        'lunchQty' => $levels[array_rand($levels)],
                        'afternoonSnackFood' => $afternoonFoodList[array_rand($afternoonFoodList)],
                        'afternoonSnackQty' => $levels[array_rand($levels)],
                        'peeCount' => rand(0, 5),
                        'pooCount' => rand(0, 5),
                        'napDuration' => $napDurationList[array_rand($napDurationList)],
                        'otherInfo' => $otherInfoList[array_rand($otherInfoList)],
                        'homeMood' => $moods[array_rand($moods)],
                        'daycareMood' => $moods[array_rand($moods)],
                        'child' => $childs[$i]
                    ]);
                }
    
                $manager->persist($dayRecord);
            }            
        }        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ChildFixtures::class,
        ];
    }
}
