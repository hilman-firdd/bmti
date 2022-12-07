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
    <link rel="stylesheet" href="{{asset('guest/pembelajaran.css')}}">
    @yield('custom-css')
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin/images/logo.png')}}" />

</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-5 col-lg-3 col-xl-2 ">
                    <div class="logo-header">
                        <a href="{{url('/')}}">
                            <img src="{{asset('guest/assets/images/logo-header.png')}}" width="150px" height="100px" />
                        </a>
                    </div>
                </div>

                <div class="col col-lg-2 col-xl-8 text-light text-header">
                    <p>Pelatihan Saya</p>
                </div>

                <div class="text-center col-4 col-md-3 col-lg-3 col-xl-2 text-light text-header-2">
                    <p id="text-hover">{{auth()->user()->name}}</p>

                    <div class="text-hover-pembelajaran">
                        <div id="text-hover-2" class="text-hover-2">
                            <div class="row">
                                <div class="col-2">
                                    <a href="{{url('/dashboard')}}">
                                        <i class="fa-solid fa-house-chimney"></i>
                                    </a>
                                </div>
                                <div class="col-10 text-start">
                                    <a href="{{url('/dashboard')}}" class="btn-lg" role="button"
                                        aria-pressed="true">Dashboard</a>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-2">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                                <div class="col-10 text-start">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class=" btn-lg" role="button" aria-pressed="true">Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2 menu-pembelajaran">
                    <div class="icon-pembelajaran" onclick="onClickMenu()"></div>
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
                        <p>Email : bbppmpv.bmti@kemdikbud.go.id</p>
                        <p>Tel/Wa : (022) 6652326 / 08112242326</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="mt-2 text-center col-6 copyright">
                    <span>© 2022 - Galeri Kenjuruan. All Rights Reserved.</span>
                </div>
                <div class="mt-2 text-center col-6 copyright">
                    <span>Term & Condition | Privacy Policy</span>
                </div>
            </div>
        </div>
    </footer>

    <div class="float-button-wrapper">
        <div class="float-button-page">
            <a href="#">
                <div class="img-share-1"></div>
            </a>
            <a href="#">
                <div class="img-share-2"></div>
            </a>
            <a href="#">
                <div class="img-share-3"></div>
            </a>
            <a href="#">
                <div class="img-share-4"></div>
            </a>
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

    <script>
    function onClickMenu() {
        $('#menu').attr('class', '');
    }

    function onClickCloseMenu() {
        $('#menu').attr('class', '');
        $('#menu').addClass('d-none');
    }

    function myFunctionMenu() {
        if (document.getElementById("icon-menu-1").src ==
            "{{asset('guest/assets/images/collapse-down.png')}}") {
            document.getElementById("icon-menu-1").src = "{{asset('guest/assets/images/collapse-up.png')}}";
        } else {
            document.getElementById("icon-menu-1").src =
                "{{asset('guest/assets/images/collapse-down.png')}}";
        }
        $('#materi-menu-1').attr('class', '');
        var x = document.getElementById("materi-menu-1");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    document.getElementById("text-hover").addEventListener('mouseover', function() {
        document.getElementById("text-hover-2").style.display = "block";
    });

    document.getElementById("text-hover-2").addEventListener('mouseover', function() {
        document.getElementById("text-hover-2").style.display = "block";
    });

    document.getElementById("text-hover-2").addEventListener('mouseleave', function() {
        document.getElementById("text-hover-2").style.display = "none";
    });

    document.getElementById("text-hover").addEventListener('mouseleave', function() {
        document.getElementById("text-hover-2").style.display = "none";
    });
    </script>

    <script type="text/javascript">
    Highcharts.chart('bar-2', {
        chart: {
            type: 'pie'
        },
        title: {
            text: ''
        },
        credits: {
            enabled: false
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:12px; fontFamily:glory;">{point.key}</span><table>',
            pointFormat: '<td style="padding:0;"><b>{point.percentage:.1f}%</b></td></tr>',
            footerFormat: '</table>',
            useHTML: true
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.percentage:.1f} %'
                },
                showInLegend: true,

                depth: 35,
                dataLabels: {
                    formatter: function() {
                        if (this.percentage != 0) return Math.round(this.percentage) + '%';
                    },
                    distance: -22,
                    style: {
                        color: 'white',
                        fontSize: '14px'
                    }
                }
            }
        },
        series: [{
            innerSize: '50%',
            data: [
                ['Complete', 10],
                ['Non Complete', 8],
            ],
            colors: ['#2289FF', '#E0DECA']
        }]
    });
    </script>
</body>

</html>

<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-2">
            <div class="logo-header">
                <a href="{{url('/')}}">
                    <img src="{{asset('guest/assets/images/logo-header.png')}}" width="150px" height="100px" />
                </a>
            </div>
        </div>

        <div class="col-2 text-light">
            <p class="text-header">Pelatihan Saya</p>
        </div>

        <div class="col-6"></div>

        <div class="text-center col-2 text-light">
            <p id="text-hover" class="text-header-2">{{auth()->user()->name}}</p>
            <div id="text-hover-2" class="text-hover-2">
                <div class="row">
                    <div class="col-2">
                        <a href="{{url('/dashboard')}}">
                            <i class="fa-solid fa-house-chimney"></i>
                        </a>
                    </div>
                    <div class="col-10 text-start">
                        <a href="{{url('/dashboard')}}" class="btn-lg" role="button" aria-pressed="true">Dashboard</a>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-2">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="col-10 text-start">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class=" btn-lg" role="button" aria-pressed="true">Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="order-3 mt-4 col-2 icon-menu d-none">
            <div class="icon-menu-2" onclick="onClickMenu()"></div>
        </div>
    </div>
</div> -->