<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/chatbot", name="chatbot_")
 */
class ChatbotController extends AbstractController
{
    /**
     * @Route("/", name="index",  methods={"GET"})
     */
    public function index(): Response
    {
        return $this->render('front/chatbot.html.twig');
    }
}
