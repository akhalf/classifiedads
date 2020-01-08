<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //protected $fillable = ['title', 'text', 'slug', 'price', 'user_id', 'category_id', 'currency_id', 'country_id',];
    protected $guarded = ['id'];

    public function setSlugAttribute($value)
    {
        $slug = Helper::slug($value);

        $unique_lug = Helper::uniqueSlug($slug, 'ads');

        $this->attributes['slug'] = $unique_lug;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
