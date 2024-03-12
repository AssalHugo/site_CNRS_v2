<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Contrats;


class UserController extends AbstractController
{
    #[Route('/user/mesInformations', name: 'mesInfos')]
    public function mesInformations(EntityManagerInterface $entityManager): Response
    {

        //On récupère le User connecté
        $user = $this->getUser();

        //On récupère l'employe qui est connecté
        $employe = $user->getEmploye();


        $contrats = $entityManager->getRepository(Contrats::class)

        return $this->render('user/mesInfo.html.twig', [
            'user' => $user,
            'employe' => $employe,
            'contrats' => $contrats,
        ]);
    }
}
