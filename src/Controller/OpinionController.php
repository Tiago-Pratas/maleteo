<?php

namespace App\Controller;

use App\Entity\Opinion;
use App\Form\OpinionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OpinionController extends AbstractController
{
    /**
     * @Route("/opinion", name="opinion")
     */
    public function createOpinion(Request $request): Response
    {
        $opinion = new Opinion();

        $form = $this->createForm(OpinionType::class, $opinion);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
             //entity manager
            $em = $this->getDoctrine()->getManager();

            $em->persist($opinion);
            $em->flush();

            dump($opinion);

            return $this->redirect($this->generateUrl('home'));
        };   
        
        //return a  reponse
        return $this->render('opinion/index.html.twig', [
            'form' => $form->createView()
        ]);
        }
}
