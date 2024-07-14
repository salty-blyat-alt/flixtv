<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class EmbedService
{
    protected $baseUrl;

    public function __construct() {
        $this->baseUrl = 'https://2embed.cc/embed/';
    }

    public function getVideoById($id) {
        if (!$id || $id <= 0) {
            throw new \InvalidArgumentException('Invalid video ID provided');
        }

        $url = $this->baseUrl . $id;

        try {
            // Make the HTTP GET request with SSL verification disabled
            $response = Http::withOptions(['verify' => false])->get($url);

            if ($response->successful()) {
                return $response->body(); // Return raw body for further processing
            }

            Log::error('Error fetching video: ' . $response->status());
            throw new \Exception('Error fetching video: ' . $response->status());
        } catch (\Exception $e) {
            Log::error('Exception caught while fetching video: ' . $e->getMessage());
            throw $e; // Re-throw exception for the caller to handle
        }
    }
    public function proxyVideo($id)
{
    $url = $this->baseUrl . $id;

    try {
        // Make the HTTP GET request with SSL verification disabled
        $response = Http::withOptions(['verify' => false])->get($url);

        if ($response->successful()) {
            return response($response->body(), 200)
                ->header('Content-Type', 'text/html');
        }

        Log::error('Error proxying video: ' . $response->status());
        return response()->json(['error' => 'Error proxying video: ' . $response->status()], 500);
    } catch (\Exception $e) {
        Log::error('Exception caught while proxying video: ' . $e->getMessage());
        return response()->json(['error' => 'Exception: ' . $e->getMessage()], 500);
    }
}

}
