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
    {{-- Font awsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- Google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono&family=Siemreap&display=swap" rel="stylesheet">

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
    {{-- @include('layouts.switcher') --}}
    <!-- Loader -->
    <div id="global-loader" class="global_loading">
        <img src="{{ asset('public/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    {{-- <div class="spinner-border global_loading" role="status" style="display: block">
        <span class="sr-only">Loading...</span>
    </div> --}}
    <!-- /Loader -->

    <!-- Page -->
    <div class="">

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
        <<<<<<< HEAD=======@include('layouts.switcher')>>>>>>> menghonghai
            @include('layouts.extra_modal')


            <!-- /main-content -->





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
    {{-- modal for support Air Window --}}
    @include('layouts.modal')
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
    <script src="{{ asset('public/assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <!-- eva-icons js -->
    <script src="{{ asset('public/assets/js/eva-icons.min.js') }}"></script>

    <!--Internal  Form-elements js-->
    <script src="{{ asset('public/assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ asset('public/assets/js/select2.js') }}"></script>

    <!-- Internal TelephoneInput js-->
    <script src="{{ asset('public/assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>

    <!--Internal  Form-wizard js -->
    <script src="{{ asset('public/assets/js/form-wizard.js') }}"></script>

    <!-- INTERNAl Forn-wizard js -->
    <script src="{{ asset('public/assets/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/parsleyjs/parsley.min.js') }}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{ asset('public/assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <!--Internal Fancy uploader js-->
    <script src="{{ asset('public/assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ asset('public/assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>

    <!-- Sweet-alert js  -->
    <script src="{{ asset('public/assets/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/sweet-alert.js') }}"></script>


    <!-- modal js -->
    <script src="{{ asset('public/assets/js/modal.js') }}"></script>

    {{-- js default --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- <script src="{{ asset('public/js/app.js') }}" defer></script> --}}
    <script src="{{ asset('public/js/helper.js') }}" defer></script>

    {{-- ========== toggle form ================ --}}
    {{-- <script src="{{ asset('public/js/toggle_form.js') }}"></script> --}}


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

    {{-- yield use @saction --}}
    @yield('blade_scripts')

    <script src="jquery-3.6.0.min.js"></script>
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


        // const dark_form = document.getElementById("light-layout");
        // const light_form = document.getElementById("dark-layout");
        // const card_body = document.getElementById("card-body");

        // light_form.addEventListener("click", function() {
        //     card_body.classList.add("dark-input-form");
        //     card_body.classList.remove('light-input-form');

        // });
        // dark_form.addEventListener("click", function() {
        //     card_body.classList.add("light-input-form");
        //     card_body.classList.remove('dark-input-form');
        // });


        $(document).ready(function() {

            $("#light-layout").click(function() {
                $("#card-body").addClass("light-input-form");
                $("#card-body").removeClass("dark-input-form");

                if (window.load()) {

                }


            });
            $("#dark-layout").click(function() {
                $("#card-body").addClass("dark-input-form");
                $("#card-body").removeClass("light-input-form");
            });

            $("input").on("change", function() {
                this.setAttribute(
                    "data-date",
                    moment(this.value, "YYYY-MM-DD").format(this.getAttribute("data-date-format"))
                )
            }).trigger("change");


        });
    </script>

    {{-- stack use @push --}}
    @stack('page_scripts')
</body>

</html>
