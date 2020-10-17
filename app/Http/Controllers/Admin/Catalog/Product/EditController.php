<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Product\Product;
use Inertia\Inertia;

class EditController extends Controller
{
    public function edit($id)
    {
      $catalogProduct = Product::with('prices')
                        ->with('inventories')
                        ->with('images')
                        ->with(array('categories'=>function($query){
                                $query->select('id');
                              }))
                        ->findOrFail($id);
      return Inertia::render('Catalog/Product/Edit', [
          'product' => $catalogProduct,
      ]);
    }
}
