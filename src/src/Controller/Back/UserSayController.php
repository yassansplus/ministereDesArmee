<?php

namespace App\Controller\Back;

use App\Entity\UserSay;
use App\Form\UserSayType;
use App\Repository\UserSayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/usersay")
 */
class UserSayController extends AbstractController
{
    /**
     * @Route("/", name="user_say_index", methods={"GET"})
     */
    public function index(UserSayRepository $userSayRepository): Response
    {
        return $this->render('user_say/index.html.twig', [
            'user_says' => $userSayRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_say_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userSay = new UserSay();
        $form = $this->createForm(UserSayType::class, $userSay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userSay);
            $entityManager->flush();

            return $this->redirectToRoute('user_say_index');
        }

        return $this->render('user_say/new.html.twig', [
            'user_say' => $userSay,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_say_show", methods={"GET"})
     */
    public function show(UserSay $userSay): Response
    {
        return $this->render('user_say/show.html.twig', [
            'user_say' => $userSay,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_say_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserSay $userSay): Response
    {
        $form = $this->createForm(UserSayType::class, $userSay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_say_index');
        }

        return $this->render('user_say/edit.html.twig', [
            'user_say' => $userSay,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_say_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserSay $userSay): Response
    {
        if ($this->isCsrfTokenValid('delete' . $userSay->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userSay);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_say_index');
    }
}
