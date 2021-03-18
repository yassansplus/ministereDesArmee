<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function annuaire(): Response
    {

        $foundContacts = [
            [
                'photo' => 'photohomme.png',
                'name' => 'Olivier Gil',
                'phone' => '0223444653',
                'email' => 'olivier1.gil@intrades.gouv.fr'
            ],
            [
                'photo' => 'photofemme.png',
                'name' => 'Silvie Moulac',
                'phone' => '0223444653',
                'email' => 'olivier1.gil@intrades.gouv.fr'
            ],
            [
                'photo' => 'photohomme.png',
                'name' => 'Olivier Gil',
                'phone' => '0223444653',
                'email' => 'olivier1.gil@intrades.gouv.fr'
            ],
            [
                'photo' => 'photofemme.png',
                'name' => 'Silvie Moulac',
                'phone' => '0223444653',
                'email' => 'olivier1.gil@intrades.gouv.fr'
            ],
            [
                'photo' => 'photofemme.png',
                'name' => 'Silvie Moulac',
                'phone' => '0223444653',
                'email' => 'olivier1.gil@intrades.gouv.fr'
            ],

        ];

        return $this->render('front/annuaire.html.twig', [
            'contacts' => $foundContacts,
            'cities' => [
                'Rennes',
                'Bourges',
                'Angers',
                'Tours',
                'Cherbourg',
                '...'
            ]
        ]);
    }
}
