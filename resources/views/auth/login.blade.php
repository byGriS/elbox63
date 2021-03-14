@extends('front.layout')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-6 col-md-4 d-flex flex-column justify-content-center align-items-center my-5">
      <form action="{{route('login')}}" method="POST" class="w-100">
        @csrf
        <h3 class="text-center my-2">Вход</h3>
        <div class="form-group my-1">
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{old('email')}}" required>
        </div>
        <div class="form-group my-1">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Пароль" required>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger my-1">
          <ul class="my-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="text-center my-1">
          <button type="submit" class="btn btn-sm btn-primary px-5">Войти</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection