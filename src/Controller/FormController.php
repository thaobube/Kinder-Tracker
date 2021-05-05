<?php

namespace App\Controller;

use App\Form\AtHomeType;
use App\Form\ChildType;
use App\Entity\DayRecord;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    #[Route('/parent/child/profile/edit', name: 'profile_edit')]
    public function profileEdit(Request $req)
    {
        
        $user = $this->getUser();
        $child = $user->getChild();
        
        // $vars = [
        //     'child' =>$child
        // ];
        
        $formChild = $this->createForm(ChildType::class, $child, [
            'action' => $this->generateUrl('profile_edit'),
            'method' => 'POST'
        ]);

        $formChild->handleRequest($req);

        if ($formChild->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($child);
            $em->flush();
            return $this->render('/parent/child_profile.html.twig', ['child' =>$child]);
        }
        else {
            $vars = ['editProfile' => $formChild->createView()];        
            return $this->render('/parent/child_profile_edit.html.twig', $vars);
        }
    }

    #[Route('/parent/today/edit', name: 'today_edit')]
    public function todayEdit(Request $req)
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
        
        $formAtHome = $this->createForm(AtHomeType::class, $dayRecordOfOneChild , [
            'action' => $this->generateUrl('today_edit'),
            'method' => 'POST'
        ]);

        $formAtHome->handleRequest($req);

        if ($formAtHome->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($dayRecordOfOneChild);
            $em->flush();
            return $this->render('/parent/today.html.twig', [
                'dayRecord' => $dayRecordOfOneChild, 
                'child' =>$child,
                'moods' => $moods,
                'levels' => $levels
                ]);
        }
        else {
            $vars = ['editToday' => $formAtHome->createView(),
                     'child'    => $child,
                     'dayRecord' => $dayRecordOfOneChild
                    ];        
            return $this->render('/parent/today_edit.html.twig', $vars);
        }
    }
}