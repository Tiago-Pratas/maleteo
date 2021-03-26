<?php

namespace App\Controller;

use App\Repository\OpinionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function displayOpiniones(OpinionRepository $opinionRepository): Response
    {
        $opinions = $opinionRepository->findAll();

        return $this->render('main/index.html.twig', [
                'opinions' => $opinions
            ]);    }
}
