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


    #[Route('/parent/test', name: 'parent_test')]
    public function parentTest()
    {
        $user = $this->getUser();
        $child = $user->getChild();
        dump($child);


        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository(DayRecord::class);

        $dayRecordOfOneChild = $rep->findBy(['Child' => $child]);

        dump($dayRecordOfOneChild);
        die();
    }
}
