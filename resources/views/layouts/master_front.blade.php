<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <link rel="shortcut icon" href="{{asset('guest/assets/images/logo.png')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Glory&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('guest/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/global.css')}}">
    <link rel="stylesheet" href="{{asset('guest/responsive.css')}}"> @yield('custom-css')
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin/images/logo.png')}}" />
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-7 col-md-9 col-lg-2 col-xl-2 order-1">
                    <div class="logo-header">
                        <a href="/">
                            <img src="{{asset('guest/assets/images/logo-header.png')}}" width="150px" height="100px" />
                        </a>
                    </div>
                </div>

                <div class="col-12 col-lg-9 col-xl-9 order-4 order-lg-2 order-xl-2">
                    <div class="menu">
                        <ul class="nav">
                            <li class="margin-nav">
                                <a href="{{url('/')}}">
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/galeria')}}">Galeria</a>
                            </li>
                            <li>
                                <a href="{{url('/pelatihan-mandiri')}}">Pelatihan Mandiri</a>
                            </li>
                            <li>
                                <input class="collapse-mandiri" type="checkbox" id="collapse-mandiri" />
                                <label for="collapse-mandiri">Pelatihan Terbimbing</label>
                                <div class="mandiri-hidden-1 font-italic">
                                    <a href="{{url('/')}}">- Upskilling dan Reskilling</a>
                                </div>
                                <div class="mandiri-hidden-2">
                                    <a href="{{url('/')}}">- Peningkatan Kompetensi &nbsp;&nbsp;&nbsp;Berkelanjutan</a>
                                </div>
                                <div class="mandiri-hidden-3">
                                    <a href="{{url('/')}}">- Suplemen Kompetensi &nbsp;&nbsp;&nbsp;Keahlian</a>
                                </div>
                            </li>
                            <li>
                                <a href="{{url('/alur-pembelajaran')}}">Alur Pembelajaran</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-3 col-md-2 col-lg-1 col-xl-1 order-2 order-lg-3 order-xl-3">
                    <div class="akun-button text-center">
                        @if(auth()->user())
                        <a href="{{url('/dashboard')}}" class="btn-lg" role="button" aria-pressed="true">Dashboard</a>
                        @else
                        <a onclick="onClickLogin()" class="btn-lg">LOGIN</a> 
                        @endif
                    </div>
                </div>

                <div class="col-2 col-md-1 col-xl-1 order-3 icon-menu mt-4">
                    <div class="icon-menu-2" onclick="onClickMenu()"></div>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="logo-footer">
                        <a href="">
                            <img src="{{asset('guest/assets/images/logo-header.png')}}" width="170px" height="110px" />
                        </a>
                        <h1>Sahabat Cerdas</h1>
                    </div>
                </div>

                <div class="col-1">
                    <div class="share">
                        <a href="{{url('https://www.facebook.com/bmti.kemdikbud/')}}" target="_blank">
                            <img class="icon-share" src="{{asset('guest/assets/images/fb-1.png')}}" height="30px"
                                width="30px" />
                        </a>
                        <br />
                        <a href="{{url('https://twitter.com/bmti_kemdikbud')}}" target="_blank">
                            <img class="icon-share" src="{{asset('guest/assets/images/twitter-1.png')}}" height="30px"
                                width="30px" />
                        </a>
                        <br />
                        <a href="{{url('https://www.instagram.com/bmti.kemdikbud/')}}" target="_blank">
                            <img class="icon-share" src="{{asset('guest/assets/images/ig-1.png')}}" height="30px"
                                width="30px" />
                        </a>
                        <br />
                        <a href="{{url('')}}" target="_blank">
                            <img class="icon-share" src="{{asset('guest/assets/images/telegram.png')}}" height="30px"
                                width="30px" />
                        </a>
                    </div>
                </div>

                <div class="col-2">
                    <div class="text-1">
                        <span>Useful links</span>
                        <a href="">
                            <p>About</p>
                        </a>
                        <a href="">
                            <p>Partners</p>
                        </a>
                        <a href="">
                            <p>Contact</p>
                        </a>
                    </div>
                </div>

                <div class="col-2">
                    <div class="text-2">
                        <span>Help?</span>
                        <a href="">
                            <p>FAQ</p>
                        </a>
                        <a href="">
                            <p>Term & Condition</p>
                        </a>
                        <a href="">
                            <p>Policy</p>
                        </a>
                        <a href="">
                            <p>Privacy</p>
                        </a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="address">
                        <span>Alamat</span>
                        <a href="{{url('https://g.page/BBPPMPV-BMTI?share')}}" target="_blank">
                            <p>BBPPMPV Bidang Mesin dan Teknik Industri</p>
                            <p>(BBPPMPV BMTI), Jl. Pesantren KM 2, Cibabat, Cimahi Utara 40513.</p>
                        </a>
                        <p>Email : <a href="mailto:bbppmpv.bmti@kemdikbud.go.id">bbppmpv.bmti@kemdikbud.go.id</a></p>
                        <p>Tel/Wa : <a href="tel:(022) 6652326">(022) 6652326</a> / <a href="{{url('https://wa.me/+628112242326')}}" target="_blank">08112242326</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 copyright text-center mt-2">
                    <span>© 2022 - Galeri Kenjuruan. All Rights Reserved.</span>
                </div>
                <div class="col-6 copyright text-center mt-2">
                    <span>Term & Condition | Privacy Policy</span>
                </div>
            </div>
        </div>
    </footer>

    <div class="float-button-wrapper">
        <div class="float-button-page">
            <a href="{{url('https://www.facebook.com/bmti.kemdikbud/')}}" target="_blank">
                <div class="img-share-1"></div>
            </a>
            <a href="{{url('https://www.instagram.com/bmti.kemdikbud/')}}" target="_blank">
                <div class="img-share-2"></div>
            </a>
            <a href="{{url('https://twitter.com/bmti_kemdikbud')}}" target="_blank">
                <div class="img-share-3"></div>
            </a>
            <a href="{{url('https://www.youtube.com/channel/UCKH7TY5zOLIa5uWYpDgZWjQ')}}" target="_blank">
                <div class="img-share-4"></div>
            </a>
        </div>
    </div>

    <div id="menu" class="d-none">
        <div class="menu-container">
            <div class="menu-2">
                <div class="d-flex justify-content-end">
                    <div class="col-2">
                        <div class="icon-menu-hover" onclick="onClickCloseMenu()"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav">
                            <li>
                                <a href="{{url('/')}}">Beranda</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav">
                            <li>
                                <a href="{{url('/galeria')}}">Galeria</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav">
                            <li>
                                <a href="{{url('/pelatihan-mandiri')}}">Pelatihan Mandiri</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav">
                            <li>
                                <input class="collapse-mandiri-2" type="checkbox" id="collapse-mandiri-2" />
                                <label for="collapse-mandiri-2">Pelatihan Terbimbing</label>
                                <div class="mandiri-hidden-1 font-italic">
                                    <a href="">- Upskilling dan Reskilling</a>
                                </div>
                                <div class="mandiri-hidden-2">
                                    <a href="">- Peningkatan Kompetensi &nbsp;&nbsp;&nbsp;Berkelanjutan</a>
                                </div>
                                <div class="mandiri-hidden-3">
                                    <a href="">- Suplemen Kompetensi &nbsp;&nbsp;&nbsp;Keahlian</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav">
                            <li>
                                <a href="{{url('/alur-pembelajaran')}}">Alur Pembelajaran</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="login" class="d-none">
        <div class="bg-login">
            <!-- Validation Errors -->
            <div class="d-flex">
                <x-auth-validation-errors id="error" class="text-popup mb-4 text-center bg-white rounded"
                    :errors="$errors" />
            </div>

            <!-- Session Status -->
            <div class="d-flex">
                <x-auth-session-status class="text-popup mb-4 text-center bg-white rounded"
                    :status="session('status')" />

                <div class="login-container">
                    <div class="d-flex">
                        <div class="left-box mt-4">
                            <div class="button-mini">
                                <div class="row justify-content-end">
                                    <button class="btn-mini btn-danger btn-sm btn-circle"
                                        onclick="onClickCloseLogin()">X</button>
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
                                        placeholder="Masukan Username / E-mail" type="email" name="email"
                                        :value="old('email')" required autofocus />
                                </div>
                                <div class="icon-user-login">
                                    <i class="user float-end fa-solid fa-user"></i>
                                </div>

                                <!-- Password -->
                                <div class="form-login mt-5">
                                    <input id="passwor" class="block mt-1 w-full" placeholder="Masukan Password"
                                        type="password" name="password" required autocomplete="current-password" />
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
                                        <div class="clik-LupaPassword" onclick="onClickLupaPassword()">Lupa Password ?
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

                            <div class="row text-center mt-2 clik-register">
                                <span>Belum Memiliki Akun ?<span>
                                        <button onclick="onClickRegister()">Daftar</button>
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
                                    <button class="btn-closed btn-danger btn-sm btn-circle"
                                        onclick="onClickCloseLogin()">X</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="register" class="d-none">
        <div class="bg-register">
            <!-- Validation Errors -->
            <div class="d-flex">
                <x-auth-validation-errors id="error" class="text-popup mb-4 text-center bg-white rounded"
                    :errors="$errors" />
            </div>

            <div class="d-flex">
                <div class="register-container">
                    <div class="d-flex">
                        <div class="left-box mt-2">
                            <div class="button-mini">
                                <div class="row justify-content-end">
                                    <button class="btn-mini-2 btn-danger btn-sm btn-circle"
                                        onclick="onClickCloseRegister()">X</button>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <a href="{{url('/')}}">
                                        <img class="logo-login" src="{{asset('guest/assets/images/logo-header.png')}}"
                                            width="140px" height="100px" />
                                    </a>
                                    <h2 class="login-title">DAFTAR</h2>
                                </div>
                            </div>
                            <div id="error"></div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- FirstName -->
                                <div class="form-login">
                                    <input id="firstName" class="block mt-1 w-full" placeholder="Masukan Nama Depan"
                                        type="text" name="firstName" :value="old('firstName')" required autofocus />
                                    <i class="d-none icon-alert-1 text-danger fa-solid fa-circle-exclamation"
                                        style="font-size:15px; margin-top:5px;"></i>
                                    <span class="d-none firstName-alert text-danger"
                                        style="margin-left:5px; font-family:glory; font-size:15px;"></span>
                                </div>

                                <!-- LastName -->
                                <div class="form-login mt-2">
                                    <input id="lastName" class="block mt-1 w-full" placeholder="Masukan Nama Belakang"
                                        type="text" name="lastName" :value="old('lastName')" required autofocus />
                                    <i class="d-none icon-alert-2 text-danger fa-solid fa-circle-exclamation"
                                        style="font-size:15px; margin-top:5px;"></i>
                                    <span class="d-none lastName-alert text-danger"
                                        style="margin-left:5px; font-family:glory; font-size:15px;"></span>
                                </div>

                                <!-- NIK -->
                                <div class="form-login mt-2">
                                    <input id="nik" class="block mt-1 w-full" placeholder="Masukan NIK" type="number"
                                        name="nik" :value="old('nik')" required autofocus />
                                    <i class="d-none icon-alert-3 text-danger fa-solid fa-circle-exclamation"
                                        style="font-size:15px; margin-top:5px;"></i>
                                    <span class="d-none nik-alert text-danger"
                                        style="margin-left:5px; font-family:glory; font-size:15px;"></span>
                                </div>

                                <!-- NUPTK -->
                                <div class="form-login mt-2">
                                    <input id="nuptk" class="block mt-1 w-full" placeholder="Masukan NUPTK"
                                        type="number" name="nuptk" :value="old('nuptk')"/>
                                    <i class="d-none icon-alert-4 text-danger fa-solid fa-circle-exclamation"
                                        style="font-size:15px; margin-top:5px;"></i>
                                    <span class="d-none nuptk-alert text-danger"
                                        style="margin-left:5px; font-family:glory; font-size:15px;"></span>
                                </div>

                                <!-- Email Address -->
                                <div class="form-login mt-2">
                                    <input id="email" class="block mt-1 w-full" placeholder="Masukan E-mail"
                                        type="email" name="email" :value="old('email')" required />
                                    <i class="d-none icon-alert-5 text-danger fa-solid fa-circle-exclamation"
                                        style="font-size:15px; margin-top:5px;"></i>
                                    <span class="d-none email-alert text-danger"
                                        style="margin-left:5px; font-family:glory; font-size:15px;"></span>
                                </div>

                                <!-- Password -->
                                <div class="form-login mt-2">
                                    <input id="password" class="block mt-1 w-full" placeholder="Masukan Password"
                                        type="password" name="password" autocomplete="new-password" required />
                                    <i class="d-none icon-alert-6 text-danger fa-solid fa-circle-exclamation"
                                        style="font-size:15px; margin-top:5px;"></i>
                                    <span class="d-none password-alert text-danger"
                                        style="margin-left:5px; font-family:glory; font-size:15px;"></span>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-login mt-2">
                                    <input id="password_confirmation" class="block mt-1 w-full"
                                        placeholder="Konfirmasi Password" type="password" name="password_confirmation"
                                        required />
                                    <i class="d-none icon-alert-7 text-danger fa-solid fa-circle-exclamation"
                                        style="font-size:15px; margin-top:5px;"></i>
                                    <span class="d-none password_confirmation-alert text-danger"
                                        style="margin-left:5px; font-family:glory; font-size:15px;"></span>
                                </div>

                                <div class="d-flex justify-content-end mt-2 clik-sudah-daftar">
                                    <button onclick="onClickDaftar()">Sudah Terdaftar ?</button>
                                </div>

                                <div class="row text-center mt-2 clik-daftar">
                                    <button type="submit" class="btn-login rounded-pill text-dark font-weight-bold">
                                        {{ __('Daftar') }}
                                    </button>
                                </div>
                            </form>
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
                                    <button class="btn-closed btn-danger btn-sm btn-circle"
                                        onclick="onClickCloseRegister()">X</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="LupaPassword" class="d-none">
        <div class="bg-LupaPassword">
            <!-- Validation Errors -->
            <div class="d-flex">
                <x-auth-validation-errors id="error" class="text-popup mb-4 text-center bg-white rounded"
                    :errors="$errors" />
            </div>

            <!-- Session Status -->
            <div class="d-flex">
                <x-auth-session-status class="text-popup mb-4 text-center bg-white rounded"
                    :status="session('status')" />
            </div>

            <div class="d-flex">
                <div class="LupaPassword-container">
                    <div class="d-flex">
                        <div class="left-box mt-4">
                            <div class="button-mini">
                                <div class="row justify-content-end">
                                    <button class="btn-mini btn-danger btn-sm btn-circle"
                                        onclick="onClickCloseLupaPassword()">X</button>
                                </div>
                            </div>
                            <a href="{{url('/')}}">
                                <img class="logo-login" src="{{asset('guest/assets/images/logo-header.png')}}"
                                    width="140px" height="100px" />
                            </a>
                            <div class="text-forget text-center mb-4 mt-5 text-sm text-gray-600">
                                {{ __('Lupa kata sandi anda? Tidak masalah. Cukup beri tahu kami alamat email anda dan kami akan mengirim email kepada anda tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang baru.') }}
                            </div>

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="form-login mt-5">
                                    <input id="emailll" class="block mt-1 w-full" placeholder="Masukan E-mail"
                                        type="email" name="email" :value="old('email')" required autofocus />
                                </div>
                                <div class="icon-user-login">
                                    <i class="user float-end fa-solid fa-user"></i>
                                </div>

                                <div class="d-flex justify-content-center clik-forget mt-5">
                                    <button class="btn-forget rounded-pill text-dark font-weight-bold">
                                        {{ __('Email Password Reset Link') }}
                                    </button>
                                </div>
                            </form>
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
                                    <button class="btn-closed btn-danger btn-sm btn-circle"
                                        onclick="onClickCloseLupaPassword()">X</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="{{asset('guest/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('script')
    <!-- <script>
        $("#password").focusout(function(){ 
            let password = $('#password').val()
            if(password.length < 8) {
                $('.password-alert').removeClass('d-none')
                $('.password-alert').text('Password kurang dari 8 dan harus mengandung symbol, angka dan sebagainya')

            }else{
                $('.password-alert').addClass('d-none')
            }
        });

        function onClickRegister() {
        $('#login').addClass('d-none');
            $('#register').attr('class', '');
        }

        function onClickLogin() {
            $('#login').attr('class', '');
        }
    </script> -->
    <script>
    $(function($) {
        let url = window.location.href;
        $('.nav li a').each(function() {
            if (this.href === url) {
                $(this).closest('a').addClass('active');
            }
        });
    });

    //validasi register
    $("#firstName").keyup(function() {
        let firstName = $('#firstName').val()
        if (firstName == "") {
            $('.firstName-alert').removeClass('d-none')
            $('.firstName-alert').text(
                'Nama Depan Tidak Boleh Kosong')
            $('.icon-alert-1').removeClass('d-none')

        } else {
            $('.firstName-alert').addClass('d-none')
            $('.icon-alert-1').addClass('d-none')
        }
    });

    $("#lastName").keyup(function() {
        let lastName = $('#lastName').val()
        if (lastName == "") {
            $('.lastName-alert').removeClass('d-none')
            $('.lastName-alert').text(
                'Nama Belakang Tidak Boleh Kosong')
            $('.icon-alert-2').removeClass('d-none')

        } else {
            $('.lastName-alert').addClass('d-none')
            $('.icon-alert-2').addClass('d-none')
        }
    });

    $("#nik").keyup(function() {
        let nik = $('#nik').val()
        if (nik.length != 16) {
            $('.nik-alert').removeClass('d-none')
            $('.nik-alert').text(
                'NIK Tidak Valid')
            $('.icon-alert-3').removeClass('d-none')

        } else {
            $('.nik-alert').addClass('d-none')
            $('.icon-alert-3').addClass('d-none')
        }
    });

    // $("#nuptk").keyup(function() {
    //     let nuptk = $('#nuptk').val()
    //     if (nuptk.length != 16) {
    //         $('.nuptk-alert').removeClass('d-none')
    //         $('.nuptk-alert').text(
    //             'NUPTK Tidak Valid')
    //         $('.icon-alert-4').removeClass('d-none')

    //     } else {
    //         $('.nuptk-alert').addClass('d-none')
    //         $('.icon-alert-4').addClass('d-none')
    //     }
    // });

    $("#email").keyup(function() {
        let email = $('#email').val()
        let atps = email.indexOf("@")
        let dots = email.lastIndexOf(".")
        if (atps < 1 || dots < atps + 2 || dots + 2 >= email.length) {
            $('.email-alert').removeClass('d-none')
            $('.email-alert').text(
                'Email Tidak Valid')
            $('.icon-alert-5').removeClass('d-none')

        } else {
            $('.email-alert').addClass('d-none')
            $('.icon-alert-5').addClass('d-none')
        }
    });

    $("#password").keyup(function() {
        let password = $('#password').val()
        if (password.length < 8) {
            $('.password-alert').removeClass('d-none')
            $('.password-alert').text(
                'Password kurang dari 8 karakter')
            $('.icon-alert-6').removeClass('d-none')

        } else {
            $('.password-alert').addClass('d-none')
            $('.icon-alert-6').addClass('d-none')
        }
    });

    $("#password_confirmation").keyup(function() {
        let password_confirmation = $('#password_confirmation').val()
        let password = $('#password').val()
        if (password_confirmation != password) {
            $('.password_confirmation-alert').removeClass('d-none')
            $('.password_confirmation-alert').text(
                'Konfirmasi password salah')
            $('.icon-alert-7').removeClass('d-none')

        } else {
            $('.password_confirmation-alert').addClass('d-none')
            $('.icon-alert-7').addClass('d-none')
        }
    });

    // menu, login, register & lupa password
    function onClickMenu() {
        $('#menu').attr('class', '');
    }

    function onClickCloseMenu() {
        $('#menu').attr('class', '');
        $('#menu').addClass('d-none');
    }

    function onClickLogin() {
        $('#login').attr('class', '');
    }

    function onClickCloseLogin() {
        $('#login').addClass('d-none');
    }

    function onClickRegister() {
        $('#login').addClass('d-none');
        $('#register').attr('class', '');
    }

    function onClickCloseRegister() {
        $('#register').addClass('d-none');
    }

    function onClickDaftar() {
        $('#register').addClass('d-none');
        $('#login').attr('class', '');
    }

    function onClickLupaPassword() {
        $('#login').addClass('d-none');
        $('#LupaPassword').attr('class', '');
    }

    function onClickCloseLupaPassword() {
        $('#LupaPassword').addClass('d-none');
    }

    // function validasi() {
    //     var firstName = document.getElementById("firstName").value;
    //     var lastName = document.getElementById("lastName").value;
    //     var nik = document.getElementById("nik").value;
    //     var nuptk = document.getElementById("nuptk").value;
    //     var email = document.getElementById("email").value;
    //     var password = document.getElementById("password").value;
    //     var password_confirmation = document.getElementById("password_confirmation").value;

    //     if (nik.length != 16) {
    //         alert('NIK Tidak Valid');
    //     } else {
    //         return true;
    //     }
    //     if (nuptk.length != 16) {
    //         alert('NUPTK Tidak Valid')
    //     } else {
    //         return true;
    //     }
    //     if (password.length < 8 || password.length > 16) {
    //         alert('Password Tidak Boleh Kurang dari 8 dan Tidak Boleh Lebih dari 16')
    //     } else {
    //         return true;
    //     }
    //     if (password_confirmation != password) {
    //         alert('Konfirmasi Password Salah')
    //     } else {
    //         return true;
    //     }
    // }
    </script>
</body>

</html>