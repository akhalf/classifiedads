<?php

namespace App\Repositories\Ads;

interface AdInterface
{
    public function all();

    public function store($request);

    public function getDetails($id);

    public function getById($id);

    public function update($request, $id);

    public function getByUser();

    public function storeImage($ad, $image_array);

    public function getByCategory($catId);

    public function delete($id);

    public function search($request);

    public function detCommonAds();
}
