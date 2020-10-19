<?php
declare(strict_types = 1);
namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Product\Product;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Admin\Catalog\Product\CommonController as CatalogProductCommonController;

class UpdateController extends Controller
{
  
    protected $productMetaImageStorePath = 'public/catalog/product/meta';
    protected $productMetaImageRetrivePath = '/storage/catalog/product/meta/';

    public function __construct(
        ImageUploadController $imageUploadController,
        CatalogProductCommonController $catalogProductCommonController 
    )
    {
        $this->_imageUploadController = $imageUploadController;
        $this->_catalogProductCommonController = $catalogProductCommonController;
    }

    public function update(Request $request,$id) : object
    {
        //get product
        $catalogProduct = Product::findOrFail($id);
        //validation
        $inputs = $request->all();
        $this->_catalogProductCommonController->validation($inputs, $catalogProduct, 'updateCatalogProductForm');

        return redirect()->route('catalog.product.index')->with('success', 'Category updated');
    }
}
