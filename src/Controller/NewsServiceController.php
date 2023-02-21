<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsServiceController extends AbstractController
{
    

    #[Route('/news/service', name: 'app_news_service')]
    public function index(): Response
    {
        return $this->render('news_service/index.html.twig', [
            'controller_name' => 'NewsServiceController',
        ]);
    }
}
