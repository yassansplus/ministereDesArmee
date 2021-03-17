<?php

namespace App\DataFixtures;

use App\Entity\Answer;
use App\Entity\ChatBotSay;
use App\Entity\Question;
use App\Entity\UserSay;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AnswerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $chatBotSay = $manager->getRepository(ChatBotSay::class)->findAll();
        $userSay = $manager->getRepository(UserSay::class)->findAll();
        $userKey = 0;
        foreach ($chatBotSay as $key => $chatBot) {
            echo $userKey;
            $chatBot->addAnswersOfUser($userSay[$userKey]);
            $userSay[$userKey]->setParentQuestion($chatBot);
            $chatBot->addAnswersOfUser($userSay[$userKey + 1]);
            $userSay[$userKey + 1]->setParentQuestion($chatBot);
            $userKey = $userKey + 2;
        }
        foreach ($userSay as $answer) {
            $rand_keys = array_rand($chatBotSay, 2);
            $answer->addChatBotSay($chatBotSay[$rand_keys[0]]);
            $answer->addChatBotSay($chatBotSay[$rand_keys[1]]);
        }

        $manager->flush();
    }


    public function getDependencies()
    {
        return [
            AppFixtures::class,
        ];
    }
}
