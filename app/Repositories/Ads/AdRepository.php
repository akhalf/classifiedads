<?php

namespace App\Repositories\Ads;

use App\Models\User;
use App\Traits\ImageUploadTrait;
use App\Models\Ad;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;

class AdRepository implements AdInterface
{
    protected $ads;

    use ImageUploadTrait;

    public function __construct(Ad $ads)
    {
        $this->ads = $ads;
    }


    public function all()
    {
        // TODO: Implement all() method.
    }

    public function store($request)
    {
        $ad = $request->user()->ads()->create([
            'title' => $request->title,
            'details' => $request->details,
            'slug' => $request->title,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'currency_id' => $request->currency_id,
            'country_id' => $request->country_id,
        ]);

        if ($request->file('images'))
            $this->storeImage($ad, $request->file('images'));

    }

    public function getDetails($id)
    {
        // TODO: Implement getDetails() method.
    }

    public function getById($id)
    {
        $ad = $this->ads::find($id);
        return $ad;
    }

    public function update($request, $id)
    {
        // TODO: Implement update() method.
    }

    public function getByUser()
    {
        return $this->ads::select('id', 'title', 'price', 'slug', 'created_at')
            ->whereUser_id(Auth::id())
            ->get();
    }

    public function storeImage($ad, $image_array)
    {
        foreach ($image_array as $img)
        {
            $image_name = $this->saveImages($img);
            $image = new Image();
            $image->image = $image_name;
            $ad->images()->save($image);
        }
    }

    public function getByCategory($catId)
    {
        // TODO: Implement getByCategory() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function search($request)
    {
        // TODO: Implement search() method.
    }

    public function detCommonAds()
    {
        // TODO: Implement detCommonAds() method.
    }
}