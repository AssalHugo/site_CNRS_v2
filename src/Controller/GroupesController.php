<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GroupesController extends AbstractController
{
    #[Route('/groupes/modifier', name: 'modifier')]
    public function index(): Response
    {
        return $this->render('groupes/modifier.html.twig', [
        ]);
    }
}
