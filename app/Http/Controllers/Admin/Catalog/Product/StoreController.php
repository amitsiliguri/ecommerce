<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
  public function store(Request $request)
  {
    return redirect()->route('catalog.product.index')->with('success', 'New category created');
  }
}
