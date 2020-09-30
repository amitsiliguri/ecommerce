<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShowController extends Controller
{
  public function create()
  {
    return Inertia::render('Catalog/Category/Create');
  }

  public function edit()
  {
    return Inertia::render('Catalog/Category/Update');
  }
}
