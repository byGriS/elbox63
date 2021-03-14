<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller {

  public function login(LoginRequest $request) {
    if (count($request->all()) == 0)
      return view('auth.login');
    $user = User::whereEmail($request->email)->first();
    if ($user == null)
      return Redirect::back()->withErrors(['Данная почта незарегистрирована'])->withInput();
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      return redirect()->intended(route('products.index'));
    } else {
      return Redirect::back()->withErrors(['Неверный пароль'])->withInput();
    }
  }

  public function logout() {
    Auth::logout();
    return redirect('/');
  }
}
