<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller {
  public function show($slug, ProductRepository $productRepository) { 
    $items = $productRepository->getList();
    $product = $productRepository->getBySlug($slug);
    $breadcrumbs = [['title' => 'Главная', 'href' => '/'], ['title' => 'Каталог', 'href' => '/catalog'], ['title' => $product->title, 'href' => $product->slug]];
    return view('front.product', compact('items','product', 'breadcrumbs'));
  }
}
