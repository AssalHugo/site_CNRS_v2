<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Contrats;
use App\Entity\Localisations;
use Symfony\Component\HttpFoundation\Request;
use App\Form\LocalisationType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class UserController extends AbstractController
{
    #[Route('/user/mesInformations', name: 'mesInfos')]
    public function mesInformations(Request $request, EntityManagerInterface $entityManager): Response {

        //On récupère le User connecté
        $user = $this->getUser();

        //On récupère l'employe qui est connecté
        $employe = $user->getEmploye();

        //On récupere le dernier contrat de l'employé 
        $contrat = $entityManager->getRepository(Contrats::class)->findLastContrat($employe->getId());

        //On récupere tous les contrats de l'employe
        $contrats = $employe->getContrats();

        $localisations = $employe->getLocalisation();

        //On appele la fonction plus bas qui va créer le formulaire pour ajouter une localisation
        $formLocalisation = $this->addLocalisation($request, $entityManager);

        //On renvoie vers le template accompagné de certaines valeurs
        return $this->render('user/mesInfo.html.twig', [
            'user' => $user,
            'employe' => $employe,
            'contrat' => $contrat,
            'contrats' => $contrats,
            'localisations' => $localisations,
            'formLocalisation' => $formLocalisation->createView(),
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

    private function addLocalisation(Request $request, EntityManagerInterface $entityManager): mixed{

        $localisation = new Localisations();
        $formLocalisation = $this->createForm(LocalisationType::class,$localisation);

        $formLocalisation->add('creer', SubmitType::class, ['label' => '+', 'validation_groups' => ['registration','all']]);

        $formLocalisation->handleRequest($request);

        if($request->isMethod('POST') && $formLocalisation->isValid()){


            $employe->addLocalisation($localisation);

            $entityManager->persist($localisation);

            $entityManager->flush();

            $session = $request->getSession();
            $session->getFlashBag()->add('message', 'Une nouvelle localisation a été ajouté');
            $session->set('statut', 'success');

            return $this->redirect($this->generateUrl('mesInfos'));
        }

        return $formLocalisation;
    }
}
