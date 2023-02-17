<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $downloadedNews = new DownloadedNews();
            $downloadedNews->setTitle($faker->title);
            $downloadedNews->setShortDescription($faker->lastName);
            $downloadedNews->setPicturePath();
            $manager->persist($customer);
        }

        $manager->flush();
    }
}
