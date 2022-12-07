<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BMTI - Lupa Password</title>
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

<div class="bg-LupaPassword">
    <!-- Validation Errors -->
    <div class="d-flex">
        <x-auth-validation-errors id="error" class="text-popup mb-4 text-center bg-white rounded" :errors="$errors" />
    </div>

    <!-- Session Status -->
    <div class="d-flex">
        <x-auth-session-status class="text-popup mb-4 text-center bg-white rounded" :status="session('status')" />
    </div>

    <div class="d-flex">
        <div class="LupaPassword-container">
            <div class="d-flex">
                <div class="left-box mt-4">
                    <div class="button-mini">
                        <div class="row justify-content-end">
                            <button class="btn-mini btn-danger btn-sm btn-circle"><a href="{{url('/')}}"
                                    style="text-decoration:none; color:white; font-size:10px;">X</a></button>
                        </div>
                    </div>
                    <a href="{{url('/')}}">
                        <img class="logo-login" src="{{asset('guest/assets/images/logo-header.png')}}" width="140px"
                            height="100px" />
                    </a>
                    <div class="text-forget text-center mb-4 mt-5 text-sm text-gray-600">
                        {{ __('Lupa kata sandi anda? Tidak masalah. Cukup beri tahu kami alamat email anda dan kami akan mengirim email kepada anda tautan pengaturan ulang kata sandi yang memungkinkan Anda memilih yang baru.') }}
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-login mt-5">
                            <input id="emailll" class="block mt-1 w-full" placeholder="Masukan E-mail" type="email"
                                name="email" :value="old('email')" required autofocus />
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
                            <a href="{{url('/')}}"><button
                                    class="btn-closed btn-danger btn-sm btn-circle">X</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>