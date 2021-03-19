<?php

namespace App\Controller\Back;

use App\Entity\DevenirFormateur;
use App\Form\DevenirFormateurType;
use App\Repository\DevenirFormateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/devenir-formateur", name="formateur_")
 */
class DevenirFormateurController extends AbstractController
{
    /**
     * @Route("/", name="devenir_formateur_index", methods={"GET"})
     */
    public function index(DevenirFormateurRepository $devenirFormateurRepository): Response
    {
        return $this->render('devenir_formateur/index.html.twig', [
            'devenir_formateurs' => $devenirFormateurRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="devenir_formateur_new", methods={"GET","POST"})
     */
    public function new(Request $request, DevenirFormateurRepository $devenirFormateurRepository): Response
    {

        $devenirFormateur = new DevenirFormateur();
        $form = $this->createForm(DevenirFormateurType::class, $devenirFormateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $currentVersion = $devenirFormateurRepository->findOneBy(['useThisVersion' => true]);
            if ($currentVersion) {
                $currentVersion->setUseThisVersion(false);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($devenirFormateur);
            $entityManager->flush();

            return $this->redirectToRoute('back_formateur_devenir_formateur_index');
        }

        return $this->render('devenir_formateur/new.html.twig', [
            'devenir_formateur' => $devenirFormateur,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="devenir_formateur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, DevenirFormateur $devenirFormateur, DevenirFormateurRepository $devenirFormateurRepository): Response
    {


        $form = $this->createForm(DevenirFormateurType::class, $devenirFormateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $currentVersion = $devenirFormateurRepository->findOneBy(['useThisVersion' => true]);
            if ($currentVersion) {
                $currentVersion->setUseThisVersion(false);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('back_formateur_devenir_formateur_index');
        }

        return $this->render('devenir_formateur/edit.html.twig', [
            'devenir_formateur' => $devenirFormateur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="devenir_formateur_delete", methods={"DELETE"})
     */
    public function delete(Request $request, DevenirFormateur $devenirFormateur): Response
    {
        if ($this->isCsrfTokenValid('delete' . $devenirFormateur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($devenirFormateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('back_formateur_devenir_formateur_index');
    }
}
