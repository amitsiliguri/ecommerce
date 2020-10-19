<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\Catalog\Category;

class EditController extends Controller
{
  public function edit($id)
  {
    $catalogCategory = Category::findOrFail($id);
    $status = ($catalogCategory->status == 1) ? true : false;
    return Inertia::render('Catalog/Category/Edit', [
        'category' => [
            'id' => $catalogCategory->id,
            'status' => $status,
            'title' => $catalogCategory->title,
            'slug' => $catalogCategory->slug,
            'description' => $catalogCategory->description,
            'banner' => $catalogCategory->banner,
            'meta_title' => $catalogCategory->meta_title,
            'meta_description' => $catalogCategory->meta_description,
            'meta_image' => $catalogCategory->meta_image,
        ],
    ]);
  }
}
