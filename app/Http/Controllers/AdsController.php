<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{
    Ads\AdInterface,
    Favorites\FavoriteInterface,
};
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    protected $ads, $favorite;

    public function __construct(AdInterface $ad, FavoriteInterface $favorite)
    {
        $this->ads = $ad;
        $this->favorite = $favorite;
    }

    public function all()
    {
        $ads=$this->ads->all();
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request)
    {
        $this->ads->store($request);

        return back()->with('success', 'تم إضافة الإعلان');
    }

    public function edit($id)
    {
        $ad = $this->ads->getById($id);

        return view('ads.edit', compact('ad'));
    }

    public function update (Request $request, $id)
    {
        $this->ads->update($request, $id);

        return back()->with('success', 'تم تعديل البيانات');
    }

    public function getUserAds()
    {
        $ads = $this->ads->getByUser();
        return view('ads.user_ads', compact('ads'));
    }

    public function getByCategory($id)
    {
        $ads = $this->ads->getByCategory($id);

        return view('ads.adsByCategory', compact('ads'));
    }

    public function destroy($id)
    {
        $this->ads->delete($id);

        return back()->with('success', 'تم حذف الإعلان');
    }

    public function show($id, $ss)
    {
        $ad = $this->ads->getDetails($id);

        if (Auth::check())
            $is_favorite = $this->favorite->show($id);

        return view('ads.show', compact(['ad', 'is_favorite']));
    }

    public function search(Request $request)
    {
        $ads = $this->ads->search($request);

        return view('ads.adsByCategory', compact('ads'));
    }

    public function getCommonAds()
    {
        $ads = $this->ads->detCommonAds();

        return view('index', compact('ads'));
    }

}
