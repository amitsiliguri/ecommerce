<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Product\Product;
use Inertia\Inertia;

use App\Http\Controllers\Admin\Catalog\Inventory\Source\IndexController as CatalogSourceIndexController;
use App\Http\Controllers\Admin\Catalog\Category\TreeController as CatalogCategoryTreeController;

class EditController extends Controller
{
  public function __construct(
    CatalogSourceIndexController $catalogSourceIndexController,
    CatalogCategoryTreeController $catalogCategoryTreeController
  ) {
    $this->_catalogSourceIndexController = $catalogSourceIndexController;
    $this->_catalogCategoryTreeController = $catalogCategoryTreeController;
  }

  public function edit($id)
  {
    $catalogProduct = Product::with(
                            array('prices'=>function($query){
                              $query->select('id','quantity','base_price','special_price','offer_start','offer_end','product_id');
                            }))
                      ->with(
                            array('inventories'=>function($query){
                              $query->select('id','quantity','product_id','source_id');
                            }))
                      ->with(array('images'=>function($query){
                              $query->select('id','image','type','product_id');
                            }))
                      ->with(array('categories'=>function($query){
                              $query->select('id','title');
                            }))
                      ->findOrFail($id);
    return Inertia::render('Catalog/Product/Edit', [
        'product' => $catalogProduct,
        'categories' => $this->_catalogCategoryTreeController->tree(),
        'sources' => $this->_catalogSourceIndexController->getAllInventorySourceList()
    ]);
  }
}
