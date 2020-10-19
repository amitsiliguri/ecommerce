<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog\Category;

class ReorderController extends Controller
{
    public function reorder(Request $request)
    {
      $this->saveReorder($request->all());
      return response()->json([
          'success' => true
      ]);
    }

    private function saveReorder($tree, $parentId = 0)
    {
      foreach ($tree as $key => $item) {
        $foundCategory = Category::find($item['id']);
        $foundCategory->parent_id = $parentId;
        $foundCategory->sort_order = $key;
        $foundCategory->save();
        if (sizeof($item['children']) > 0 ) {
          $this->saveReorder($item['children'], $item['id']);
        }
      }
    }
}
