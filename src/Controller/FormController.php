<?php

namespace App\Controller;

use App\Form\ChildType;
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
}
