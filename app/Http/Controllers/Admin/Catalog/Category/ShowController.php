<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShowController extends Controller
{
  public function show()
  {
    return Inertia::render('Catalog/Category/Show');
  }
}
