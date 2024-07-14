<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDBService;
use Illuminate\Support\Facades\Log; // Import the Log facade
class MovieController extends Controller
{
    protected $tmdbService;

    public function __construct(TMDBService $tmdbService) {
        $this->tmdbService = $tmdbService;
    }

    public function getMovieById($id = null){
    if ($id === null) {
        // Handle the case when no ID is provided
        return view('pages.details', ['movie' => null, 'message' => 'No movie ID provided']);
    }

    try {
        // Call the service method to get movie details
        $movieDetails = $this->tmdbService->getMovieDetails($id);

        // Pass movie details to the view
        return view('pages.details', ['movie' => $movieDetails]);
    } catch (\Exception $e) {
        Log::error('Error fetching movie details: ' . $e->getMessage());
        return response()->json(['error' => 'Error fetching movie details'], 500);
    }
}


    public function getPopularMovies() {
        try {
            // Call the service method to get popular movies
            $popularMovies = $this->tmdbService->getPopularMovies();
            return view('pages.index2', ['movies' => $popularMovies]); // Adjust view name as needed
        } catch (\Exception $e) {
            Log::error('Error fetching popular movies: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
