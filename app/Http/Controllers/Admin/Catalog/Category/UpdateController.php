<?php

namespace App\Http\Controllers\Admin\Catalog\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\ImageUploadController;
use App\Models\Catalog\Category;
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
  public function update(Request $request, $id)
  {
    //validation
    $inputs = $request->all();
    $this->validation($inputs);
    // return redirect()->back();
    return $request->wantsJson()
                ? new JsonResponse('', 200)
                : back()->with('status', 'Category updated')->with('success', true);
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
    ])->validateWithBag('saveCategory');
  }
}
