<?php

namespace App\Controller;

use App\Entity\HoraireOuverture;
use App\Form\HoraireType;
use App\Repository\HoraireOuvertureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/horaire')]
class HoraireOuvertureController extends AbstractController
{
    #[Route('/', name: 'app_horaire_index', methods: ['GET'])]
    public function index(HoraireOuvertureRepository $horaireRepository): Response
    {
        return $this->render('horaire_ouverture/index.html.twig', [
            'horaires' => $horaireRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'app_horaire_edit', methods: ['GET', 'POST'])]
    public function edit(HoraireOuverture $horaire, Request $request, 
    EntityManagerInterface $em): Response
    {
        
        $horaireform = $this->createForm(HoraireType::class, $horaire);
        
        $horaireform->handleRequest($request);

        if($horaireform->isSubmitted() && $horaireform->isValid())
        {
            $em->persist($horaire);
            $em->flush();
        }

        return $this->render('horaire_ouverture/edit.html.twig', [
            'horaireform' => $horaireform->createView() 
        ]) ;
    }

    #[Route('/', name: 'app_horaire_index', methods: ['GET'])]
    public function footer(HoraireOuvertureRepository $horaireRepository): Response
    {
        return $this->render('horaire_ouverture/_horaire.html.twig', [
            'horaires' => $horaireRepository->findAll(),
        ]);
    }
}
