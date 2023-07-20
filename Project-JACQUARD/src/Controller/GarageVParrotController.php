<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use App\Repository\VoitureRepository;
use App\Repository\HoraireOuvertureRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\FormulaireContacte;
use App\Form\FormulaireContacteType;

use App\Repository\ServiceRepository;

class GarageVParrotController extends AbstractController
{
    #[Route('/garage/v/parrot', name: 'Accueil', methods: ['GET','POST'],)]
    public function index(
    HoraireOuvertureRepository $horaireRepository,
    CommentaireRepository $commentaireRepository,
    VoitureRepository $voitureRepository,
    ServiceRepository $serviceRepository,
    Request $request, EntityManagerInterface $em,
    ): Response
    {
        $commentaire = new Commentaire();
        $commentaireform = $this->createForm(CommentaireType::class, $commentaire);
        $commentaireform->handleRequest($request);

        $formulaire = new FormulaireContacte();
        $formulaireform = $this->createForm(FormulaireContacteType::class, $formulaire);
        $formulaireform->handleRequest($request);

        if($commentaireform->isSubmitted() && $commentaireform->isValid())
        {

            $em->persist($commentaire);
            $em->flush();
        }

        if($formulaireform->isSubmitted() && $formulaireform->isValid())
        {

            $em->persist($formulaire);
            $em->flush();
        }
        
        return $this->render('garage_v_parrot/index.html.twig', [
            'horaires' => $horaireRepository->findAll(),
            'commentaires' => $commentaireRepository->findAll(),
            'voitures' => $voitureRepository->findAll(),
            'services' => $serviceRepository->findAll(),
            'commentaireform' => $commentaireform->createView(),
            'formulaireform' => $formulaireform->createView()
        ]); 
    }
}