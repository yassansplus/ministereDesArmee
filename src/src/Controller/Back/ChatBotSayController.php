<?php

namespace App\Controller\Back;

use App\Entity\ChatBotSay;
use App\Form\ChatBotSayType;
use App\Repository\ChatBotSayRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chatbot")
 */
class ChatBotSayController extends AbstractController
{
    /**
     * @Route("/", name="chat_bot_say_index", methods={"GET"})
     */
    public function index(ChatBotSayRepository $chatBotSayRepository): Response
    {
        return $this->render('chat_bot_say/index.html.twig', [
            'chat_bot_says' => $chatBotSayRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="chat_bot_say_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $chatBotSay = new ChatBotSay();
        $form = $this->createForm(ChatBotSayType::class, $chatBotSay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($chatBotSay);
            $entityManager->flush();

            return $this->redirectToRoute('chat_bot_say_index');
        }

        return $this->render('chat_bot_say/new.html.twig', [
            'chat_bot_say' => $chatBotSay,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chat_bot_say_show", methods={"GET"})
     */
    public function show(ChatBotSay $chatBotSay): Response
    {
        return $this->render('chat_bot_say/show.html.twig', [
            'chat_bot_say' => $chatBotSay,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="chat_bot_say_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ChatBotSay $chatBotSay): Response
    {
        $form = $this->createForm(ChatBotSayType::class, $chatBotSay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('chat_bot_say_index');
        }

        return $this->render('chat_bot_say/edit.html.twig', [
            'chat_bot_say' => $chatBotSay,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="chat_bot_say_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ChatBotSay $chatBotSay): Response
    {
        if ($this->isCsrfTokenValid('delete' . $chatBotSay->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($chatBotSay);
            $entityManager->flush();
        }

        return $this->redirectToRoute('chat_bot_say_index');
    }
}
