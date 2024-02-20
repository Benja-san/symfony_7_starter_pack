<?php

namespace App\Controller\Api;

use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/api/categories', name: 'app_category_api_', format: 'json')]
class CategoryApiController extends AbstractController
{

    public function __construct(
        private CategoryService $categoryService
    )
    {
        
    }

    #[Route('/', name: 'index', methods: ['GET'])]
    public function index() : JsonResponse
    {

        $categories = $this->categoryService->getCategories();

        return $this->json($categories);
    }
}