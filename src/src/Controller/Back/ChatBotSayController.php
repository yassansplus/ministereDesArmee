<?php

namespace App\Controller\Back;

use App\Entity\ChatBotSay;
use App\Form\ChatBotSayType;
use App\Repository\ChatBotSayRepository;
use App\Repository\UserSayRepository;
use Doctrine\ORM\EntityManagerInterface;
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
     * @param Request $request
     * @param ChatBotSayRepository $chatBotSayRepository
     * @param UserSayRepository $userSayRepository
     * @return Response
     */
    public function new(Request $request, ChatBotSayRepository $chatBotSayRepository, UserSayRepository $userSayRepository, EntityManagerInterface $em): Response
    {

        // dd($request->request->get('questionParent'));
        if ($request->request->get('save')) {
            //On initialise les variable pour travailler avec des Objets
            $question = new ChatBotSay();
            $reponse = array_diff($request->request->get('reponse'), ['null']);
            $reponse = $userSayRepository->findById($reponse);
            $QuestionSuivante = array_diff($request->request->get('question'), ['null']);
            $reponse = $chatBotSayRepository->findById($reponse);

            //on applique les relation entre elle
            $question->setIsRoot(false);
            $question->setContent($request->request->get('questionParent'));

            foreach ($reponse as $key => $rep) {
                $rep->setQuestionParent($question);
                $rep->setQuestionSuivante($QuestionSuivante[$key]);
                $question->addAnswersOfUser($rep);
            }
            $em->persist($question);
            $em->flush();
            return $this->redirectToRoute('back_chat_bot_say_index');


        }
        return $this->render('chat_bot_say/new.html.twig', [
            'userSay' => $userSayRepository->findAll(),
            'chatBotSay' => $chatBotSayRepository->findAll(),
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
