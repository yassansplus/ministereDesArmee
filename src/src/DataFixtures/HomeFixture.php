<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HomeFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $home = new Home();
        $home->setMainTitle("À la recherche d'une formation");
        $home->setActu("Actualités");
        $home->setActuLeft("Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid cul");
        $home->setActuRight('Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid cul');
        $home->setBlueBlockTitle("Nos différents dispositifs de formation");
        $home->setPicto('<p><img alt="Icone chapeau blanc" src="http://localhost:8080/uploads/chapeau_blanc.png"/></p>');
        $home->setSubTitleBlueBlock("CPF, CSP, Préparation aux concours, etc");
        $home->setSecondBlueTitle('Un grand choix de formation');
        $home->setSubContent('<p>4000formation</p>');
        $home->setThirdTitleBlock('Je souhaite devenir formateur');
        $home->setThirdTextBlock('Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid cul');
        $home->setLastBlueTitle("Annuaire");
        $home->setLastPicto('<p><img alt="icone annuaire blanc" src="http://localhost:8080/uploads/annuaire_blanc.png"/></p>');
        $home->setUseThisVersion(true);
        $manager->persist($home);
        $manager->flush();
    }
}
