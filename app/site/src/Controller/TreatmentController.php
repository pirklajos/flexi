<?php

namespace App\Controller;

use App\Entity\Intervention;
use App\Repository\ToothRepository;
use App\Repository\TreatmentRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\InterventionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TreatmentController extends AbstractController
{
    #[Route('/treatment', name: 'app_treatment')]
    public function index(TreatmentRepository $treatmentRepo, InterventionRepository $invRepo): Response
    {

        $treatments = $treatmentRepo->findAll();
        $inv = $invRepo->findAll();

        //dd( $inv[0]->getTeeth() );

        return $this->render('treatment/index.html.twig', [
            'treatments' => $treatments,
            'inventions' => $inv
        ]);
    }

    #[Route('/save_intervetion', name: 'app_save_intervetion')]
    public function saveIntervention(EntityManagerInterface $entityManager, Request $request, TreatmentRepository $treatmentRepo, ToothRepository $toothRepo): JsonResponse
    {

        $inv = new Intervention();
        $inv->setTreatment($treatmentRepo->findOneBy(['id'=> $request->get('treatment')]));
        $teeth = $request->get('teeth');
        foreach ($request->get('teeth') as $tooth_id) {
            $inv->addTooth($toothRepo->findOneBy(['id'=>$tooth_id]));
        }
        
        $entityManager->persist($inv);
        $entityManager->flush();

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/SandBoxController.php',
        ]);
    }
}
