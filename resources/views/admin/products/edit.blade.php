@extends('admin.layout')

@section('content')
<div>

  <div class="d-flex justify-content-between align-items-center">
    <a href="javascript:history.back()" class="btn btn-sm btn-dark m-2">Назад</a>
    @isset($product->id)
    <btn-delete class="m-2" :href-delete="{{json_encode(route('products.destroy', $product->id))}}" :href-back="{{json_encode(route('products.index'))}}"></btn-delete>
    @endisset
  </div>

  <form action="{{route('products.store')}}" method="POST">
    @csrf
    @isset($product->id)
    <input class="d-none" name="id" value="{{$product->id}}" />
    @endisset

    <div class="tabs">
      <input type="radio" name="tabs" value="" id="tab_1" checked>
      <label for="tab_1">Общие данные</label>

      <input type="radio" name="tabs" value="" id="tab_2">
      <label for="tab_2">Описание</label>

      <input type="radio" name="tabs" value="" id="tab_3">
      <label for="tab_3">Технические характеристики</label>

      <div id="tab_data_1">
        <div class="d-flex mx-2">
          <label for="title" class="col-sm-3 col-form-label">Название</label>
          <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="title" name="title" value="{{$product->title}}" required>
          </div>
        </div>

        <div class="d-flex mx-2">
          <label for="price" class="col-sm-3 col-form-label">Цена, руб</label>
          <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="price" name="price" value="{{$product->price}}">
          </div>
        </div>

        <div class="d-flex mx-2">
          <label for="term" class="col-sm-3 col-form-label">Срок изготовления</label>
          <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="term" name="term" value="{{$product->term}}">
          </div>
        </div>

        <div class="d-flex mx-2">
          <label for="warranty" class="col-sm-3 col-form-label">Гарантийный срок</label>
          <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="warranty" name="warranty" value="{{$product->warranty}}">
          </div>
        </div>

        <div class="d-flex mx-2">
          <label for="po" class="col-sm-3 col-form-label">Программное обеспечение</label>
          <div class="col-sm-9">
            <input type="text" class="form-control form-control-sm" id="po" name="po" value="{{$product->po}}">
          </div>
        </div>

        <div class="d-flex mx-2">
          <label class="col-sm-3 col-form-label">Фото</label>
          <div class="col-sm-9">
            <input-photos name="image" :photos="{{$product->photos}}"></input-photo>
          </div>
        </div>
      </div>
      <div id="tab_data_2">
        <div class="mx-2 mb-2">
          <textarea-editor name="description" value="{{$product->description}}"></textarea-editor>
        </div>
      </div>
      <div id="tab_data_3">
        <div class="mx-2 mb-2">
          <textarea-editor name="specifications" value="{{$product->specifications}}"></textarea-editor>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-sm btn-primary m-2">Сохранить</button>

  </form>
</div>
@endsection