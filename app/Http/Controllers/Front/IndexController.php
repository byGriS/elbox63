<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class IndexController extends Controller {
  public function index() {
    return view('front.index');
  }

  public function catalog(ProductRepository $productRepository) {
    $products = $productRepository->getAllWithData();
    return view('front.catalog')->with('products', $products);
  }
}
