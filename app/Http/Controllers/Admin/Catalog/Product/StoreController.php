<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Product\Product;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\Catalog\Product\CommonController as CatalogProductCommonController;

class StoreController extends Controller
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


  public function store(Request $request)
  {
    //validation
    $inputs = $request->all();
    $this->_catalogProductCommonController->validation($inputs, null, 'createCatalogProductForm');
    $catalogProduct = new Product();
    // mandetory fields
    $catalogProduct->status = $inputs['status'];
    $catalogProduct->title = $inputs['title'];
    $catalogProduct->slug = $inputs['slug'];
    $catalogProduct->sku = $inputs['sku'];
    $catalogProduct->small_description = $inputs['small_description'];
    $catalogProduct->description = $inputs['description'];
    $catalogProduct->meta_title = $inputs['meta_title'];
    $catalogProduct->meta_description = $inputs['meta_description'];
    // meta image save conditions
    if (array_key_exists("meta_image",$inputs) && $request->hasFile('meta_image')) {
      $catalogProduct->meta_image = $this->_imageUploadController->upload($request->file('meta_image'), $this->productMetaImageStorePath, $this->productMetaImageRetrivePath);
    }else {
      $catalogProduct->meta_image = '/asset/catalog/product/meta/noImage.png';
    }
    // save products
    $catalogProduct->save();
    // add prices to product
    if (array_key_exists("prices",$inputs) && is_array($inputs['prices']) && sizeof($inputs['prices']) > 0) {
      $catalogProduct->prices()->createMany($inputs['prices']);
    }
    // add inventories to product
    if (array_key_exists("inventories",$inputs) && is_array($inputs['inventories']) && sizeof($inputs['inventories']) > 0) {
      $catalogProduct->inventories()->createMany($inputs['inventories']);
    }
    // add images to product
    if (array_key_exists("images",$inputs) && is_array($inputs['images']) && sizeof($inputs['images']) > 0) {
      $catalogProduct->images()->createMany($this->_catalogProductCommonController->productImages($request));
    }
    // add categories to product
    $catalogProduct->categories()->sync($inputs['categories']);

    return redirect()->route('catalog.product.index')->with('success', 'New category created');
  }

  public function ProductImages($request)
  {
    $tempImageArray = [];
    foreach ($request->images as $key => $value) {
      switch ($value['type']) {
        case 0:
          $store = $this->productSmallImageStorePath;
          $retrive = $this->productSmallImageRetrivePath;
          break;
        case 1:
          $store = $this->productThumbnailmageStorePath;
          $retrive = $this->productThumbnailImageRetrivePath;
          break;
        default:
          $store = $this->productBaseImageStorePath;
          $retrive = $this->productBaseImageRetrivePath;
          break;
      }
      if (array_key_exists("image",$value)  && $request->hasFile('images.'. $key .'.image')) {
        $imagePath = $this->_imageUploadController->upload($request->file('images.'. $key .'.image'), $store, $retrive);
      }else {
        $imagePath = '/asset/catalog/product/'.$value['type'].'/noImage.png';
      }
      $tempImageArray[$key]['type'] = $value['type'];
      $tempImageArray[$key]['image'] = $imagePath;
    }
    return $tempImageArray;
  }
}
