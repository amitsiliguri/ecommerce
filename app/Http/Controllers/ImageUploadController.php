<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
  public function upload($image, $storePath, $retrivePath)
  {
    if ($image) {
      $fileNameWithExt = $image->getClientOriginalName();
      $fileName = pathinfo($fileNameWithExt , PATHINFO_FILENAME);
      $extension = $image->getClientOriginalExtension();
      $newFileNameToStore = $fileName . '_' . time() . '.' . $extension;
      $storePath = $image->storeAs($storePath, $newFileNameToStore);
      return $retrivePath . $newFileNameToStore;
    }
  }
}
