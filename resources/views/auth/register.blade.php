<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BMTI - Register</title>
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

<div class="bg-register">
    <!-- Validation Errors -->
    <div class="d-flex">
        <x-auth-validation-errors id="error" class="text-popup mb-4 text-center bg-white rounded" :errors="$errors" />
    </div>

    <div class="d-flex">
        <div class="register-container">
            <div class="d-flex">
                <div class="left-box mt-2">
                    <div class="button-mini">
                        <div class="row justify-content-end">
                            <button class="btn-mini-2 btn-danger btn-sm btn-circle"><a href="{{url('/')}}"
                                    style="text-decoration:none; color:white; font-size:10px;">X</a></button>
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
                            <input id="firstName" class="block mt-1 w-full" placeholder="Masukan Nama Depan" type="text"
                                name="firstName" :value="old('firstName')" required autofocus />
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
                            <input id="nik" class="block mt-1 w-full" placeholder="Masukan NIK" type="number" name="nik"
                                :value="old('nik')" required autofocus />
                            <i class="d-none icon-alert-3 text-danger fa-solid fa-circle-exclamation"
                                style="font-size:15px; margin-top:5px;"></i>
                            <span class="d-none nik-alert text-danger"
                                style="margin-left:5px; font-family:glory; font-size:15px;"></span>
                        </div>

                        <!-- NUPTK -->
                        <div class="form-login mt-2">
                            <input id="nuptk" class="block mt-1 w-full" placeholder="Masukan NUPTK" type="number"
                                name="nuptk" :value="old('nuptk')"/>
                            <i class="d-none icon-alert-4 text-danger fa-solid fa-circle-exclamation"
                                style="font-size:15px; margin-top:5px;"></i>
                            <span class="d-none nuptk-alert text-danger"
                                style="margin-left:5px; font-family:glory; font-size:15px;"></span>
                        </div>

                        <!-- Email Address -->
                        <div class="form-login mt-2">
                            <input id="email" class="block mt-1 w-full" placeholder="Masukan E-mail" type="email"
                                name="email" :value="old('email')" required />
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
                            <a href="{{url('/login')}}">Sudah Terdaftar ?</a>
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
                            <a href="{{url('/')}}"><button
                                    class="btn-closed btn-danger btn-sm btn-circle">X</button></a>
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
<script>
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
</script>