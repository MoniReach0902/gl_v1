<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> GL</title>

    {{-- Google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('public/images/gl_logo.png') }}" type="image/x-icon" />

    <!-- Icons css -->
    <link href="{{ asset('public/assets/css/icons.css') }}" rel="stylesheet">

    <!--  bootstrap css-->
    <link id="style" href="{{ asset('public/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- style css -->
    {{-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style-transparent.css') }}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('public/assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- Animations css-->
    <link href="{{ asset('public/assets/css/animate.css') }}" rel="stylesheet">

    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('public/assets/switcher/css/switcher.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/switcher/demo.css') }}" rel="stylesheet" />
    @yield('blade_css')

    @stack('page_css')
</head>

<body class="ltr main-body app sidebar-mini">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('public/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div>
            {{-- Header --}}
            @include('layouts.header')
            {{-- End Header --}}

            {{-- Sidebar --}}
            @include('layouts.sidebar')
            {{-- End Sidebar --}}
        </div>
        {{-- @include('layouts.sidebarright') --}}

        <!-- main-content -->
        <div class="main-content app-content">

            <!-- container -->
            @yield('content')
            <!-- /Container -->
        </div>

        <!-- Sidebar-right-->
        <div class="sidebar sidebar-right sidebar-animate">
            <div class="panel panel-primary card mb-0 box-shadow">
                <div class="tab-menu-heading card-img-top-1 border-0 p-3">
                    <div class="card-title mb-0">Notifications</div>
                    <div class="card-options ms-auto">
                        <a href="javascript:void(0);" class="sidebar-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class=""><a href="#side1" class="active" data-bs-toggle="tab"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" height="24"
                                        viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z" />
                                    </svg> Chat</a></li>
                            <li><a href="#side2" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="side-menu__icon" width="24" height="24" viewBox="0 0 24 24">
                                        <path
                                            d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z" />
                                    </svg> Notifications</a></li>
                            <li><a href="#side3" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" class="side-menu__icon"
                                        height="24" version="1.1" width="24" viewBox="0 0 24 24">
                                        <path
                                            d="M12,2C6.48,2 2,6.48 2,12C2,17.52 6.48,22 12,22C17.52,22 22,17.52 22,12C22,6.48 17.52,2 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11C11.17,11 10.5,10.33 10.5,9.5C10.5,8.67 11.17,8 12,8C12.83,8 13.5,8.67 13.5,9.5C13.5,10.33 12.83,11 12,11Z" />
                                    </svg> Friends</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active " id="side1">
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-primary brround avatar-md">CH</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>New Websites is Created</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1 tx-11"></i>
                                            <small class="text-muted ms-auto">30 mins ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-danger brround avatar-md">N</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare For the Next Project</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1 tx-11"></i>
                                            <small class="text-muted ms-auto">2 hours ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-info brround avatar-md">S</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Decide the live Discussion</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1 tx-11"></i>
                                            <small class="text-muted ms-auto">3 hours ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-warning brround avatar-md">K</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Meeting at 3:00 pm</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1 tx-11"></i>
                                            <small class="text-muted ms-auto">4 hours ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-success brround avatar-md">R</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1 tx-11"></i>
                                            <small class="text-muted ms-auto">1 days ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-pink brround avatar-md">MS</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1 tx-11"></i>
                                            <small class="text-muted ms-auto">1 days ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center border-bottom p-3">
                                <div class="">
                                    <span class="avatar bg-purple brround avatar-md">L</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1 tx-11"></i>
                                            <small class="text-muted ms-auto">45 mintues ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="list d-flex align-items-center p-3">
                                <div class="">
                                    <span class="avatar bg-blue brround avatar-md">U</span>
                                </div>
                                <a class="wrapper w-100 ms-3" href="javascript:void(0);">
                                    <p class="mb-0 d-flex ">
                                        <b>Prepare for Presentation</b>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="mdi mdi-clock text-muted me-1 tx-11"></i>
                                            <small class="text-muted ms-auto">2 days ago</small>
                                            <p class="mb-0"></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane  " id="side2">
                            <div class="list-group list-group-flush ">
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/img/faces/12.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div>
                                        <strong>Madeleine</strong> Hey! there I' am available....
                                        <div class="small text-muted">
                                            3 hours ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/img/faces/1.jpg"></span>
                                    </div>
                                    <div>
                                        <strong>Anthony</strong> New product Launching...
                                        <div class="small text-muted">
                                            5 hour ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/img/faces/2.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div>
                                        <strong>Olivia</strong> New Schedule Realease......
                                        <div class="small text-muted">
                                            45 mintues ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/img/faces/8.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div>
                                        <strong>Madeleine</strong> Hey! there I' am available....
                                        <div class="small text-muted">
                                            3 hours ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/img/faces/11.jpg"></span>
                                    </div>
                                    <div>
                                        <strong>Anthony</strong> New product Launching...
                                        <div class="small text-muted">
                                            5 hour ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/img/faces/6.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div>
                                        <strong>Olivia</strong> New Schedule Realease......
                                        <div class="small text-muted">
                                            45 mintues ago
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-3">
                                        <span class="avatar avatar-lg brround cover-image"
                                            data-image-src="../assets/img/faces/9.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div>
                                        <strong>Olivia</strong> Hey! there I' am available....
                                        <div class="small text-muted">
                                            12 mintues ago
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane  " id="side3">
                            <div class="list-group list-group-flush ">
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/9.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Mozelle Belt</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/11.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Florinda Carasco</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/10.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Alina Bernier</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/2.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Zula Mclaughin</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/13.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Isidro Heide</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/12.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Mozelle Belt</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm btn-outline-light btn-rounded"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/4.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Florinda Carasco</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/7.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Alina Bernier</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm btn-outline-light btn-rounded"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/2.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Zula Mclaughin</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/14.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Isidro Heide</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);"
                                            class="btn btn-sm btn-outline-light btn-rounded"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/11.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Florinda Carasco</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/9.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Alina Bernier</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/15.jpg"><span
                                                class="avatar-status bg-success"></span></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Zula Mclaughin</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                                <div class="list-group-item d-flex  align-items-center">
                                    <div class="me-2">
                                        <span class="avatar avatar-md brround cover-image"
                                            data-image-src="../assets/img/faces/4.jpg"></span>
                                    </div>
                                    <div class="">
                                        <div class="font-weight-semibold" data-bs-toggle="modal"
                                            data-bs-target="#chatmodel">Isidro Heide</div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-light btn-rounded"
                                            data-bs-toggle="modal" data-bs-target="#chatmodel"><i
                                                class="mdi mdi-message-outline"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Sidebar-right-->
        <!-- /main-content -->


        <!--/Sidebar-right-->

        <!-- Country-selector modal-->
        <div class="modal fade" id="country-selector">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom">
                        <h6 class="modal-title">Choose Country</h6><button aria-label="Close" class="btn-close"
                            data-bs-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                        <ul class="row p-3">
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block active">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/us_flag.jpg" class="me-3 language"></span>Usa
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/italy_flag.jpg"
                                            class="me-3 language"></span>Italy
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/spain_flag.jpg"
                                            class="me-3 language"></span>Spain
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/india_flag.jpg"
                                            class="me-3 language"></span>India
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/french_flag.jpg"
                                            class="me-3 language"></span>France
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/mexico.jpg" class="me-3 language"></span>Mexico
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/singapore.jpg"
                                            class="me-3 language"></span>Singapore
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/poland.jpg" class="me-3 language"></span>Poland
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/austria.jpg" class="me-3 language"></span>Austria
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/russia_flag.jpg"
                                            class="me-3 language"></span>Russia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/germany_flag.jpg"
                                            class="me-3 language"></span>Germany
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/argentina.jpg"
                                            class="me-3 language"></span>Argentina
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/brazil.jpg" class="me-3 language"></span>Brazil
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/uae.jpg" class="me-3 language"></span>U.A.E
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/china.jpg" class="me-3 language"></span>China
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/uk.jpg" class="me-3 language"></span>U.K
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/malaysia.jpg"
                                            class="me-3 language"></span>Malaysia
                                </a>
                            </li>
                            <li class="col-lg-6 mb-2">
                                <a href="#" class="btn btn-country btn-lg btn-block">
                                    <span class="country-selector"><img alt=""
                                            src="../assets/img/flags/canada.jpg" class="me-3 language"></span>Canada
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Country-selector modal-->

        <!-- Message Modal -->
        <div class="modal fade" id="chatmodel" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-right chatbox" role="document">
                <div class="modal-content chat border-0">
                    <div class="card overflow-hidden mb-0 border-0">
                        <!-- action-header -->
                        <div class="action-header clearfix">
                            <div class="float-start hidden-xs d-flex ms-2">
                                <div class="img_cont me-3">
                                    <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img"
                                        alt="img">
                                </div>
                                <div class="align-items-center mt-0">
                                    <h4 class="text-white mb-0 font-weight-semibold">Daneil Scott</h4>
                                    <span class="dot-label bg-success"></span><span
                                        class="me-3 text-white">online</span>
                                </div>
                            </div>
                            <ul class="ah-actions actions align-items-center">
                                <li class="call-icon">
                                    <a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal"
                                        data-bs-target="#audiomodal">
                                        <i class="fe fe-phone"></i>
                                    </a>
                                </li>
                                <li class="video-icon">
                                    <a href="" class="d-done d-md-block phone-button" data-bs-toggle="modal"
                                        data-bs-target="#videomodal">
                                        <i class="fe fe-video"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="" data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="fe fe-more-vertical"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><i class="fa fa-user-circle"></i> View profile</li>
                                        <li><i class="fa fa-users"></i>Add friends</li>
                                        <li><i class="fa fa-plus"></i> Add to group</li>
                                        <li><i class="fa fa-ban"></i> Block</li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="" class="" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fe fe-x-circle text-white"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- action-header end -->

                        <!-- msg_card_body -->
                        <div class="card-body msg_card_body">
                            <div class="chat-box-single-line">
                                <abbr class="timestamp">july 1st, 2021</abbr>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Hi, how are you Jenna Side?
                                    <span class="msg_time">8:40 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end ">
                                <div class="msg_cotainer_send">
                                    Hi Connor Paige i am good tnx how about you?
                                    <span class="msg_time_send">8:55 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start ">
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    I am good too, thank you for your chat template
                                    <span class="msg_time">9:00 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end ">
                                <div class="msg_cotainer_send">
                                    You welcome Connor Paige
                                    <span class="msg_time_send">9:05 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start ">
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Yo, Can you update Views?
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    But I must explain to you how all this mistaken born and I will give
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start ">
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Yo, Can you update Views?
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    But I must explain to you how all this mistaken born and I will give
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start ">
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Yo, Can you update Views?
                                    <span class="msg_time">9:07 AM, Today</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-4">
                                <div class="msg_cotainer_send">
                                    But I must explain to you how all this mistaken born and I will give
                                    <span class="msg_time_send">9:10 AM, Today</span>
                                </div>
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/9.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="img_cont_msg">
                                    <img src="../assets/img/faces/6.jpg" class="rounded-circle user_img_msg"
                                        alt="img">
                                </div>
                                <div class="msg_cotainer">
                                    Okay Bye, text you later..
                                    <span class="msg_time">9:12 AM, Today</span>
                                </div>
                            </div>
                        </div>
                        <!-- msg_card_body end -->
                        <!-- card-footer -->
                        <div class="card-footer">
                            <div class="msb-reply d-flex">
                                <div class="input-group">
                                    <input type="text" class="form-control " placeholder="Typing....">
                                    <div class="input-group-append ">
                                        <button type="button" class="btn btn-primary ">
                                            <i class="far fa-paper-plane" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- card-footer end -->
                    </div>
                </div>
            </div>
        </div>

        <!--Video Modal -->
        <div id="videomodal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body mx-auto text-center p-7">
                        <h5>Nowa Video call</h5>
                        <img src="../assets/img/faces/6.jpg" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3"
                            alt="img">
                        <h4 class="mb-1 font-weight-semibold">Daneil Scott</h4>
                        <h6>Calling...</h6>
                        <div class="mt-5">
                            <div class="row">
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
                                        <i class="fas fa-video-slash"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle text-white mb-0 me-3"
                                        href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fas fa-phone bg-danger text-white"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
                                        <i class="fas fa-microphone-slash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- modal-body -->
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- Audio Modal -->
        <div id="audiomodal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body mx-auto text-center p-7">
                        <h5>Nowa Voice call</h5>
                        <img src="../assets/img/faces/6.jpg" class="rounded-circle user-img-circle h-8 w-8 mt-4 mb-3"
                            alt="img">
                        <h4 class="mb-1  font-weight-semibold">Daneil Scott</h4>
                        <h6>Calling...</h6>
                        <div class="mt-5">
                            <div class="row">
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle mb-0 me-3" href="javascript:void(0);">
                                        <i class="fas fa-volume-up bg-light"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="icon icon-shape rounded-circle text-white mb-0 me-3"
                                        href="javascript:void(0);" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fas fa-phone text-white bg-primary"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="icon icon-shape  rounded-circle mb-0 me-3" href="javascript:void(0);">
                                        <i class="fas fa-microphone-slash bg-light"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- modal-body -->
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <!-- Footer opened -->
        <div class="main-footer">
            <div class="col-md-12 col-sm-12 text-center">
                <div class="container-fluid pt-0 ht-100p">
                    Copyright © 2022 <a href="javascript:void(0);" class="text-primary">nowa</a>. Designed with
                    <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> Spruko </a> All
                    rights reserved
                </div>
            </div>
        </div>
        <!-- Footer closed -->
    </div>
    <!-- End Page -->

    <!-- Back-to-top -->
    <a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>

    <!-- JQuery min js -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="{{ asset('public/assets/plugins/jquery/jquery.min.js') }}"></script>



    <!-- Bootstrap js -->
    <script src="{{ asset('public/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Internal Chart.Bundle js-->
    <script src="{{ asset('public/assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('public/assets/plugins/moment/moment.js') }}"></script>

    <!-- INTERNAL Apexchart js -->
    <script src="{{ asset('public/assets/js/apexcharts.js') }}"></script>

    <!--Internal Sparkline js -->
    <script src="{{ asset('public/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('public/assets/plugins/raphael/raphael.min.js') }}"></script>

    <!--Internal  Perfect-scrollbar js -->
    <script src="{{ asset('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>

    <!-- Eva-icons js -->
    <script src="{{ asset('public/assets/js/eva-icons.min.js') }}"></script>

    <!-- right-sidebar js -->
    <script src="{{ asset('public/assets/plugins/sidebar/sidebar.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/sidebar/sidebar-custom.js') }}"></script>

    <!-- Sidebar js -->
    <script src="{{ asset('public/assets/plugins/side-menu/sidemenu.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('public/assets/js/sticky.js') }}"></script>

    <!--Internal  index js -->
    <script src="{{ asset('public/assets/js/index.js') }}"></script>

    <!-- Chart-circle js -->
    <script src="{{ asset('public/assets/js/circle-progress.min.js') }}"></script>

    <!-- Internal Data tables -->
    <script src="{{ asset('public/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/js/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/datatable/responsive.bootstrap5.min.js') }}"></script>

    <!-- INTERNAL Select2 js -->
    <script src="{{ asset('public/assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/select2.js') }}"></script>

    <!-- Theme Color js -->
    <script src="{{ asset('public/assets/js/themecolor.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('public/assets/js/custom1.js') }}"></script>
    {{-- <script src="{{ asset('public/assets/js/custom.js') }}"></script> --}}
    <!-- Switcher js -->
    <script src="{{ asset('public/assets/switcher/js/switcher.js') }}"></script>

    <!--Internal  Notify js -->
    <script src="{{ asset('public/assets/plugins/notify/js/notifIt.js') }}"></script>
    {{-- <script src="{{ asset('public/assets/plugins/notify/js/notifit-custom.js') }}"></script> --}}


    {{-- js default --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}
    <script src="{{ asset('public/js/helper.js') }}" defer></script>



    {{-- yield use @saction --}}
    @yield('blade_scripts')

    <script>
        var env = {!! json_encode(config('me.app.js_env')) !!};
        env.token = "{{ csrf_token() }}";
        @isset($js_config)
            var jsconfig = {!! json_encode($js_config) !!};
        @endisset
        $(document).ready(function() {
            axios.defaults.headers.get['content-type'] = 'application/json;charset=UTF-8';
            axios.interceptors.request.use((config) => {
                helper.setLoading(true);
                return config;
            }, (error) => {
                return Promise.reject(error);
            });

            axios.interceptors.response.use((response) => {
                helper.setLoading(false);
                return response;
            }, (error) => {
                helper.setLoading(false);
                return Promise.reject(error);
            });


            $(document).on("click", ".silentpagination", function() {

                helper.silentHandler(
                    $(this).data('href'),
                    null, {}, {}, {},
                    $(this).data('container'),
                    ''
                );

            });

        });
        // document.addEventListener("DOMContentLoaded", function() {
        //     window.addEventListener('scroll', function() {
        //         if (window.scrollY > 65) {
        //             $('.ct-bar-action').removeClass("z-index-10");
        //             $('.ct-bar-action').addClass("z-index-1020");

        //         } else {
        //             $('.ct-bar-action').removeClass("z-index-1020");
        //             $('.ct-bar-action').addClass("z-index-10");
        //         }
        //     });
        // });

        // $('#modal_windows').on('hidden.bs.modal', function(e) {
        //     $("#air_windows").html('');
        // });

        // $('#modal_media').on('hidden.bs.modal', function(e) {
        //     //$( ".sidebar-remove" ).trigger( "click" );
        //     $("#air_media").html('');
        // })
    </script>

    {{-- stack use @push --}}
    @stack('page_scripts')
</body>

</html>
