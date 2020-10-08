<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;

class IndexController extends Controller
{
  public function index()
  {
    return Inertia::render('Catalog/Product/Index');
  }


  public function paginatedProductData()
  {
    // code...
  }
}
