<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $favorites = Favorite::select('users.id', 'users.name', 'favorites.id','favorites.title', 'favorites.description', 'favorites.miniature','favorites.videoId')
                ->join('users', 'users.id', '=', 'favorites.id_users')->where('users.id', $userId)->get();        
        
        return view('favorites.index', compact('favorites'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $userId = Auth::user()->id;
        Favorite::create([   'title'=>$request['snippet']['title'],
                            'description'=>$request['snippet']['description'],
                            'miniature'=>$request['snippet']['thumbnails']['default']['url'],
                            'videoId'=>$request ['id']['videoId'],
                            'id_users'=>$userId
                        ]);
        
        //return $request['snippet']['thumbnails']['default']['url'];
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        $favorite->delete();
 
        return redirect()->route('favorites.index');
    }
}
