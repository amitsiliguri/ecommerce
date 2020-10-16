<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Product\Product;

class DeleteController extends Controller
{
    public function delete($ids)
    {
      $array = explode(',', $ids);
      Product::whereIn('id', $array)->delete();
      return redirect()->back()->with('success', 'Products deleted');
    }
}
