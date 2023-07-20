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

class ReparationCarroserieController extends AbstractController
{
    #[Route('/reparation/carroserie', name: 'Carrosserie', methods: ['GET','POST'])]
    public function index(
    HoraireOuvertureRepository $horaireRepository,
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

        return $this->render('reparation_carroserie/index.html.twig', [
            'horaires' => $horaireRepository->findAll(),
            'formulaireform' => $formulaireform->createView()
        ]);
    }
}
