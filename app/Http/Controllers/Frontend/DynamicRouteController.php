<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Category;
use App\Models\Catalog\Product\Product;

class DynamicRouteController extends Controller
{
    public function route($any)
    {
        return view('frontend.welcome');
    }
}
