<div class="sidebar-catalog">
  <div class="title">
    КАТАЛОГ
  </div>
  @foreach($items as $item)
  <a href="/product/{{$item->slug}}">
    {{$item->title}}
  </a>
  @endforeach
</div>