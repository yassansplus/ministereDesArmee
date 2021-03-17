<?php

namespace App\DataFixtures;

use App\Entity\Question;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker\Factory::create();
            $question = new Question();
            $question->setIsRoot($i == 0);
            $question->setQuestion($faker->sentence($nbWords = 7, $variableNbWords = true));
            $manager->persist($question);
        }
        $manager->flush();
    }
}
