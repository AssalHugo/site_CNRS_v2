<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Contrats;
use App\Entity\Localisations;
use Symfony\Component\HttpFoundation\Request;



class UserController extends AbstractController
{
    #[Route('/user/mesInformations', name: 'mesInfos')]
    public function mesInformations(EntityManagerInterface $entityManager): Response {

        //On récupère le User connecté
        $user = $this->getUser();

        //On récupère l'employe qui est connecté
        $employe = $user->getEmploye();

        //On récupere le dernier contrat de l'employé 
        $contrat = $entityManager->getRepository(Contrats::class)->findLastContrat($employe->getId());

        //On récupere tous les contrats de l'employe
        $contrats = $employe->getContrats();

        $localisations = $employe->getLocalisation();

        return $this->render('user/mesInfo.html.twig', [
            'user' => $user,
            'employe' => $employe,
            'contrat' => $contrat,
            'contrats' => $contrats,
            'localisations' => $localisations,
        ]);
    }

    #[Route('/user/mesInformations/removeLocalisation/{id}', name: 'removeLocalisation')]
    public function removeLocalisation(Request $request, EntityManagerInterface $entityManager, int $id): Response{

        $locaRepo = $entityManager->getRepository(Localisations::class);
        $localisation = $locaRepo->find($id);
        $entityManager->remove($localisation);
        $entityManager->flush();

        $session = $request->getSession();
        $session->getFlashBag()->add('message', 'La localisation  a été supprimé');
        $session->set('statut', 'success');

        return $this->redirect($this->generateUrl('mesInfos'));
    }

    #[Route('/user/mesInformations/addLocalisation', name: 'addLocalisation')]
    public function addLocalisation(Request $request, EntityManagerInterface $entityManager): Response{

        
    }
}
