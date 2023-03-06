<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookController extends AbstractController
{
   
    #[Route('/api/books', name: 'app_api_books', methods: ['GET'])]
    /**
     * Permet de retourner la liste des livres
     *
     * @return JsonResponse
     */
    public function index(BookRepository $bookRepository, SerializerInterface $serializerInterface ): JsonResponse
    {
        $books = $bookRepository->findAll();
        // Sérialisation des données
        $jsonBooks = $serializerInterface->serialize($books, 'json');
        return new JsonResponse($jsonBooks, Response::HTTP_OK, [], true);
    }
}
