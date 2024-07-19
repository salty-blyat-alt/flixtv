<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // Import the Log facade
class TMDBService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct() {
        $this->apiKey = env("TMDB_API_KEY");
        $this->baseUrl = 'https://api.themoviedb.org/3';
    }
// Movie api section
    public function getTopRated() {
        $url = $this->baseUrl . "/movie/top_rated?api_key=" . $this->apiKey . "&language=en-US&page=1";
        $response = Http::withOptions(['verify' => false])->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Unable to fetch top-rated movies from TMDB service: ' . $response->body());
    }

    public function getDiscoverMovies($selectedGenre = 1, $fullPage = 0, $moviesPerPage = 20) {
        // Calculate the offset for 6 movies per "subpage"
        $subPage = ($fullPage - 1) % 3;
        $pageBase = intdiv($fullPage - 1, 3) + 1;

        $url = $this->baseUrl . "/discover/movie?include_adult=false&include_video=false&language=en-US&page=$pageBase&sort_by=popularity.desc&api_key=$this->apiKey";

        if ($selectedGenre !== '1') {
            $url .= "&with_genres=" . $selectedGenre;
        }

        $response = Http::withOptions(['verify' => false])->get($url);
        if ($response->successful()) {
            $data = $response->json();
            $movies = $data['results'];
            $startIndex = $subPage * $moviesPerPage;
            $selectedMovies = array_slice($movies, $startIndex, $moviesPerPage);

            // Add pagination data
            $totalPages = ceil(count($movies) / $moviesPerPage);
            $data['results'] = $selectedMovies;
            $data['page'] = $fullPage;
            return $data;
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

             $certification = $this->getMovieCertification($id);

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
        return null;
    }

    public function getPopularMovies() {
        $url = $this->baseUrl . "/movie/popular?api_key=".  $this->apiKey  . "&language=en-US";

        $response = Http::withOptions(['verify' => false])->get($url);

        if ($response->successful()) {
            return $response->json();
        }
        throw new \Exception('Unable to fetch popular movies from TMDB service: ' . $response->body());
    }

    public function getUpcomingMovies() {
        $url = $this->baseUrl . "/movie/upcoming?api_key=" . $this->apiKey . "&language=en-US&page=2";
        $response = Http::withOptions(['verify' => false])->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Unable to fetch top-rated movies from TMDB service: ' . $response->body());
    }

// TV show section
public function getTVshows($page = 1){
    $url = $this->baseUrl . "/discover/tv?include_adult=false&include_null_first_air_dates=false&language=en-US&page=$page&sort_by=popularity.desc&api_key=$this->apiKey";

    $response = Http::withOptions(['verify' => false])->get($url);

    if ($response->successful()) {
        return $response->json();
    }
    throw new \Exception('Unable to fetch popular movies from TMDB service: ' . $response->body());


}

}
