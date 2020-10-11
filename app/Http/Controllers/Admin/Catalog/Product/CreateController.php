<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;

class CreateController extends Controller
{

    public function create()
    {
      return Inertia::render('Catalog/Product/Create');
    }
}
