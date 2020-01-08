<?php

namespace App\Http\Controllers;

use App\Repositories\Ads\AdInterface;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    protected $ads;

    public function __construct(AdInterface $ad)
    {
        $this->ads = $ad;
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

        return view('ads.show', compact('ad'));
    }

    public function search(Request $request)
    {
        $ads = $this->ads->search($request);

        return view('ads.adsByCategory', compact('ads'));
    }

}
