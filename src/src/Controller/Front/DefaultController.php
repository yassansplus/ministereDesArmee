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
        return $this->render('front/annuaire.html.twig');
    }
}
