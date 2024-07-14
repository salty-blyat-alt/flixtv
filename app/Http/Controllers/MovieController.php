<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDBService;
use App\Services\EmbedService;
use Illuminate\Support\Facades\Log;



class MovieController extends Controller
{
    protected $tmdbService;
    protected $embedService;

    public function __construct(TMDBService $tmdbService, EmbedService $embedService) {
        $this->tmdbService = $tmdbService;
        $this->embedService = $embedService;
    }

    public function getMovieById($id = null) {
        if (!$id || $id < 0)  return view('pages.details', ['movie' => null, 'message' => 'No movie ID provided']);

        try {
            // Call the service method to get movie details
            $movieDetails = $this->tmdbService->getMovieDetails($id);

            // Call the service method to proxy the video embed HTML
            $videoEmbedResponse = $this->embedService->proxyVideo($id);

            // Check if the response is valid HTML
            $videoEmbed = $videoEmbedResponse->getContent(); // Get the HTML content

            // Pass movie details and video embed HTML to the view
            return view('pages.details', ['movie' => $movieDetails, 'videoEmbed' => $videoEmbed]);
        } catch (\Exception $e) {
            Log::error('Error fetching movie details or video embed: ' . $e->getMessage());
            return response()->json(['error' => 'Error fetching movie details or video embed'], 500);
        }
    }


    public function populateHomePageMovie(Request $request) {
        $selectedGenre = $request->input('genre');
         try {
            // Call the service method to get popular movies
            $popularMovies = $this->tmdbService->getPopularMovies();

            // If a genre ID is provided, get discover movies by that genre
            $discoverMovies = $this->tmdbService->getDiscoverMovies($selectedGenre);

            // Pass the data to the view
            return view('pages.index2', ['popularMovies' => $popularMovies, 'discoverMovies' => $discoverMovies]);
        } catch (\Exception $e) {
            Log::error('Error fetching movies: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
