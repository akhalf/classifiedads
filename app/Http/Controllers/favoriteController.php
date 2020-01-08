<?php

namespace App\Http\Controllers;

use App\Repositories\Favorites\FavoriteRepository;
use Illuminate\Http\Request;

class favoriteController extends Controller
{

    protected $favorite;

    public function __construct(FavoriteRepository $favorite)
    {
        $this->favorite = $favorite;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorites = $this->favorite->all();

        return view('ads.user_favorites', compact('favorites'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->favorite->store($request);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->favorite->delete($id);
    }
}
