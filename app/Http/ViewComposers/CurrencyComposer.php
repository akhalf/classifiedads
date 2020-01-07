<?php
namespace App\Http\ViewComposers;

use App\Models\Currency;
use Illuminate\View\View;

class CurrencyComposer
{
    protected $currencies;
    public function __construct()
    {
        $this->currencies = Currency::all();
    }

    public function compose(View $view)
    {
        return $view->with('currencies', $this->currencies);
    }

}
