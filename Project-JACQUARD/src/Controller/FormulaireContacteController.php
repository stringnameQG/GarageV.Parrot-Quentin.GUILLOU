<?php

namespace App\Controller;

use App\Entity\FormulaireContacte;
use App\Form\FormulaireContacteType;
use App\Repository\FormulaireContacteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/formulaireContacte')]
class FormulaireContacteController extends AbstractController
{
    #[Route('/', name: 'app_formulaireContacte_index', methods: ['GET'])]
    public function index(FormulaireContacteRepository $formulaireRepository): Response
    {
        return $this->render('formulaireContacte/index.html.twig', [
            'formulaires' => $formulaireRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_formulaireContacte_new')]
    public function new(Request $request, EntityManagerInterface $em): Response 
    {
        $formulaire = new FormulaireContacte();

        $formulaireform = $this->createForm(FormulaireContacteType::class, $formulaire);
        
        $formulaireform->handleRequest($request);

        if($formulaireform->isSubmitted() && $formulaireform->isValid())
        {

            $em->persist($formulaire);
            $em->flush();
        }

        return $this->render('formulaireContacte/add.html.twig', [
            'formulaireform' => $formulaireform->createView() 
        ]) ;
    }

    #[Route('/{id}', name: 'app_formulaireContacte_delete', methods: ['POST'])]
    public function delete(Request $request, FormulaireContacte $formulaire, FormulaireContacteRepository $formulaireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formulaire->getId(), $request->request->get('_token'))) {
            $formulaireRepository->remove($formulaire, true);
        }

        return $this->redirectToRoute('app_formulaireContacte_index', [], Response::HTTP_SEE_OTHER);
    }
}
