<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

final class BookController extends AbstractController
{
    private BookRepository $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    #[Route('/books', name: 'book_list', methods: [Request::METHOD_GET])]
    public function list(): Response
    {
        return $this->render('book/list.html.twig', [
            'books' => $this->bookRepository->findAll(),
        ]);
    }

    #[Route('/books/search', name: 'book_search', methods: [Request::METHOD_GET], format: 'json')]
    public function search(Request $request): JsonResponse
    {
        if (null !== $request->get('q') && strlen($request->get('q')) >= 3) {
            if ('rien' === $request->get('q')) {
                throw new NotFoundHttpException('Aucun résultat.');
            }

            return $this->json([
                'books' => $this->bookRepository->search(),
            ]);
        }

        throw new BadRequestHttpException('Une erreur est survenue.');
    }
}
