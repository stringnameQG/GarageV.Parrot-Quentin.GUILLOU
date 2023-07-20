<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GaleriePhotoController extends AbstractController
{
    #[Route('/galerie/photo', name: 'app_galerie_photo')]
    public function index(): Response
    {
        return $this->render('galerie_photo/index.html.twig', [
            'controller_name' => 'GaleriePhotoController',
        ]);
    }
}
