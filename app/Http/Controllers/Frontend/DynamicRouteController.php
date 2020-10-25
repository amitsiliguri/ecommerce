<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Category;
use App\Models\Catalog\Product\Product;

class DynamicRouteController extends Controller
{
    protected $categoryProductsItemPerPage = 2;
    public function route(String $any) : Object
    {
        
        if ($catalogCategory = Category::where('slug', $any)->first()) {
            return view('frontend.pages.catalog.category')
                    ->with( 
                        [
                            'category' => $catalogCategory, 
                            'products' => $this->categoryProducts($catalogCategory->id, $this->categoryProductsItemPerPage)
                        ]
                    );
        } elseif ( $catalogProduct = Product::where('slug', $any)->first() ) {
            return view('frontend.pages.catalog.product')->with(['product' => $catalogProduct]);
        } else {
            return abort(404);
        }

        
        
    }

    public function categoryProductsAjax(Request $request, int $categoryId) : string 
    {
        if($request->ajax()){
            return $this->categoryProducts($categoryId, $this->categoryProductsItemPerPage);
        } else {
            return abort(404);
        }
    }



    protected function categoryProducts(int $categoryId, int $itemPerPage) : string 
    {
        return Category::find($categoryId)->products()->with(array('images'=>function($query){
            $query->select('image','type','product_id')->where('type', 1);
        }))
        ->with('prices')
        ->orderBy('id', 'desc')
        ->paginate($itemPerPage)->toJson();
    }
}
