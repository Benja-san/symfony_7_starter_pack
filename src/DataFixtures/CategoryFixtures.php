<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use App\Service\API\MoviesDatabaseApiService;
use Ausi\SlugGenerator\SlugGenerator;

class CategoryFixtures extends Fixture
{
    
    private array $categories;
    private MoviesDatabaseApiService $moviesDatabaseApiService;

    public function __construct(MoviesDatabaseApiService $moviesDatabaseApiService)
    {
        $this->moviesDatabaseApiService = $moviesDatabaseApiService;
        $this->categories = $this->moviesDatabaseApiService->getMoviesByGenre();
    }

    public function load(ObjectManager $manager): void
    {
        $slugGenerator = new SlugGenerator();
        foreach($this->categories as $category) {
            $newCategory = new Category();
            $newCategory->setName($category['name']);
            $newCategory->setSlug($slugGenerator->generate($category['name']));
            $manager->persist($newCategory);
            $this->addReference('category_' . $newCategory->getSlug(), $newCategory);
        }

        $manager->flush();
    }
}
