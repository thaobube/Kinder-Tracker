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

        if ($dayRecordOfOneChild == null) {
            $dayRecordOfOneChild = new DayRecord([
                'date' => $today,
                'isAtHome' => null,
                'reasonAtHome' => null,
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
                'child' => $child
            ]);
        }
        
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
        
        if ($dayRecordOfOneChild->getIsAtHome() == true) {
            return $this->render('parent/today_at_home.html.twig', $vars);
        }
        else{
            return $this->render('parent/today.html.twig', $vars);
        }

    }

    
    
    #[Route('/parent/yesterday', name: 'yesterday')]
    public function yesterday()
    {
        $user = $this->getUser();
        $child = $user->getChild();

        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(DayRecord::class);

        // get the date - yesterday
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

        if ($dayRecordOfOneChild->getIsAtHome() == false) {
            return $this->render('parent/yesterday.html.twig', $vars);
        }
        else{
            return $this->render('parent/yesterday_at_home.html.twig', $vars);
        }
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
