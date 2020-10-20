<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DynamicRouteController extends Controller
{
    public function route($any)
    {
        return view('frontend.welcome');
    }
}
