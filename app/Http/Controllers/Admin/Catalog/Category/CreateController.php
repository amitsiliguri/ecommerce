<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;

class CreateController extends Controller
{
  public function create()
  {
    return Inertia::render('Catalog/Category/Create');
  }
}
