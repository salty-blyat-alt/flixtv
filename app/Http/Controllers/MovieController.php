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


    public function populateHomePageMovie(Request $request) {
        $selectedGenre =$request->input('genre', '1');
        $page = $request->input('page', 1);
         try {
            $popularMovies = $this->tmdbService->getPopularMovies();

            // page -1 because not to make it look same as the hero section
            $discoverMovies = $this->tmdbService->getDiscoverMovies($selectedGenre, $page-1,$moviesPerPage = 6);

            if ($request->ajax()) {
                return response()->json([
                    'discoverMovies' => $discoverMovies['results'],
                    'currentPage' => $page,
                    'selectedGenre' => $selectedGenre
                ]);}

            return view('pages.index2', [
            'popularMovies' => $popularMovies,
            'discoverMovies' => $discoverMovies,
            'selectedGenre' => $selectedGenre,
            'currentPage' => $page ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function populateCatalogPage() {
         try {

            $topRates = $this->tmdbService->getTopRated();
            $upComingMovies = $this->tmdbService->getUpcomingMovies();

            return view('pages.catalog', [
                'topRates' => $topRates,
                'upComingMovies' => $upComingMovies
        ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function populateCategoryPage(Request $request)
    {
        $page = $request->input('page', 1);
        $selectedGenre = $request->input('genre', '1');
        try {
            $discoverMovies = $this->tmdbService->getDiscoverMovies($selectedGenre, $page);

            if ($request->ajax()) {
                return response()->json([
                    'movies' => $discoverMovies['results'],
                    'lastPage' => $discoverMovies['total_pages']
                ]);
            }

            return view('pages.category', [
                'discoverMovies' => $discoverMovies,
                'selectedGenre' => $selectedGenre,
                'currentPage' => $page
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function getMovieById($id = 1) {
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
            return response()->json(['error' => 'Error fetching movie details or video embed'], 500);
        }
    }
}
