<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;



class UserController extends AbstractController
{
    #[Route('/user/mesInformations', name: 'mesInfos')]
    public function mesInformations(): Response
    {

        $user = $this->getUser();

        $employe = $user->getEmploye();

        $contrats = $employe->getContrats();

        return $this->render('user/mesInfo.html.twig', [
            'user' => $user,
            'employe' => $employe,
            'contrats' => $contrats,
        ]);
    }
}
