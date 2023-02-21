<?php

namespace App\DataFixtures;

use App\Entity\NewsService;
use App\Entity\DownloadedNews;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\DBAL\Driver\IBMDB2\Exception\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        // $faker = Factory::create();
        $date1 = date('2023-02-17');
        $date2 = date('2023-02-18');
        $dataArray = [$date1,$date2];
        for ($i = 0; $i < 10000; $i++) {
            $newsService = new NewsService();
            $newsService->setTitle("Title ".$i);
            $newsService->setDescription("Description ".$i);
            $newsService->setNewsDate( date('Y-m-d',strtotime($dataArray[rand(0,1)])) );
            $newsService->setDownloadStatus(0);
            $manager->persist($newsService);
        }

        $manager->flush();
    }
}
