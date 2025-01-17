<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YouTubeController extends Controller
{
    public function search(Request $request)
    {
        $apiKey = env('YOUTUBE_API_KEY'); // Asegúrate de definir esto en tu archivo .env
        $query = $request->input('query'); // Obtén la consulta de búsqueda desde el cliente
        $maxResults = $request->input('maxResults', 10); // Máximo número de resultados, por defecto 10

        if (!$query) {
            return response()->json(['error' => 'El parámetro "query" es obligatorio.'], 400);
        }

        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => $query,
            'type' => 'video',
            'maxResults' => $maxResults,
            'key' => $apiKey,
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Error al comunicarse con la API de YouTube.'], 500);
        }

        return response()->json($response->json());
    }
}
