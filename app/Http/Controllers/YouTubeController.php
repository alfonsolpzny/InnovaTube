<?php
// app/Http/Controllers/YouTubeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YouTubeController extends Controller
{
    // Muestra el formulario de búsqueda
    public function index()
    {
        return view('youtube.index');
    }

    // Maneja la búsqueda y muestra los resultados
    public function search(Request $request)
    {
        $query = $request->input('query'); // Obtener el término de búsqueda
        $maxResults = $request->input('maxResults', 10); // Máximo número de resultados, por defecto 10

        // Validar que el parámetro "query" esté presente
        if (!$query) {
            return response()->json(['error' => 'El parámetro "query" es obligatorio.'], 400);
        }

        // Llamada a la API de YouTube
        $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
            'part' => 'snippet',
            'q' => $query,
            'type' => 'video',
            'maxResults' => $maxResults,
            'key' => env('YOUTUBE_API_KEY'),  // Usa la clave API definida en .env
        ]);

        // Si la solicitud falla, devolver un error
        if ($response->failed()) {
            return response()->json(['error' => 'Error al comunicarse con la API de YouTube.'], 500);
        }

        $data = $response->json(); // Convertir la respuesta JSON a un array

        // Pasar los resultados a la vista
        return view('youtube.search', compact('data'));
    }
}
