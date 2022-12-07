<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('admin/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/typicons/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/css/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </link>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/js/select.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('guest/assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admin/images/logo.png')}}" />
    <style>
    .mdi-file-import {
        font-size: 20px;
    }
    </style>

    @yield('custom-css')

</head>

<body>

    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="flex-row p-0 navbar default-layout col-lg-12 fixed-top d-flex align-items-top">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <!-- {{asset('')}} -->
                    <a class="navbar-brand brand-logo" href="{{route('dashboard')}}">
                        <img src="{{asset('admin/images/logo.png')}}" alt="logo" width="250" height="100" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="{{route('dashboard')}}">
                        <img src="{{asset('admin/images/logo.png')}}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Selamat Datang, <span class="text-black fw-bold"
                                style="text-transform: capitalize;">{{auth()->user()->name}}</span></h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="{{asset('admin/images/faces/face8.jpg')}}"
                                alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="text-center dropdown-header">
                                <img class="img-xs rounded-circle" src="{{asset('admin/images/faces/face8.jpg')}}"
                                    alt="Profile image">
                                <p class="mt-3 mb-1 font-weight-semibold">{{auth()->user()->name}}</p>
                                <p class="mb-0 fw-light text-muted">{{auth()->user()->email}}</p>
                            </div>

                            @if (auth()->user()->role_id == 5)
                            <a class="dropdown-item" href="{{route('profilPeserta.edit', ['id'=>$id_peserta->id])}}"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile
                            </a>
                            @elseif (auth()->user()->role_id == 4)
                            <a class="dropdown-item" href="{{route('profilEvaluator.edit', ['id'=>$id_peserta->id])}}"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile
                            </a>
                            @else
                            
                            <a class="dropdown-item"><i
                                    class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile
                            </a>

                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="border img-ss rounded-circle bg-light me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="border img-ss rounded-circle bg-dark me-3"></div>Dark
                    </div>
                    <p class="mt-2 settings-heading">HEADER SKINS</p>
                    <div class="px-4 mx-0 color-tiles">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab"
                            aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="px-3 mb-0 add-items d-flex">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="px-3 list-wrapper">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="px-3 mt-5 mb-0 text-muted fw-light">Events</h4>
                        <div class="px-3 pt-4 events">
                            <div class="mb-2 wrapper d-flex">
                                <i class="ti-control-record text-primary me-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="mb-0 text-gray">The total number of sessions</p>
                        </div>
                        <div class="px-3 pt-4 events">
                            <div class="mb-2 wrapper d-flex">
                                <i class="ti-control-record text-primary me-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="mb-0 text-gray ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="pt-0 pb-0 pl-3 mb-3 settings-heading border-top-0 border-bottom-0">Friends</p>
                            <small
                                class="pt-0 pb-0 pr-3 mb-3 settings-heading border-top-0 border-bottom-0 fw-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="my-auto text-muted">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="mx-2 my-auto badge badge-success badge-pill">4</div>
                                <small class="my-auto text-muted">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="my-auto text-muted">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="my-auto text-muted">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="my-auto text-muted">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="my-auto text-muted">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">
                            <i class="mdi mdi-grid-large menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    @if(auth()->user()->role_id == 4)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('masterListData')}}">
                            <i class="menu-icon mdi mdi-file-import"></i>
                            <span class="menu-title">Data Import</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('evaluasi.index')}}">
                            <i class="menu-icon mdi mdi-file-import"></i>
                            <span class="menu-title">Sertifikat Peserta</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('testimoni')}}">
                            <i class="menu-icon mdi mdi-file-import"></i>
                            <span class="menu-title">Data Testimoni</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->role_id == 5)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('peserta.pelatihan.enrolled')}}">
                            <i class="menu-icon mdi mdi-file-import"></i>
                            <span class="menu-title">Pelatihan Saya</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('peserta.pelatihan.katalog')}}">
                            <i class="menu-icon mdi mdi-file-import"></i>
                            <span class="menu-title">Katalog</span>
                        </a>
                    </li>
                    @endif
                    @if(auth()->user()->role_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-account"></i>
                            <span class="menu-title">Pengguna</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('users')}}">
                                        Pengguna</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('roles')}}">
                                        Role</a>
                                </li>
                                <!-- <li class="nav-item"> <a class="nav-link"
                                        href="pages/ui-features/typography.html">Typography</a>
                                </li> -->
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#galeria" aria-expanded="false"
                            aria-controls="galeria">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Galeria</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="galeria">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('kompetensi')}}">
                                        Kategori</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('dataKeahlian')}}">
                                        Komptensi Keahlian</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#master-data" aria-expanded="false"
                            aria-controls="master-data">
                            <i class="menu-icon mdi mdi-card-text-outline"></i>
                            <span class="menu-title">Master Data</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="master-data">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('jenisKegiatan')}}">
                                        Jenis Kegiatan
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('programKegiatan')}}">
                                        Program / Kegiatan
                                    </a></li>
                                <!-- <li class="nav-item"> <a class="nav-link" href="{{route('jenisKursus')}}">
                                        Jenis Pelatihan
                                    </a></li> -->
                                <li class="nav-item"> <a class="nav-link" href="{{route('bidangKeahlian')}}">
                                        Bidang Keahlian
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('programKeahlian')}}">
                                        Program Keahlian
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('kelompokKeahlian')}}">
                                        Kelompok Keahlian
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('kelurahan')}}">
                                        Desa Kelurahan
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('kecamatan')}}">
                                        Kecamatan
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('kota')}}">
                                        Kota Kabupaten
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('provinsi')}}">
                                        Provinsi
                                    </a></li>
                            </ul>
                        </div>
                    </li>
                    @endif  
                    @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 3)
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#pelatihan" aria-expanded="false"
                            aria-controls="pelatihan">
                            <i class="menu-icon mdi mdi-table"></i>
                            <span class="menu-title">Pelatihan Mandiri</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="pelatihan">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('pelatihan')}}">Pelatihan
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('quiz')}}">Bank Soal
                                    </a></li>
                                <li class="nav-item"> <a class="nav-link"
                                        href="{{route('sertifikat.index')}}">Sertifikat
                                    </a></li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(auth()->user()->role_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#peserta" aria-expanded="false"
                            aria-controls="peserta">
                            <i class="menu-icon mdi mdi-layers-outline"></i>
                            <span class="menu-title">Peserta</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="peserta">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('peserta')}}">Daftar Peserta</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    @if(auth()->user()->role_id == 1)
                    <li class="nav-item nav-category">CMS</li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#mitra" aria-expanded="false"
                            aria-controls="mitra">
                            <i class="menu-icon mdi mdi-layers-outline"></i>
                            <span class="menu-title">Mitra</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <i class="menu-arrow"></i>
                        <div class="collapse" id="mitra">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('perusahaanMitra')}}">Perusahaan
                                        Mitra</a></li>

                            </ul>
                        </div>
                    </li>
                    @endif
                </ul>
            </nav>
            <div class="main-panel">
                @yield('content')
                <!-- <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="float-none mt-1 text-center float-sm-right d-block mt-sm-0">Copyright © 2022. All
                            rights reserved.</span>
                    </div>
                </footer> -->
            </div>
            <!-- partial -->
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <!-- plugins:js -->
    <script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('admin/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('admin/vendors/progressbar.js/progressbar.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('admin/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/js/template.js')}}"></script>
    <script src="{{asset('admin/js/settings.js')}}"></script>
    <script src="{{asset('admin/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('admin/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/js/Chart.roundedBarCharts.js')}}"></script>
    <!-- End custom js for this page-->

    @yield('script')
</body>

</html>