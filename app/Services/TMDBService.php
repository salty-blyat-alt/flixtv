<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // Import the Log facade
class TMDBService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct() {
        $this->apiKey = env("TMDB_API_KEY"); // Accessing the environment variable
        $this->baseUrl = 'https://api.themoviedb.org/3';
    }

    public function getTopRated() {
        $url = $this->baseUrl . "/movie/top_rated?api_key=" . $this->apiKey . "&language=en-US&page=1";
        $response = Http::withOptions(['verify' => false])->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Unable to fetch top-rated movies from TMDB service: ' . $response->body());
    }




    public function getDiscoverMovies($selectedGenre = '') {
        // Log if no genre is selected
        if (!$selectedGenre) {
        }

        $url = $this->baseUrl . "/discover/movie?include_adult=false&include_video=false&language=en-US&page=1&sort_by=popularity.desc&api_key=" . $this->apiKey;

        // Add genre filtering if a selected genre is provided
        if ($selectedGenre) {
            $url .= "&with_genres=" . $selectedGenre;
        }


        // Sending a GET request to the TMDB API with verification disabled
        $response = Http::withOptions(['verify' => false])->get($url);

        // Checking if the response is successful
        if ($response->successful()) {
            // Returning the JSON response
            return $response->json();
        }

        throw new \Exception('Unable to fetch discovered movies from TMDB service: ' . $response->body());
    }




    public function getMovieDetails($id) {
        if (!$id || $id < 0) {
            throw new \InvalidArgumentException('Invalid movie ID provided');
        }

        $url = $this->baseUrl . "/movie/{$id}?api_key=" . $this->apiKey;
        $response = Http::withOptions(['verify' => false])->get($url);

        if ($response->successful()) {
            $movieDetails = $response->json();

            // Fetch movie certification (rating)
            $certification = $this->getMovieCertification($id);

            // Add certification to the movie details array
            $movieDetails['certification'] = $certification;

            return $movieDetails;
        }

        throw new \Exception('Unable to fetch data from TMDB service: ' . $response->body());
    }

    private function getMovieCertification($id) {
        if (!$id || $id <0) return "movie certificate id no have";
        $url = $this->baseUrl . "/movie/{$id}/release_dates?api_key=" . $this->apiKey;
        $response = Http::withOptions(['verify' => false])->get($url);
        if ($response->successful()) {
            $releaseData = $response->json();

            // Find the certification for the primary country (e.g., US)
            foreach ($releaseData['results'] as $result) {
                if ($result['iso_3166_1'] == 'US') {
                    foreach ($result['release_dates'] as $release) {
                        if ($release['type'] == 3) {
                            return $release['certification'];
                        }
                    }
                }
            }
        }
        return null; // Return null if certification not found or request fails
    }

    public function getPopularMovies() {
        $url = $this->baseUrl . "/movie/popular?api_key=" . $this->apiKey . "&language=en-US&page=1";
        $response = Http::withOptions(['verify' => false])->get($url);

        if ($response->successful()) {
            return $response->json();
        }
        throw new \Exception('Unable to fetch popular movies from TMDB service: ' . $response->body());
    }
}
