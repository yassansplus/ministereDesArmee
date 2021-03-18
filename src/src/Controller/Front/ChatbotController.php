<?php

namespace App\Controller\Front;

use App\Entity\ChatBotSay;
use App\Entity\UserSay;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/chatbot", name="chatbot_")
 */
class ChatbotController extends AbstractController
{
    /**
     * @Route("/", name="index",  methods={"GET"})
     */
    public function index(EntityManagerInterface $entityManager): Response
    {
        $firstInteraction = $entityManager->getRepository(ChatBotSay::class)->findOneBy(['isRoot' => true]);
        return $this->render('front/chatbot.html.twig',
            ['firstInteraction' => $firstInteraction]
        );
    }

    /**
     * @Route("/{id}", name="getAnswer",  methods={"GET"}, requirements={"id":"\d+"})
     * @param ChatBotSay $chatBotSay
     * @return JsonResponse
     */
    public function getAnswer(UserSay $userSay): JsonResponse
    {

        $normalizer = new ObjectNormalizer();
        $encoder = new JsonEncoder();
        $serializer = new Serializer([$normalizer], [$encoder]);
        if ($userSay->getNextQuestion() != null) {
            $nextQuestion = [$userSay->getNextQuestion()->getContent() => []];
            foreach ($userSay->getNextQuestion()->getAnswersOfUser() as $answer) {
                $nextQuestion[key($nextQuestion)][$answer->getId()] = $answer->getContent();
            }
        } else {
            $nextQuestion = ['Je vous remercie pour ces questions. 🙂' => []];
        }


        return new JsonResponse($serializer->serialize($nextQuestion, 'json'));
    }
}
