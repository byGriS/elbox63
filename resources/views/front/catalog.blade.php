@extends('front.layout')
{{-- @dd($products) --}}
@section('content')
<div class="container catalog">
  <div class="text-center my-3">
    <h2>Электрощитовое оборудование</h2>
  </div>
  <div class="row">
    @foreach($products as $product)
    <div class="col-3 p-1">
      <a href="{{route('product.show', $product->slug)}}" class="product">
        <div class="text-center title">
          {{$product->title}}
        </div>
        <img src="{{$product->photos[0]->src}}" />
        <div class="d-flex justify-content-between">
          <div><strong>от {{$product->price}} руб.</strong></div>
          <div class="btn btn-sm btn-dark">Подробнее</div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection