<?php

namespace App\Http\Controllers\Admin\Catalog\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Catalog\Product\Product;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{

  protected $productSmallImageStorePath = 'public/catalog/product/small';
  protected $productSmallImageRetrivePath = '/storage/catalog/product/small/';

  protected $productThumbnailmageStorePath = 'public/catalog/product/thumbnail';
  protected $productThumbnailImageRetrivePath = '/storage/catalog/product/thumbnail/';

  protected $productBaseImageStorePath = 'public/catalog/product/base';
  protected $productBaseImageRetrivePath = '/storage/catalog/product/base/';

  protected $productMetaImageStorePath = 'public/catalog/product/meta';
  protected $productMetaImageRetrivePath = '/storage/catalog/product/meta/';


  public function __construct(ImageUploadController $imageUploadController)
  {
    $this->_imageUploadController = $imageUploadController;
  }


  public function store(Request $request)
  {
    //validation
    $inputs = $request->all();
    $this->validation($inputs);
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
    if (array_key_exists("prices",$inputs) && is_array($inputs['prices']) && sizeof($inputs['prices']) > 0) {
      $catalogProduct->prices()->createMany($inputs['prices']);
    }
    if (array_key_exists("inventories",$inputs) && is_array($inputs['inventories']) && sizeof($inputs['inventories']) > 0) {
      $catalogProduct->inventories()->createMany($inputs['inventories']);
    }
    if (array_key_exists("images",$inputs) && is_array($inputs['images']) && sizeof($inputs['images']) > 0) {
      $catalogProduct->images()->createMany($this->ProductImages($request));
    }
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

  public function validation($inputs)
  {
    $validator = Validator::make($inputs, [
      'status'  => ['required'],
      'title'   => ['required','max:100'],
      'slug'    => ['required', 'string', 'max:100', 'unique:products'],
      'sku'    => ['required', 'string', 'max:100', 'unique:products'],
      'small_description' => ['nullable'],
      'description' => ['nullable'],
      'meta_title' => ['nullable','string', 'max:100' ],
      'meta_description' => ['nullable','string', 'max:170' ],
      'meta_image'  => ['nullable','image ', 'mimes:jpeg,jpg,png','max:512'],
      'prices.*.quantity' => ['required'],
      'prices.*.base_price' => ['required'],
      'prices.*.special_price' => ['required'],
      'inventories.*.source_id' => ['required'],
      'inventories.*.quantity' => ['required'],
      'images.*.image' => ['required','image', 'mimes:jpeg,jpg,png','max:512'],
    ])->validateWithBag('createCatalogProductForm');
  }
}
