<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;
use Ausi\SlugGenerator\SlugGenerator;

class CategoryFixtures extends Fixture
{

    public const CATEGORIES = [
        "Action",
        "Aventure",
        "Animation",
        "Comedy",
        "Drama",
        "Fantasy",
        "Horror",
        "Mystery",
        "Romance",
        "Reality TV"
    ];

    public function load(ObjectManager $manager): void
    {
        $slugGenerator = new SlugGenerator();
        foreach(self::CATEGORIES as $categoryName) {
            $category = new Category();
            $category->setName($categoryName);
            $category->setSlug($slugGenerator->generate($categoryName));
            $manager->persist($category);
            $this->addReference('category_' . $category->getSlug(), $category);
        }

        $manager->flush();
    }
}
