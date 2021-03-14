@extends('admin.layout')

@section('content')
<products-index 
  :input-data="{{$products}}" 
  :href-to-item="{{json_encode(route('products.edit', '#'))}}" 
></products-index>


@endsection