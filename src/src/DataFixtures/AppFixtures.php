<?php

namespace App\DataFixtures;

use App\Entity\ChatBotSay;
use App\Entity\Question;
use App\Entity\UserSay;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < 10; $i++) {
            $chatBotSay = new ChatBotSay();
            $chatBotSay->setContent('Ma question' . $i);

            $manager->persist($chatBotSay);
        }
        for ($i = 0; $i < 30; $i++) {
            $userSay = new UserSay();
            $faker = Faker\Factory::create();
            $userSay->setContent('mes réponse' . $i);

            $manager->persist($userSay);
        }
        $manager->flush();
    }
}
