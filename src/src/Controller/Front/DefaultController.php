<?php

namespace App\Controller\Front;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/dispositif-de-formation", name="dispositifs_de_formation")
     */
    public function dispositifsDeFormation(): Response
    {
        return $this->render('front/dispositifs_de_formation.html.twig');
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
    public function devenirFormateurInterne(): Response
    {
        return $this->render('front/devenir_formateur_interne.html.twig');
    }

    /**
     * @Route("/annuaire", name="annuaire")
     */
    public function annuaire(ContactRepository $repo, Request $request): Response
    {
        $cities = [
            'Rennes',
            'Bourges',
            'Angers',
            'Tours',
            'Cherbourg',
            '...'
        ];
        $contacts = [];

        // If any search, do the search
        if ($request->query->has('formateurName')) {
            $contacts = $repo->findLikeName($request->query->get('formateurName'));
        } else {
            $contacts = $repo->findAll();
        }

        return $this->render('front/annuaire.html.twig', [
            'contacts' => $contacts,
            'cities' => $cities
        ]);
    }
}
