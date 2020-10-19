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
    $products = Product::with(
      [
        "prices" => function($q) {
           $q->where('quantity', '=', 1);
         }
      ])
      ->with('inventories')
      ->with(
      [
        "images" => function($q) {
          $q->where('type', '=', 0);
        }
      ])
      ->orderBy('id', 'desc')
      ->paginate($itemsPerPage);



    return $products;
  }

}
