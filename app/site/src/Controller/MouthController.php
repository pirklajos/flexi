<?php

namespace App\Controller;

use App\Repository\ToothRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MouthController extends AbstractController
{
    #[Route('/mouth', name: 'app_mouth')]
    public function index(): Response
    {
        return $this->render('Mouth/index.html.twig');
    }

    

    #[Route('/teethList', name: 'app_teethList')]
    public function listTeeth(ToothRepository $toothRepo): Response
    {
        $teethList = $toothRepo->findAll();
        return $this->render('Mouth/teethList.html.twig', [
            'teethList' => $teethList,
        ]);
    }
}
