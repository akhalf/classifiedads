<?php

namespace App\Traits;

trait ImageUploadTrait
{

    protected $path = 'public/images/';
    protected $thumb_path = 'app/public/images/thumbs/';
    protected $thumb_height = 150;
    protected $thumb_width = 150;

    public function saveImages($image)
    {
        $image_name = $this->imageName($image);

        $image->storeAs($this->path, $image_name);

        \Image::make($image)
            ->resize($this->thumb_width, $this->thumb_height)
            ->save(storage_path($this->thumb_path . '/' . $image_name));

        return $image_name;
    }

    public function imageName($image)
    {
        return time() . '-' . $image->getClientOriginalName();
    }
}
