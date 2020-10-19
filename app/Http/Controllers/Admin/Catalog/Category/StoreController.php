<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ImageUploadController;
use App\Models\Catalog\Category;

class StoreController extends Controller
{

  protected $featuredImageStorePath = 'public/catalog/category/featured';
  protected $featuredImageRetrivePath = '/storage/catalog/category/featured/';
  protected $metaImageStorePath = 'public/catalog/category/meta';
  protected $metaImageRetrivePath = '/storage/catalog/category/meta/';
  protected $_imageUploadController;

  public function __construct(ImageUploadController $imageUploadController)
  {
    $this->_imageUploadController = $imageUploadController;
  }

  public function store(Request $request)
  {

    //validation
    $inputs = $request->all();
    $this->validation($inputs);

    // create new object
    $catalogCategory = new Category();

    // mandetory fields
    $catalogCategory->status = $inputs['status'];
    $catalogCategory->title = $inputs['title'];
    $catalogCategory->slug = $inputs['slug'];
    $catalogCategory->description = $inputs['description'];
    $catalogCategory->sort_order = Category::count() + 1;

    // featured image save conditions
    if (array_key_exists("banner",$inputs) && $request->hasFile('banner')) {
      $catalogCategory->banner = $this->featuredImageRetrivePath . $this->_imageUploadController->upload($request->file('banner'), $this->featuredImageStorePath, $this->featuredImageRetrivePath);
    }else {
      $catalogCategory->banner = $this->featuredImageRetrivePath . 'noImage.png';
    }

    //optional inputs | meta_title
    if (array_key_exists("meta_title",$inputs)) {
      $catalogCategory->meta_title = $inputs['meta_title'];
    }

    //optional inputs | meta_description
    if (array_key_exists("meta_description",$inputs)) {
      $catalogCategory->meta_description = $inputs['meta_description'];
    }

    // meta image save conditions
    if (array_key_exists("meta_image",$inputs) && $request->hasFile('meta_image')) {
      $catalogCategory->meta_image = $this->metaImageRetrivePath . $this->_imageUploadController->upload($request->file('meta_image'), $this->metaImageStorePath, $this->metaImageRetrivePath);
    }else {
      $catalogCategory->meta_image = $this->metaImageRetrivePath . 'noImage.png';
    }

    $catalogCategory->save();

    return redirect()->back()->with('success', 'New category created');
  }


  public function validation($inputs)
  {
    $validator = Validator::make($inputs, [
      'status'  => ['required'],
      'title'   => ['required','max:100'],
      'slug'    => ['required', 'string', 'max:100'],
      'banner'  => ['nullable','image ', 'mimes:jpeg,jpg,png','max:512'],
      'description' => ['nullable'],
      'meta_title' => ['nullable','string', 'max:100' ],
      'meta_description' => ['nullable','string', 'max:170' ],
      'meta_image'  => ['nullable','image ', 'mimes:jpeg,jpg,png','max:512'],
    ])->validateWithBag('createCatalogCategoryForm');
  }

}
