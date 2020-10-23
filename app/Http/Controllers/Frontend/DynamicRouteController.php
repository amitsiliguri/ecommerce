<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Category;
use App\Models\Catalog\Product\Product;

class DynamicRouteController extends Controller
{
    public function route(String $any) : Object
    {
        $itemPerPage = 2;
        if ($catalogCategory = Category::where('slug', $any)->first()) {

            $catalogProducts = $catalogCategory->products()->with(array('images'=>function($query){
                    $query->select('image','type','product_id')->where('type', 1);
                }))
                ->orderBy('id', 'desc')
                ->paginate($itemPerPage);

            return  view('frontend.pages.catalog.category')
                    ->with( 
                        [
                            'category' => $catalogCategory, 
                            'products' => $catalogProducts
                        ]
                    );
        } else {
            return abort(404);
        }
    }
}
