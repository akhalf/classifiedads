<?php

namespace App\Repositories\Favorites;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteRepository implements FavoriteInterface
{
    protected $favorite;

    public function __construct(Favorite $favorite)
    {
        $this->favorite = $favorite;
    }

    public function store($request)
    {
        $favorite = $request->user()->favAds()->attach($request->id);
    }

    public function show($id)
    {
        $is_favorite =  auth()->user()->favAds()->whereAd_id($id)->first();

        return $is_favorite ? true : false;
    }

    public function delete($id)
    {
        auth()->user()->favAds()->detach($id);
    }

    public function all()
    {
        return Auth::user()->favAds;
    }
}
