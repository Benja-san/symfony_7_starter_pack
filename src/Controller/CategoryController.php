<?php

namespace App\Controller;

use App\Entity\Category;
use App\Service\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/categories', name: 'app_category_')]
class CategoryController extends AbstractController
{

    public function __construct(
        private CategoryService $categoryService,
    )
    {
        
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $categories = $this->categoryService->getCategories();
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/{slug}', name: 'show')]
    public function show(Category $category): Response
    {
        return $this->render('category/show.html.twig', [
            'category' => $category,
        ]);
    }
}
