<?php

namespace App\Controller;

use App\Entity\DayRecord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParentController extends AbstractController
{
    #[Route('/parent/home', name: 'parent_home')]
    public function parentHome()
    {
        $user = $this->getUser();
        $child = $user->getChild();

        $vars = [
            'child' =>$child
        ];

        return $this->render('parent/home.html.twig', $vars);
    }

    #[Route('/parent/child/profile', name: 'child_profile')]
    public function childProfile()
    {
        $user = $this->getUser();
        $child = $user->getChild();

        $vars = [
            'child' =>$child
        ];

        return $this->render('parent/child_profile.html.twig', $vars);
    }

    #[Route('/parent/inform', name: 'inform')]
    public function inform()
    {
        $user = $this->getUser();
        $child = $user->getChild();

        $vars = [
            'child' =>$child
        ];

        return $this->render('parent/inform.html.twig', $vars);
    }

    #[Route('/parent/today', name: 'today')]
    public function today()
    {
        $user = $this->getUser();
        $child = $user->getChild();

        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(DayRecord::class);

        $today = new \DateTime('today');

        $dayRecordOfOneChild = $rep->findOneBy([
            'Child' => $child,
            'date' => $today
            ]);
        
        $moods = [
            0 => 'Happy',
            1 => 'Unhappy',
            2 => 'Tired',
            3 => 'Cry',
            4 => 'Sick'];

        $levels = [
            0 => 'Super',
            1 => 'Moderate',
            2 => 'Bad'];

        $vars = [
            'child' =>$child,
            'dayRecord' => $dayRecordOfOneChild ,
            'moods' => $moods,
            'levels' => $levels
        ];

        return $this->render('parent/today.html.twig', $vars);
    }

    #[Route('/parent/past/day', name: 'past_day')]
    public function pastDay()
    {
        $user = $this->getUser();
        $child = $user->getChild();

        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(DayRecord::class);

        // example: take the date:(yesterday)
        $today = new \DateTime('today');
        $clone = clone $today;
        $yesterday = $clone->modify( '-1 day' );

        $dayRecordOfOneChild = $rep->findOneBy([
            'Child' => $child,
            'date' => $yesterday
            ]);
        
        $moods = [
            0 => 'Happy',
            1 => 'Unhappy',
            2 => 'Tired',
            3 => 'Cry',
            4 => 'Sick'];

        $levels = [
            0 => 'Super',
            1 => 'Moderate',
            2 => 'Bad'];

        $vars = [
            'child' =>$child,
            'dayRecord' => $dayRecordOfOneChild ,
            'moods' => $moods,
            'levels' => $levels
        ];

        return $this->render('parent/past_day.html.twig', $vars);
    }

    #[Route('/parent/test', name: 'parent_test')]
    public function parentTest()
    {
        $user = $this->getUser();
        $child = $user->getChild();
        dump($child);


        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(DayRecord::class);

        // $dayRecordOfOneChild = $rep->findBy(['Child' => $child]);

        $today = new \DateTime('today');
        $clone = clone $today;
        $yesterday = $clone->modify( '-1 day' );

        dump($yesterday);

        $dayRecordOfOneChild = $rep->findBy([
            'Child' => $child,
            'date' => $today
            ]);
        

        dump($dayRecordOfOneChild);
        die();
    }
}
