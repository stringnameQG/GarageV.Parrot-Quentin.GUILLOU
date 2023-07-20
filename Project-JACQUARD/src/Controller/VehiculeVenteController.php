<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HoraireOuvertureRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\FormulaireContacte;
use App\Form\FormulaireContacteType;
use App\Repository\VoitureRepository;

#[Route('/vehicule')]
class VehiculeVenteController extends AbstractController
{
    #[Route('/vente', name: 'app_voiture_vente', methods: ['GET','POST'])]
    public function index(
    HoraireOuvertureRepository $horaireRepository,
    VoitureRepository $voitureRepository,
    Request $request, EntityManagerInterface $em,
    ): Response
    {
        $formulaire = new FormulaireContacte();
        $formulaireform = $this->createForm(FormulaireContacteType::class, $formulaire);
        $formulaireform->handleRequest($request);





        if($formulaireform->isSubmitted() && $formulaireform->isValid())
        {
            $em->persist($formulaire);
            $em->flush();
        }

        return $this->render('vehicule_vente/index.html.twig', [
            'horaires' => $horaireRepository->findAll(),
            'voitures' => $voitureRepository,
            'formulaireform' => $formulaireform->createView(),
        ]);
    }


    

}



/*

#[Route('/vehicule')]
class VehiculeVenteController extends AbstractController
{
    #[Route('/vente', name: 'Voiture', methods: ['GET','POST'])]
    public function index(
    HoraireOuvertureRepository $horaireRepository,
    VoitureRepository $voitureRepository,
    Request $request, EntityManagerInterface $em,
    ): Response
    {
        $formulaire = new FormulaireContacte();
        $formulaireform = $this->createForm(FormulaireContacteType::class, $formulaire);
        $formulaireform->handleRequest($request);





        if($formulaireform->isSubmitted() && $formulaireform->isValid())
        {
            $em->persist($formulaire);
            $em->flush();
        }

        return $this->render('vehicule_vente/index.html.twig', [
            'horaires' => $horaireRepository->findAll(),
            'voitures' => $voitureRepository,
            'formulaireform' => $formulaireform->createView(),
        ]);
    }


    

}
*/


/*
class VehiculeVenteController extends AbstractController
{
    #[Route('/vehicule/vente', name: 'Voiture', methods: ['GET','POST'])]
    public function index(
    HoraireOuvertureRepository $horaireRepository,
    VoitureRepository $voitureRepository,
    Request $request, EntityManagerInterface $em,
    ): Response
    {
        $formulaire = new FormulaireContacte();
        $formulaireform = $this->createForm(FormulaireContacteType::class, $formulaire);
        $formulaireform->handleRequest($request);

        if($formulaireform->isSubmitted() && $formulaireform->isValid())
        {
            $em->persist($formulaire);
            $em->flush();
        }

        return $this->render('vehicule_vente/index.html.twig', [
            'horaires' => $horaireRepository->findAll(),
            'voitures' => $voitureRepository->findAll(),
            'formulaireform' => $formulaireform->createView()
        ]);
    }
}
*/