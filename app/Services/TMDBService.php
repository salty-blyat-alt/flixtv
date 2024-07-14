<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TMDBService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env("TMDB_API_KEY"); // Accessing the environment variable
        $this->baseUrl = 'https://api.themoviedb.org/3';
    }

    public function getMovieDetails($id)
{
    $url = $this->baseUrl . "/movie/{$id}?api_key=" . $this->apiKey;
    $response = Http::withOptions(['verify' => false])->get($url);

    if ($response->successful()) {
        $movieDetails = $response->json();

        // Fetch movie certification (rating) using another method
        $certification = $this->getMovieCertification($id);

        // If you want to fetch the runtime separately, you can also call the `getMovieRuntime` method here
        // $runtime = $this->getMovieRuntime($id);

        // Add certification to the movie details array
        $movieDetails['certification'] = $certification;

        return $movieDetails;
    }

    throw new \Exception('Unable to fetch data from TMDB service');
}

private function getMovieCertification($id)
{
    $url = $this->baseUrl . "/movie/{$id}/release_dates?api_key=" . $this->apiKey;
    $response = Http::withOptions(['verify' => false])->get($url);

    if ($response->successful()) {
        $releaseData = $response->json();

        // Find the certification for the primary country (e.g., US)
        foreach ($releaseData['results'] as $result) {
            if ($result['iso_3166_1'] == 'US') { // Adjust 'US' to your desired country code
                foreach ($result['release_dates'] as $release) {
                    if ($release['type'] == 3) { // Type 3 corresponds to certification
                        return $release['certification'];
                    }
                }
            }
        }
    }

    return null; // Return null if certification not found or request fails
}

    public function getPopularMovies()
    {
        $url = $this->baseUrl . "/movie/popular?api_key=" . $this->apiKey . "&language=en-US&page=1"; // Corrected URL
        $response = Http::withOptions(['verify' => false])->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Unable to fetch popular movies from TMDB from service');
    }
}
?>
