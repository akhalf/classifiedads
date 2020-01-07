<?php
namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    protected $categories;
    public function __construct()
    {
        $this->categories = Category::all();
    }

    public function compose(View $view)
    {
        return $view->with('categories', $this->categories);
    }

}
