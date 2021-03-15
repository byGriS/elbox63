<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      @foreach($breadcrumbs as $item)
      <li class="breadcrumb-item"><a href="{{ $item['href'] }}">{{$item['title']}}</a></li>
      @endforeach
    </ol>
  </nav>
</div>