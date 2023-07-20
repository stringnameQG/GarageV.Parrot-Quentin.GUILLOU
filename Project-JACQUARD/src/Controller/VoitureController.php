<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureType;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\HoraireOuvertureRepository;
use App\Entity\FormulaireContacte;
use App\Form\FormulaireContacteType;



#[Route('/voiture')]         
class VoitureController extends AbstractController
{
    #[Route('/vente', name: 'Voiture', methods: ['GET','POST'])]
    public function vente(VoitureRepository $voitureRepository,
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

        return $this->render('voiture/vente.html.twig', [
            'horaires' => $horaireRepository->findAll(),
            'voitures' => $voitureRepository->findAll(),
            'formulaireform' => $formulaireform->createView(),
        ]);
    }

    #[Route('/{slug}', name: 'app_voiture_detail')]
    public function details(Voiture $category, VoitureRepository $productsRepository, Request $request): Response
    {
        $page = $request->query->getInt('page', 1);

        //$products = $productsRepository->findProductsPaginated($page, $category->getSlug(), 2);

        return $this->render('voiture/voitureInfo.html.twig', compact('category','products'));
    }

    #[Route('/', name: 'app_voiture_index', methods: ['GET'])]
    public function index(VoitureRepository $voitureRepository): Response
    {
        return $this->render('voiture/index.html.twig', [
            'voitures' => $voitureRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_voiture_new')]
    public function add(Request $request, EntityManagerInterface $em): Response 
    {
        $voiture = new Voiture();

        $voitureform = $this->createForm(VoitureType::class, $voiture);
        
        $voitureform->handleRequest($request);

        if($voitureform->isSubmitted() && $voitureform->isValid())
        {

            $em->persist($voiture);
            $em->flush();
        }

        return $this->render('voiture/add.html.twig', [
            'voitureform' => $voitureform->createView() 
        ]) ;
    }

/*
    #[Route('/{slug}', name: 'app_voiture_list')]
    public function list( VoitureRepository $voitureRepository, Request $request): Response
    {
        //$products = $category->getProduct();


        return $this->render('voiture/list.html.twig', 
            compact('category', 'products')
        );
    }*/


/*
    #[Route('/{id}', name: 'app_voiture_show', methods: ['GET', 'POST'])]
    public function show(Voiture $voiture,
    VoitureRepository $voitureRepository
    ): Response
    {
        return $this->render('voitureinfo/show.html.twig', [
            'voiture' => $voiture,
            'voitures' => $voitureRepository->findAll(),
        ]);
    }*/

    #[Route('/{id}/edit', name: 'app_voiture_edit', methods: ['GET', 'POST'])]
    public function edit(Voiture $voiture, Request $request, 
    EntityManagerInterface $em): Response
    {
        $voitureform = $this->createForm(VoitureType::class, $voiture);
        
        $voitureform->handleRequest($request);

        if($voitureform->isSubmitted() && $voitureform->isValid())
        {

            $em->persist($voiture);
            $em->flush();
        }

        return $this->render('voiture/edit.html.twig', [
            'voitureform' => $voitureform->createView() 
        ]) ;
    }

    #[Route('/{id}', name: 'app_voiture_delete', methods: ['POST'])]
    public function delete(Request $request, Voiture $voiture, VoitureRepository $voitureRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$voiture->getId(), $request->request->get('_token'))) {
            $voitureRepository->remove($voiture, true);
        }

        return $this->redirectToRoute('app_voiture_index', [], Response::HTTP_SEE_OTHER);
    }
}




/*

#[Route('/voiture')]
class VoitureController extends AbstractController
{
    #[Route('/', name: 'app_voiture_index', methods: ['GET'])]
    public function index(VoitureRepository $voitureRepository): Response
    {
        return $this->render('voiture/index.html.twig', [
            'voitures' => $voitureRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_voiture_new')]
    public function add(Request $request, EntityManagerInterface $em): Response 
    {
        $voiture = new Voiture();

        $voitureform = $this->createForm(VoitureType::class, $voiture);
        
        $voitureform->handleRequest($request);

        if($voitureform->isSubmitted() && $voitureform->isValid())
        {

            $em->persist($voiture);
            $em->flush();
        }

        return $this->render('voiture/add.html.twig', [
            'voitureform' => $voitureform->createView() 
        ]) ;
    }



    #[Route('/{slug}', name: 'app_voiture_list')]
    public function list(VoitureRepository $category): Response
    {
        $products = $category->getProduct();


        return $this->render('vehicule_vente/list.html.twig', 
            compact('category', 'products')
        );
    }



    #[Route('/{id}', name: 'app_voiture_show', methods: ['GET'])]
    public function show(Voiture $voiture): Response
    {
        return $this->render('voiture/show.html.twig', [
            'voiture' => $voiture,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_voiture_edit', methods: ['GET', 'POST'])]
    public function edit(Voiture $voiture, Request $request, 
    EntityManagerInterface $em): Response
    {
        $voitureform = $this->createForm(VoitureType::class, $voiture);
        
        $voitureform->handleRequest($request);

        if($voitureform->isSubmitted() && $voitureform->isValid())
        {

            $em->persist($voiture);
            $em->flush();
        }

        return $this->render('voiture/edit.html.twig', [
            'voitureform' => $voitureform->createView() 
        ]) ;
    }

    #[Route('/{id}', name: 'app_voiture_delete', methods: ['POST'])]
    public function delete(Request $request, Voiture $voiture, VoitureRepository $voitureRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$voiture->getId(), $request->request->get('_token'))) {
            $voitureRepository->remove($voiture, true);
        }

        return $this->redirectToRoute('app_voiture_index', [], Response::HTTP_SEE_OTHER);
    }
}

*/