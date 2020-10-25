<?php

namespace App\View\Components\Frontend\Catalog\Product;

use Illuminate\View\Component;
use Carbon\Carbon;

class Prices extends Component
{
    public $_prices;
    public $_class;
    public $carbon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        Carbon $carbon,
        $prices,
        $componentClass
    )
    {
        $this->carbon = $carbon;
        $this->_prices = $prices;
        $this->_class = $componentClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('frontend.pages.catalog.components.prices');
    }


    public function isSpecialPriceActive($price)
    {
        $today = $this->carbon->today();
        if (
            $price->special_price != null && 
            $price->special_price != 'undefined' && 
            $price->special_price > 0 &&
            $this->carbon->today()->lessThanOrEqualTo($price->offer_end) &&
            $this->carbon->today()->greaterThanOrEqualTo($price->offer_start)
        ) {
            return true;
        }else {
            return false;
        }
    }
    
}
