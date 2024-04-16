<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_product')]
    public function index(HttpClientInterface $client): JsonResponse
    {
        $response = $client->request(
            'GET',
            'https://fakestoreapi.com/products'
        );

        if(200 === $response->getStatusCode()) {
            $content = $response->getContent();
            $content = $response->toArray();
        } else {
            $content = 'error';
        }

        return $this->json($content);
    }
}
