<?php

namespace App\Repositories;

use App\Models\Photo;
use App\Models\Product;

class ProductRepository extends BaseRepository {

  public function __construct(Product $model) {
    parent::__construct($model);
  }

  public function getInstanceWithDefault(){
    $product = $this->getInstance();
    $product->term = "2-3 недели";
    $product->warranty = 12;
    $product->po = "включено в состав";
    return $product;
  }

  public function getList() {
    $result = $this->model->select('id', 'title', 'slug')->orderBy('title', 'asc')->get();
    return $result;
  }

  public function getAllWithData(){
    $result = $this->model->with('photos')->get();
    return $result;
  }

  public function getByIdWithData($id) {
    $result = $this->model->whereId($id)->first();
    return $result;
  }

  public function getBySlug($slug){
    $result = $this->model->whereSlug($slug)->first();
    return $result;
  }


  public function store($data) {
    if (isset($data['id']))
      $product = $this->model->find($data['id']);
    else
      $product = new $this->model;
    $product->title = $data['title'];
    $product->slug = \Str::slug($product->title, '-');
    $product->description = $data['description'];
    $product->specifications = $data['specifications'];
    $product->price = $data['price'];
    $product->term = $data['term'];
    $product->warranty = $data['warranty'];
    $product->po = $data['po'];

    $product->save();

    // Photos
    $productPhotos = $product->photos()->select('id')->get()->toArray();
    if (isset($data['photos'])) {
      foreach ($data['photos'] as $photo) {
        if (isset($photo['id'])) {
          $photoProduct = Photo::find($photo['id']);
          foreach ($productPhotos as $key => $elem) {
            if ($elem['id'] == $photo['id'])
              unset($productPhotos[$key]);
          }
        } else
          $photoProduct = new Photo;
        $photoProduct->src = $photo['src'];
        $photoProduct->product_id = $product->id;
        $photoProduct->save();
      }
    }
    if (count($productPhotos) > 0)
      Photo::whereIn('id', $productPhotos)->delete();
    // End Photos
    /*
    // Places
    $product->availability()->detach();
    if (isset($data['places'])) {
      foreach ($data['places'] as $place_id) {
        $product->availability()->attach($place_id);
      }
    }
    // End Places

    // Related
    $product->related()->detach();
    if (isset($data['products'])) {
      foreach ($data['products'] as $product_id) {
        $product->related()->attach($product_id);
      }
    }
    // End Related
*/
    return true;
  }

  public function delete($id) {
    $product = $this->model->find($id);
    //$product->availability()->detach();
    //$product->related()->detach();
    $product->delete();
  }

  public function deleteSelected($data) {
    foreach ($data as $param) {
      $product = $this->model->find($param['id']);
      //$product->availability()->detach();
      //$product->related()->detach();
      $product->delete();
    }
  }
}
