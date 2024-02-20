<?php

namespace App\Service\API;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class MoviesDatabaseApiService
{

    private string $url = 'https://api.themoviedb.org/3/';
    private string $language = 'en';
    private string $apiKey;

    public function __construct(
        private HttpClientInterface $client,
        $tmdbApiKey
    )
    {
        $this->apiKey = $tmdbApiKey;
    }

    public function getMoviesByGenre(): array
    {

        $completeUrl = $this->url . 'genre/movie/list?language=' . $this->language;            
        $response = $this->client->request('GET', $completeUrl, [
            'headers' => [
                'Authorization' => $this->apiKey,
                'accept' => 'application/json',
            ],
        ]);

        $data = $response->toArray();
        return $data['genres'];
    }
}