<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Inertia\Inertia;

use App\Http\Controllers\Admin\Catalog\Inventory\Source\IndexController as CatalogSourceIndexController;
use App\Http\Controllers\Admin\Catalog\Category\TreeController as CatalogCategoryTreeController;

class CreateController extends Controller
{
  public function __construct(
    CatalogSourceIndexController $catalogSourceIndexController,
    CatalogCategoryTreeController $catalogCategoryTreeController
  ) {
    $this->_catalogSourceIndexController = $catalogSourceIndexController;
    $this->_catalogCategoryTreeController = $catalogCategoryTreeController;
  }
  
    public function create()
    {
      return Inertia::render('Catalog/Product/Create', [
        'categories' => $this->_catalogCategoryTreeController->tree(),
        'sources' => $this->_catalogSourceIndexController->getAllInventorySourceList()
      ]);
    }
}
