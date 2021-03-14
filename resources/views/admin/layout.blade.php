<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{config('app.name')}}</title>
  <meta name="csrf-token" content="{{csrf_token()}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body class="admin">
  <header class="d-flex justify-content-between align-items-center fixed-top">
    <div class="d-flex align-items-center">
      <div class="navbar-dark mr-3 p-1">
        <button class="navbar-toggler d-sm-block d-md-none" onclick="window.toggleSidebar()">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div>
        <h6 class="my-0 mx-3"><a href="/">{{config('app.name')}}</a></h6>
      </div>
    </div>
    <div class="d-flex">
      <div class="mr-3 p-1">{{Auth::user()->email}}</div>
      <a class="link-logout" href="{{route('logout')}}">Выход</a>
    </div>
  </header>
  <div class="h-100">
    <div class="sidebar h-100 ">
      <ul class="d-flex flex-column align-items-center">
        <li class="{{ str_contains(Request::route()->getName(),"products")? 'menu-selected' : ''}}"><a href="{{route('products.index')}}">Товары</a></li>
      </ul>
    </div>
    <div id="app" class="content-wrap">
      @yield('content')
    </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2b18220860.js" crossorigin="anonymous"></script>
<script src={{asset('js/app.js')}}></script>

</html>