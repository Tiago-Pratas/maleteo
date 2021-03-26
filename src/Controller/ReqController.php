<?php

namespace App\Controller;

use App\Entity\Req;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/req", name="req")
    */
class ReqController extends AbstractController
{
    /**
     * @Route("/", name="uest", methods="POST")
    */   
    public function insertReq(EntityManagerInterface $doctrine, Request $request)
    {
        $username = $request->get('name');
        $email = $request->get('email');
        $city = $request->get('city');

        $user = new Req();
        $user->setUsername($username);
        $user->setEmail($email);
        $user->setCity($city);
        
        $doctrine->persist($user);
        $doctrine->flush();

        return $this->render('req/index.html.twig');
    }

    /**
     * @Route("/show", name="show", methods="GET")
     */
    public function showReq(EntityManagerInterface $doctrine) {

        //TODO: Revise this code
        $repo = $doctrine->getRepository(Req::class);

        $maleteo = $repo->findAll();

        return $this->render('req/show.html.twig', [
            'reqs'=>$maleteo
        ]);

    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function remove(Req $req) {
        $em = $this->getDoctrine()->getManager();

        $em->remove($req);
        $em->flush();

        $this->addFlash('success', 'Request removed');
        return $this->redirect($this->generateUrl('reqshow'));
        
    }
}