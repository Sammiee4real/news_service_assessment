<?php

namespace App\Controller;

use App\Entity\DownloadedNews;
use App\Form\DownloadedNewsType;
use App\Repository\DownloadedNewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/downloaded/news')]
class DownloadedNewsController extends AbstractController
{
    #[Route('/', name: 'app_downloaded_news_index', methods: ['GET'])]
    public function index(DownloadedNewsRepository $downloadedNewsRepository): Response
    {
        return $this->render('downloaded_news/index.html.twig', [
            'downloaded_news' => $downloadedNewsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_downloaded_news_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DownloadedNewsRepository $downloadedNewsRepository): Response
    {
        $downloadedNews = new DownloadedNews();
        $form = $this->createForm(DownloadedNewsType::class, $downloadedNews);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $downloadedNewsRepository->save($downloadedNews, true);

            return $this->redirectToRoute('app_downloaded_news_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('downloaded_news/new.html.twig', [
            'downloaded_news' => $downloadedNews,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_downloaded_news_show', methods: ['GET'])]
    public function show(DownloadedNews $downloadedNews): Response
    {
        return $this->render('downloaded_news/show.html.twig', [
            'downloaded_news' => $downloadedNews,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_downloaded_news_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DownloadedNews $downloadedNews, DownloadedNewsRepository $downloadedNewsRepository): Response
    {
        $form = $this->createForm(DownloadedNewsType::class, $downloadedNews);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $downloadedNewsRepository->save($downloadedNews, true);

            return $this->redirectToRoute('app_downloaded_news_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('downloaded_news/edit.html.twig', [
            'downloaded_news' => $downloadedNews,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_downloaded_news_delete', methods: ['POST'])]
    public function delete(Request $request, DownloadedNews $downloadedNews, DownloadedNewsRepository $downloadedNewsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$downloadedNews->getId(), $request->request->get('_token'))) {
            $downloadedNewsRepository->remove($downloadedNews, true);
        }

        return $this->redirectToRoute('app_downloaded_news_index', [], Response::HTTP_SEE_OTHER);
    }
}
