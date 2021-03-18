<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $contact = new Contact();
            $contact->setName($faker->firstName . ' ' . $faker->lastName);
            $contact->setEmail($faker->email);
            $contact->setPhone('0223444653');
            $contact->setPhotoUrl($faker->randomDigit % 2 ? 'photofemme.png' : 'photohomme.png');

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
