<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EmbedService
{
    protected $movieUrl;
    protected $tvUrl;

    public function __construct()
    {
        $this->movieUrl = 'https://2embed.cc/embed/';
        $this->tvUrl = 'https://2embed.cc/embedtv/';
    }

    public function getMovieVideoById($id)
    {
        $url = $this->movieUrl . $id;

        try {
            // Make the HTTP GET request with SSL verification disabled
            $response = Http::withOptions(['verify' => false])->get($url);

            if ($response->successful()) {
                return response($response->body(), 200)->header('Content-Type', 'text/html');
            }

            return response()->json(['error' => 'Error proxying video: ' . $response->status()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 500);
        }
    }

    // get tv show video
    public function getTvVideoById($id, $season, $episode)
    {
        if (!$id || $id <= 0) {
            throw new \InvalidArgumentException('Invalid video ID provided');
        }

        $url = $this->tvUrl . $id . "&s=$season&e=$episode";

        try {
            // Make the HTTP GET request with SSL verification disabled
            $response = Http::withOptions(['verify' => false])->get($url);

            if ($response->successful()) {
                return response($response->body(), 200)->header('Content-Type', 'text/html');
            }

            return response()->json(['error' => 'Error proxying video: ' . $response->status()], 500);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Exception: ' . $e->getMessage()], 500);
        }
    }
}
