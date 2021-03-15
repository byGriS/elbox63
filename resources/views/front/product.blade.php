@extends('front.layout')

@section('content')
@include('front.breadcrumb')
<div class="container product">
  <div class="d-flex">
    <div class="d-none d-md-block col-md-3 col-lg-3 col-xl-2">
    <div class="sidebar ">
      <x-sidebar-catalog :items="$items"/>
    </div>
    </div>
    <div class="col-12 col-md-9 col-lg-9 col-xl-10">
      <div class="row">
        <div class="col-12 col-md-7 photos">
          <slider :images="{{$product->photos}}"></slider>
        </div>
        <div class="col-5">
          <table>
            <tr>
              <td>Производитель</td>
              <td>ООО "СпецПромАвтоматика"</td>
            </tr>
            <tr>
              <td>Срок изготовления</td>
              <td>{{$product->term}}</td>
            </tr>
            <tr>
              <td>Гарантийный период</td>
              <td>{{$product->warranty}} месяцев</td>
            </tr>
            <tr>
              <td>Программное обеспечение</td>
              <td>{{$product->po}}</td>
            </tr>
          </table>
        </div>
      </div>

      
      <div class="tabs">  
        <input type="radio" name="tabs" value="" id="tab_1" checked>
        <label for="tab_1">Описание</label>
  
        <input type="radio" name="tabs" value="" id="tab_2">
        <label for="tab_2">Технические характеристики</label>
  
        <div id="tab_data_1">
          <div class="mx-2 mb-2">
            {!!$product->description!!}
          </div>
        </div>
        <div id="tab_data_2">
          <div class="mx-2 mb-2">
            {!!$product->specifications!!}
          </div>
        </div>
      </div>

    </div>
  </div>


</div>
@endsection