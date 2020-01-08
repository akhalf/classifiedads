<?php

namespace App\Repositories\Favorites;

interface FavoriteInterface
{
    public function store($request);

    public function show($id);

    public function delete($id);
}
