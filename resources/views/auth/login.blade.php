<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BMTI - Login</title>
    <link rel="shortcut icon" href="{{asset('guest/assets/images/logo.png')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Glory&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('guest/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/global.css')}}">
    <link rel="stylesheet" href="{{asset('guest/responsive.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin/images/logo.png')}}" />
</head>

<div class="bg-login">
    <!-- Validation Errors -->
    <div class="d-flex">
        <x-auth-validation-errors id="error" class="text-popup mb-4 text-center bg-white rounded" :errors="$errors" />
    </div>

    <!-- Session Status -->
    <div class="d-flex">
        <x-auth-session-status class="text-popup mb-4 text-center bg-white rounded" :status="session('status')" />

        <div class="login-container">
            <div class="d-flex">
                <div class="left-box mt-4">
                    <div class="button-mini">
                        <div class="row justify-content-end">
                            <button class="btn-mini btn-danger btn-sm btn-circle"><a href="{{url('/')}}"
                                    style="text-decoration:none; color:white; font-size:10px;">X</a></button>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <a href="{{url('/')}}">
                                <img class="logo-login" src="{{asset('guest/assets/images/logo-header.png')}}"
                                    width="140px" height="100px" />
                            </a>
                            <h2 class="login-title">LOGIN</h2>
                        </div>
                    </div>

                    <form class="mt-5" method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-login">
                            <input class="email" id="email_login" class="block mt-1 w-full"
                                placeholder="Masukan Username / E-mail" type="email" name="email" :value="old('email')"
                                required autofocus />
                        </div>
                        <div class="icon-user-login">
                            <i class="user float-end fa-solid fa-user"></i>
                        </div>

                        <!-- Password -->
                        <div class="form-login mt-5">
                            <input id="passwor" class="block mt-1 w-full" placeholder="Masukan Password" type="password"
                                name="password" required autocomplete="current-password" />
                        </div>
                        <div class="icon-password-login">
                            <i class="fa-solid fa-lock"></i>
                        </div>

                        <!-- Remember Me -->
                        <div class="row justify-content-between mt-3">
                            <div class="col-5">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox"
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="col-4 col-sm-3 col-md-5 col-lg-4 col-xl-3">
                                <div class="clik-LupaPassword">
                                    <a href="{{url('/forgot-password')}}" style="text-decoration:none;">Lupa Password
                                        ?</a>
                                </div>
                            </div>
                        </div>

                        <div class="row text-center mt-5">
                            <button class="btn-login rounded-pill text-dark font-weight-bold">
                                {{ __('Masuk') }}
                            </button>

                        </div>

                        <div class="row text-center mt-3">
                            <p>Atau</p>
                        </div>
                    </form>

                    <div class="row text-center mt-2 clik-register-2">
                        <span>Belum Memiliki Akun ?<span>
                                <a href="{{url('/register')}}">Daftar</a>
                    </div>
                </div>
                <div class="right-box">
                    <div class="row pt-3">
                        <div class="col-5 d-flex">
                            <div class="row mt-3">
                                <div class="col-sm-12 col-xl-5 logo-login-right-1">
                                    <img src="{{asset('guest/assets/images/logo-kemdikbud.png')}}" width="70px"
                                        height="70px" />
                                </div>
                                <div class="col-12 col-xl-7 text-logo-right-1 mt-1">
                                    <span>Kementrian Pendidikan, Kebudayaan, Riset dan Teknologi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 d-flex">
                            <div class="row mt-3">
                                <div class="col-12 col-xl-5 logo-login-right-2">
                                    <img src="{{asset('guest/assets/images/logo-bmti.png')}}" width="70px"
                                        height="70px" />
                                </div>
                                <div class="col-12 col-xl-7 text-logo-right-2 mt-1">
                                    <span>BBPPMPV BMTI <br /> Bidang Mesin dan Teknik Industri</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 d-flex">
                            <a href="{{url('/')}}"><button class="btn-closed btn-danger btn-sm btn-circle">X</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>