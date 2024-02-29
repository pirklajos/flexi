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
    public function index(TreatmentRepository $treatmentRepo): Response
    {
        $treatments = $treatmentRepo->findAll();

        return $this->render('treatment/index.html.twig', [
            'treatments' => $treatments
        ]);
    }

    #[Route('/list_inventions', name: 'app_list_inventions')]
    public function listInventions(InterventionRepository $invRepo): Response
    {
        $inv = $invRepo->findAll();

        return $this->render('treatment/inventions.html.twig', [
            'inventions' => $inv
        ]);
    }

    #[Route('/save_intervetion', name: 'app_save_intervetion')]
    public function saveIntervention(EntityManagerInterface $entityManager, Request $request, TreatmentRepository $treatmentRepo, 
        ToothRepository $toothRepo, InterventionRepository $interventionRepo): JsonResponse
    {

        $inv = $interventionRepo->findOneBy(['treatment'=> $treatmentRepo->findOneBy(['id'=> $request->get('treatment')])]);
        
        if( $inv == null) {
            $inv = new Intervention();
        }

        $inv->setTreatment($treatmentRepo->findOneBy(['id'=> $request->get('treatment')]));
        $teeth = $request->get('teeth');
        $inv->clearTooth();
        if($request->get('teeth') != null)
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

    #[Route('/listTeethByInventions', name: 'app_list_inventions_by_treatment')]
    public function listInventionsByTreatment(Request $request, InterventionRepository $invRepo, TreatmentRepository $treatmentRepo): JsonResponse
    {
        $inv = $invRepo->findOneBy(['treatment' => $treatmentRepo->findOneBy(['id'=> $request->get('treatment_id')])]);
        //dd( $request->get('treatment_id') );
        return $this->json( $inv->getTeeth() );
    }

    #[Route('/deleteInvention', name: 'app_delete_invention')]
    public function deleteInvention(Request $request, InterventionRepository $invRepo, EntityManagerInterface $em): JsonResponse
    {
        $sql = "delete from intervention where treatment_id = ".$request->get('id');
        

        return $this->json([
            'success' => $em->getConnection()->exec($sql),
            'sql' => $sql,
        ]);
    }
}
