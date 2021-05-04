<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Faker;
use App\Entity\Child;
use App\Controller\DateTime;

class FrontController extends AbstractController
{
    #[Route('/front', name: 'front')]
    public function index(): Response
    {
        return $this->render('front/stay_at_home.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    // test Faker
    #[Route('/test/faker', name: 'testFaker')]
    public function testFaker()
    {
        $faker = Faker\Factory::create();
        dump ($faker->firstName);
        dd("ok");
    }

    // test DB
    #[Route('/test/db', name: 'testDB')]
    public function testDB()
    {
        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(Child::class);

        $arr1 =  $rep->findBy([
            'class' => 'Butterfly'
        ]);

        $arr2 = $rep->findAll();
        
        for ($i=0; $i < count($arr2); $i++) { 
            dump ($arr2[$i]->getId());            
        }
        // dump ($arr2[0]->getId()); 
        die();
    }

    // test date
    #[Route('/test/date', name: 'testDate')]
    public function testDate()
    {
        $today = new \DateTime('today');
        $clone = clone $today;
        $dayListString = [$today->format( 'd-m-Y' )];
        $dayListDT = [];
        
        for ($i=1; $i < 10; $i++) { 
            array_unshift($dayListString, ($clone->modify( '-1 day' )->format( 'd-m-Y' )));
        }        

        foreach ($dayListString as $dayString) {
            $dayDT = new \DateTime ($dayString);
            array_push($dayListDT, $dayDT);
        }
        
        dump($dayListString);
        dd($dayListDT);

        /////////////////////////////

        // $today = new \DateTime('today');
        // $todayStr = $today->format('d-m-Y');

        // $my_date = new \DateTime($todayStr);

        // dump($today);
        // dump($todayStr);
        // dump($my_date);
        // die();
    }

        // test Boolean
        #[Route('/test/boolean', name: 'testBoolean')]
        public function testBoolean()
        {
            for ($i =0; $i < 50; $i ++) {
                $isAtHomeList = [0, 1];
                $isAtHomeValue = $isAtHomeList[array_rand($isAtHomeList)];
                dump($isAtHomeValue);
            }
            die();
        }
}
