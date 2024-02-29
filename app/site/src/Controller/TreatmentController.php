<?php

namespace App\Controller;

use App\Repository\TreatmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TreatmentController extends AbstractController
{
    #[Route('/treatment', name: 'app_treatment')]
    public function index(TreatmentRepository $treatmentRepo): Response
    {

        $treatments = $treatmentRepo->findAll();

        return $this->render('treatment/index.html.twig', [
            'treatments' => $treatments,
        ]);
    }
}
