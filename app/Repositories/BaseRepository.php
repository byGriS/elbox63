<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository {

  protected $model;

  public $paginateCount = 30;

  public function __construct(Model $model) {
    $this->model = $model;
  }

  public function getModel(){
    return $this->model;
  }

  public function getInstance(){
    return new $this->model;
  }

  public function getAll(){
    return $this->model->all();
  }

  public function getAllPaginate() {
    return $this->model->paginate($this->paginateCount);
  }

  public function getById($id){
    return $this->model->find($id);
  }
}
