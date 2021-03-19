<?php

namespace App\DataFixtures;

use App\Entity\ChatBotSay;
use App\Entity\Faq;
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
            $chatBotSay->setIsRoot($i == 0);

            $manager->persist($chatBotSay);
        }
        for ($i = 0; $i < 30; $i++) {
            $userSay = new UserSay();
            $userSay->setContent('mes réponse' . $i);

            $manager->persist($userSay);
        }
        for ($i = 0; $i < 5; $i++) {
            $faker = Faker\Factory::create();

            $faq = new Faq();
            $faq->setQuestion($faker->words(8, true));
            $faq->setAnswer($faker->words(100, true));
            $manager->persist($faq);
        }


        $manager->flush();
    }
}
