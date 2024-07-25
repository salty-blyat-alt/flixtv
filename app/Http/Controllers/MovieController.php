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
            $tvShows = $this->tmdbService->getTVshows();
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
            'tvShows' => $tvShows,
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
            $videoEmbedResponse = $this->embedService->getMovieVideoById($id);

            // Check if the response is valid HTML
            $videoEmbed = $videoEmbedResponse->getContent(); // Get the HTML content

            // Pass movie details and video embed HTML to the view
            return view('pages.details', ['movie' => $movieDetails, 'videoEmbed' => $videoEmbed]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error getMovieById from movie controller'], 500);
        }
    }


    public function getTvShow(Request $request, $id = 1) {
        $season = $request->input('season', 1);
        $episode = $request->input('episode', 1);

        try {
        // Call the service method to get movie details
        $tvDetail = $this->tmdbService->getTvShowDetail($id);
        $episodes = $this->tmdbService->getEpisodeBySeason($id, $season);

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'tvDetail' => $tvDetail,
                'season' => $season,
                'episode' => $episode,
                'episodes' => $episodes
            ]);
        } else {
            // Return the view if not an AJAX request
            return view('pages.details', [
                'tvDetail' => $tvDetail,
                'season' => $season,
                'episode' => $episode,
                'episodes' => $episodes
            ]);
        }
    } catch (\Exception $e) { return response()->json(['error' => 'Error getTvShow from movie controller'], 500); } }
}
