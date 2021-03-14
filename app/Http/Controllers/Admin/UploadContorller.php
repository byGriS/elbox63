<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadContorller extends Controller {
  public function upload(Request $request) {
    $result = array();
    for ($i = 0; $i < count($request->file('image')); $i++) {
      $path = $request->file('image')[$i]->store('public\photos');
      $path = str_replace(['public\\', 'public/'], '', $path);
      array_push($result, $path);
    }
    return $result;
  }
}
