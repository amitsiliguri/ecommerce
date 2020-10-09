<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Product\Product;

use Inertia\Inertia;

class IndexController extends Controller
{

  public function index()
  {
    return Inertia::render('Catalog/Product/Index');
  }

  public function paginatedProductData(Request $request)
  {
    $inputs = $request->all();
    $itemsPerPage = (array_key_exists("itemsPerPage",$inputs)) ? $inputs['itemsPerPage'] : 10 ;
    $products = Product::with('prices')->with('inventories')->with('images')->paginate($itemsPerPage);
    return $products;
  }

}
