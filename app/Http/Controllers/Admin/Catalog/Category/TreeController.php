<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Category;

class TreeController extends Controller
{
  public function tree()
  {
    $new = array();
    $Categories = Category::orderBy('sort_order', 'ASC')->select('id', 'title', 'parent_id')->get()->toArray();
    if (sizeof($Categories) > 0) {
      foreach ($Categories as $Category){
        $Category['children'] = [];
        $new[$Category['parent_id']][] = $Category;
      }
      return $this->createTree($new, $new[0]);
    }else {
      return [];
    }

  }

  private function createTree(&$Categories, $parents){
    $tree = [];
    foreach ($parents as $parent){
       if( isset( $Categories[ $parent[ 'id' ] ] ) )
       {
           $parent['children'] = $this->createTree($Categories, $Categories[$parent['id']]);
       }
       $tree[] = $parent;
    }
    return $tree;
  }
}
