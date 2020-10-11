<?php

namespace App\Http\Controllers\Admin\Catalog\Inventory\Source;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Inventory\Source;

class IndexController extends Controller
{

    public function getAllInventorySourceList()
    {
      return response()->json([
          'success' => true,
          'sources' => Source::all(),
      ]);
    }
}
