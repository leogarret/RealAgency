<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixture extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $rooms = $faker->numberBetween(3, 30);

        for ($i = 0; $i < 100; $i++) {
            $property = new Property();
            $property
                ->setTitle($faker->word(3, true))
                ->setDescription($faker->sentences(3, true))
                ->setSurface($faker->numberBetween(10, 700))
                ->setRooms($rooms)
                ->setBedrooms($faker->numberBetween(1, intval($rooms / 2)))
                ->setFloor($faker->numberBetween(0, 15))
                ->setPrice(round($faker->numberBetween(70000, 4000000), -2))
                ->setHeat($faker->numberBetween(0, count(Property::HEAT) - 1))
                ->setCity($faker->city)
                ->setAdress($faker->address)
                ->setZipCode($faker->postcode)
                ->setSold(false);
            $manager->persist($property); 
        }
        $manager->flush();
    }
}
