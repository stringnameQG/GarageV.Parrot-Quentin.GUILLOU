<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/service')]
class ServiceController extends AbstractController
{
    #[Route('/a', name: 'create_product')]
    public function createProduct(EntityManagerInterface $entityManager): Response
    {
        $service = new Service();
        $service->setTitre('Entretien');
        $service->setContenue('Entretien');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($service);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$service->getId());
    }


    #[Route('/', name: 'app_service_index', methods: ['GET'])]
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('service/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_service_new')]
    public function new(Request $request, EntityManagerInterface $em): Response 
    {
        $service = new Service();

        $serviceform = $this->createForm(ServiceType::class, $service);
        
        $serviceform->handleRequest($request);

        if($serviceform->isSubmitted() && $serviceform->isValid())
        {

            $em->persist($service);
            $em->flush();
        }

        return $this->render('service/add.html.twig', [
            'serviceform' => $serviceform->createView() 
        ]) ;
    }

    #[Route('/{id}/edit', name: 'app_service_edit', methods: ['GET', 'POST'])]
    public function edit(Service $service, Request $request, 
    EntityManagerInterface $em): Response
    {
        
        $serviceform = $this->createForm(ServiceType::class, $service);
        
        $serviceform->handleRequest($request);

        if($serviceform->isSubmitted() && $serviceform->isValid())
        {
            $em->persist($service);
            $em->flush();
        }

        return $this->render('service/edit.html.twig', [
            'serviceform' => $serviceform->createView() 
        ]) ;
    }

    #[Route('/{id}', name: 'app_service_delete', methods: ['POST'])]
    public function delete(Request $request, Service $service, ServiceRepository $serviceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$service->getId(), $request->request->get('_token'))) {
            $serviceRepository->remove($service, true);
        }

        return $this->redirectToRoute('app_service_index', [], Response::HTTP_SEE_OTHER);
    }
}
