<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        // return $this->json([
        //     'message' => 'Welcome Samuel to Symfony!',
        //     'path' => 'src/Controller/MainController.php',
        // ]);
        // return new Response('<h1>Welcome to Symfony tutorials</h1>');
        return $this->redirect($this->generateUrl('app_downloaded_news_index'));
    }

    #[Route('/custom/{name?}', name: 'custom')]
    public function custom(Request $request)
    {
        // dump($request->get('name'));
        $name = $request->get('name');
        // return new Response("<h1>Welcome to custom page $name</h1>");
        return $this->render('index.html.twig',[
            'name' => $name
        ]);

    }
}
