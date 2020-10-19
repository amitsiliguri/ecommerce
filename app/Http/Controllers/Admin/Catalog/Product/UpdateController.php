<?php
declare(strict_types = 1);
namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Product\Product;
use App\Models\Catalog\Product\Image;

use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Admin\Catalog\Product\CommonController as CatalogProductCommonController;

class UpdateController extends Controller
{
  
    protected $productMetaImageStorePath = 'public/catalog/product/meta';
    protected $productMetaImageRetrivePath = '/storage/catalog/product/meta/';

    public function __construct(
        CatalogProductCommonController $catalogProductCommonController 
    )
    {
        $this->_catalogProductCommonController = $catalogProductCommonController;
    }

    public function update(Request $request, int $id) : object
    {
        //get product
        $catalogProduct = Product::findOrFail($id);
        //validation
        $inputs = $request->all();
        $this->_catalogProductCommonController->validation($inputs, $catalogProduct, 'updateCatalogProductForm');

        // mandetory fields
        $catalogProduct->status = $inputs['status'];
        $catalogProduct->title = $inputs['title'];
        $catalogProduct->slug = $inputs['slug'];
        $catalogProduct->sku = $inputs['sku'];
        $catalogProduct->small_description = $inputs['small_description'];
        $catalogProduct->description = $inputs['description'];
        $catalogProduct->meta_title = $inputs['meta_title'];
        $catalogProduct->meta_description = $inputs['meta_description'];


        $catalogProduct->meta_image = $this->_catalogProductCommonController->upload(
                                                $request, 
                                                'meta_image', 
                                                $this->productMetaImageStorePath, 
                                                $this->productMetaImageRetrivePath,
                                                'meta',
                                                false
                                            );

        // save products
        $catalogProduct->save();
        // add prices to product
        if (array_key_exists("prices",$inputs) && is_array($inputs['prices']) && sizeof($inputs['prices']) > 0) {
            $catalogProduct->prices()->delete();
            $catalogProduct->prices()->createMany($inputs['prices']);
        }
        // add inventories to product
        if (array_key_exists("inventories",$inputs) && is_array($inputs['inventories']) && sizeof($inputs['inventories']) > 0) {
            $catalogProduct->inventories()->delete();
            $catalogProduct->inventories()->createMany($inputs['inventories']);
        }
        // add images to product
        if (array_key_exists("images",$inputs) && is_array($inputs['images']) && sizeof($inputs['images']) > 0) {
            $this->productImageUpdate($request, $catalogProduct->images);
        }
        // add categories to product
        $catalogProduct->categories()->sync($inputs['categories']);

        return redirect()->route('catalog.product.index')->with('success', 'Category updated');
    }





    public function productImageUpdate(Request $request, object $oldImages)
    {
        $url = '';
        foreach ($oldImages as $oldKey => $oldImage) {
            $found = false;
            $catalogProductImage = Image::findOrFail($oldImage->id);
            foreach ($request->images as $newKey => $newImage) {
                if ($newImage['id'] == $oldImage->id) {
                    $found = true;
                    // new image in request
                    if ($request->hasFile('images.'. $newKey .'.image')) {
                        $url = $this->_catalogProductCommonController->updateImage(
                             $request->file('images.'. $newKey .'.image'), 
                            (int) $newImage['type']
                        );

                        $catalogProductImage->type = $newImage['type'];
                        $catalogProductImage->image = $url;
                        $catalogProductImage->save(); 
                    }
                }
            }
            // value doesn't exist in new request
            // delete this value
            if (!$found) {
                $catalogProductImage->delete();
            }
        }
    }
}
