<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Faker;

class FrontController extends AbstractController
{
    #[Route('/front', name: 'front')]
    public function index(): Response
    {
        return $this->render('front/today.html.twig', [
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
}
