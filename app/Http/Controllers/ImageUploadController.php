<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
  public function upload($image, $path)
  {
    if ($image) {
      $fileNameWithExt = $image->getClientOriginalName();
      $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
      $extension = $image->getClientOriginalExtension();
      $newFileNameToStore = $fileName . '_' . time() . '.' . $extension;
      $path = $image->storeAs($path, $newFileNameToStore);
      return $newFileNameToStore;
    }else {
      return 'noImage.png';
    }

  }
}
