<?php

namespace App\Controller\Front;

use App\Repository\ContactRepository;
use App\Repository\DevenirFormateurRepository;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(HomeRepository $homeRepository): Response
    {

        return $this->render('default/index.html.twig', [
            'homeContent' => $homeRepository->findOneBy(['useThisVersion' => true]),
        ]);
    }

    /**
     * @Route("/catalogue-de-formation", name="catalogue_de_formation")
     */
    public function catalogueDeFormation(): Response
    {
        return $this->render('front/catalogue_de_formation.html.twig');
    }

    /**
     * @Route("/devenir-formateur-interne", name="devenir_formateur_interne")
     */
    public function devenirFormateurInterne(DevenirFormateurRepository $devenirFormateurRepository): Response
    {

        return $this->render('front/devenir_formateur_interne.html.twig', [
            'pageContent' => $devenirFormateurRepository->findOneBy(['useThisVersion' => true])
        ]);
    }

    /**
     * @Route("/annuaire", name="annuaire")
     */
    public function annuaire(ContactRepository $contactRepo, Request $request): Response
    {
        $cities = [
            'Rennes',
            'Bourges',
            'Angers',
            'Tours',
            'Cherbourg',
            '...'
        ];
        $fomateurNameResearch = '';

        // If any search, do the search
        if ($request->query->has('formateurName')) {
            $contacts = $contactRepo->findLikeName($request->query->get('formateurName'));
            $fomateurNameResearch = $request->query->get('formateurName');
        } else {
            $contacts = $contactRepo->findAll();
        }

        return $this->render('front/annuaire.html.twig', [
            'contacts' => $contacts,
            'cities' => $cities,
            'fomateurNameResearch' => $fomateurNameResearch
        ]);
    }
}
