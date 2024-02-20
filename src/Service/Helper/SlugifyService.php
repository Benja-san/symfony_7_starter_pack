<?php

namespace App\Service\Helper;

use Ausi\SlugGenerator\SlugGenerator;

class SlugifyService
{
    private SlugGenerator $slugGenerator;

    public function __construct()
    {
        $this->slugGenerator = new SlugGenerator();
    }
    public function slugifyName(string $name): string
    {
        return $this->slugGenerator->generate($name);
    }
}