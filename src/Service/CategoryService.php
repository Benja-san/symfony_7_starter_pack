<?php

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;

class CategoryService
{
    public function __construct(
        private CategoryRepository $categoryRepository
    )
    {
        
    }

    public function getCategories(): array
    {
        return $this->categoryRepository->findAll();
    }

    public function getCategoryBySlug(string $slug): ?Category
    {
        return $this->categoryRepository->findOneBy(['slug' => $slug]);
    }

    public function getCategoryById(int $id): ?Category
    {
        return $this->categoryRepository->findOneBy(['id' => $id]);
    }
}