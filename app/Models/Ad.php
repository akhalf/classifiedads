<?php

namespace App\Models;

use App\Helpers\Helper;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function scopeFilter($query, Request $request)
    {
        if ($request->country)$query->whereCountry_id($request->country);
        if ($request->category)$query->whereCategory_id($request->category);
        if ($request->keyword)$query->where('title', 'LIKE', '%'. $request->keyword . '%');

        return $query->with('images')->get();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereParent_id(null);
    }
}
