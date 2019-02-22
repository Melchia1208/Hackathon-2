<?php

namespace App\DataFixtures;

use App\Entity\Personnage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        function randomFloat($min, $max) {
            return $min + mt_rand() / mt_getrandmax() * ($max - $min);
        }

        for ($i = 0; $i < 10; $i++) {
            $personnage = new Personnage();
            $personnage->setNom($faker->lastName)
                ->setPrenom($faker->firstName)
                ->setLat(randomFloat(48.55,48.60))
                ->setLng(randomFloat(7.72,7.78))
                ->setVu(false)
                ->setActif(true)
                ->setProchain(null);
            $manager->persist($personnage);
        }

        $manager->flush();
    }
}
