<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoVehiculeController extends AbstractController
{
    #[Route('/info/vehicule', name: 'app_info_vehicule')]
    public function index(): Response
    {
        return $this->render('info_vehicule/index.html.twig', [
            'controller_name' => 'InfoVehiculeController',
        ]);
    }
}
