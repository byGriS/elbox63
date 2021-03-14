<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller {
  public function index(Request $request, ProductRepository $productRepository) {
    $products = $productRepository->getAllPaginate();
    if (isset($request->page) && $request->page != 1) {
      if (count($products) == 0)
        return redirect(route('products.index', ['page' => $request->page - 1]));
    }
    return view('admin.products.index')->with('products', $products->toJson());
  }

  public function create(ProductRepository $productRepository) {
    $product = $productRepository->getInstanceWithDefault();
    return view('admin.products.edit')->with(compact('product'));
  }

  public function store(Request $request, ProductRepository $productRepository) {
      $productRepository->store($request->all());
    return redirect(route('products.index'));
  }

  public function edit($id, ProductRepository $productRepository) {
    $product = $productRepository->getByIdWithData($id);
    return view('admin.products.edit')->with(compact('product'));
  }
  
  public function destroy($id, ProductRepository $productRepository) {
    $product = $productRepository->delete($id);
    return true;
  }

  public function deleteSelected(Request $request, ProductRepository $productRepository){
    $result = $productRepository->deleteSelected($request->data);
    return $result;
  }

  public function filter(Request $request, ProductRepository $productRepository){
    $products = $productRepository->getFilterPaginate($request->all());
    $search = $request->all();
    return view('admin.products.index')->with('products', $products->toJson())->with('search',$search);
  }
}
