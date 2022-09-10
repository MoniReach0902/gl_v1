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
    {{-- <title> Nowa - Premium dashboard ui bootstrap rwd admin html5 template </title> --}}

    <!-- Favicon -->

    {{-- <link rel="icon" href="{{ asset('public/assets/img/brand/logo.jpg') }}" type="image/x-icon" /> --}}

    <!-- Icons css -->
    <link href="{{ asset('public/assets/css/icons.css') }}" rel="stylesheet">


    <!--  bootstrap css-->
    <link href="{{ asset('public/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--- Style css --->
    {{-- <link href="{{ asset('public/css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('public/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/style-transparent.css') }}" rel="stylesheet">

    <!---Skinmodes css-->
    <link href="{{ asset('public/assets/css/skin-modes.css" rel="stylesheet') }}" rel="stylesheet">

    <!--- Animations css-->
    <link href="{{ asset('public/assets/css/animate.css') }}" rel="stylesheet">


</head>

<body class=" bg-dark">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('public/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    {{-- <div class="square-box">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div> --}}
    <div class="page">
        <div class="page-single">
            <div class="container">
                <div class="row">
                    <div
                        class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-4 justify-content-center">
                        <div class="card-sigin">
                            <!-- Demo content-->
                            <div class="main-card-signin d-md-flex">
                                <div class="wd-100p">
                                    <div class="d-flex justify-content-center mb-10"><a href="index.html"><img
                                                src="{{ asset('public/images/gl_logo.png') }}"
                                                class="sign-favicon ht-100" alt="logo"></a></div>
                                    <div class="">
                                        <div class="main-signup-header">
                                            <br>
                                            {{-- <h2>GL Gentleman</h2> --}}
                                            {{-- <h6 class="font-weight-semibold mb-4">Please sign in to continue.</h6> --}}
                                            <div class="panel panel-dark">
                                                <div class=" tab-menu-heading mb-2 border-bottom-0">
                                                    <div class="tabs-menu1">
                                                        <ul class="nav panel-tabs">
                                                            {{-- <li class="me-2"><a href="#tab5" class="active"
                                                                    data-bs-toggle="tab">Email / Username</a></li> --}}

                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="panel-body tabs-menu-body border-0 p-3">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab5">
                                                            <form method="POST" action="{{ url('/login') }}">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label>Email / Username</label>
                                                                    <input id="text" type="text"
                                                                        class="form-control @error('login') is-invalid @enderror"
                                                                        name="login"
                                                                        value="{{ old('name') ?: old('email') }}"
                                                                        required autocomplete="email" autofocus>
                                                                    @error('email')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input id="password" type="password"
                                                                        class="form-control @error('password') is-invalid @enderror"
                                                                        name="password" required
                                                                        autocomplete="current-password">
                                                                    @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div><button class="btn btn-primary btn-block">Sign
                                                                    In</button>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="main-signin-footer text-center mt-3">
                                                {{-- <p><a href="" class="mb-3">Forgot password?</a></p> --}}
                                                <p>Don't have an account? <a href="signup.html">Create an Account</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery min js -->
    <script src="{{ asset('public/assets/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('public/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Moment js -->
    <script src="{{ asset('public/assets/plugins/moment/moment.js') }}"></script>

    <!-- eva-icons js -->
    <script src="{{ asset('public/assets/js/eva-icons.min.js') }}"></script>

    <!-- generate-otp js -->
    <script src="{{ asset('public/assets/js/generate-otp.js') }}"></script>

    <!--Internal  Perfect-scrollbar js -->

    <script src="{{ asset('public/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- Theme Color js -->
    <script src="{{ asset('public/assets/js/themecolor.js') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('public/assets/js/custom.js') }}"></script>

</body>

</html>
