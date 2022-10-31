@php
//dd(request()->session()->all());
@endphp
@extends('layouts.app')
@section('blade_css')
    {{-- <link href="{{ asset('public/assets/css/ace.min.css') }}" rel="stylesheet"> --}}


    <!-- Stylesheet -->
    {{-- <link rel="stylesheet" href="{{ asset('public/css/style.css') }}"> --}}
@endsection
@push('page_css')
    <style>
        .media-upload {
            /* float: right; */
            position: fixed;
            right: 0;
            top: 15%;
            width: 0;
            height: 100%;
            transition-property: width;
            transition-duration: 1s;
            overflow: scroll;
            z-index: 1;
<<<<<<< HEAD


        }

=======
        }
>>>>>>> origin/piseth
        #arrow-upload {
            font-size: 25px;
            cursor: pointer;
        }
<<<<<<< HEAD

=======
>>>>>>> origin/piseth
        #upload {
            font-size: 18px;
            padding: 5px 20px;
        }
<<<<<<< HEAD

=======
>>>>>>> origin/piseth
        .container {
            background-color: --primary;
            width: 60%;
            min-width: 450px;
            position: relative;
            margin: auto;
            padding: 50px 20px;
            border-radius: 7px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.05);
        }
<<<<<<< HEAD

        input[type="file"] {
            display: none;
        }

        label {
            display: block;
            position: relative;

=======
        input[type="file"] {
            display: none;
        }
        label {
            display: block;
            position: relative;
>>>>>>> origin/piseth
            font-size: 50px;
            text-align: center;
            width: 300px;
            padding: 18px 0;
            margin: auto;
            border-radius: 5px;
            cursor: pointer;
        }
<<<<<<< HEAD

=======
>>>>>>> origin/piseth
        .container p {
            text-align: center;
            margin: 20px 0 30px 0;
        }
<<<<<<< HEAD

=======
>>>>>>> origin/piseth
        #images {
            width: 90%;
            position: relative;
            margin: auto;
            display: flex;
            justify-content: space-evenly;
            gap: 20px;
            flex-wrap: wrap;
        }
<<<<<<< HEAD

        figure {
            width: 45%;
        }

=======
        figure {
            width: 45%;
        }
>>>>>>> origin/piseth
        figcaption {
            text-align: center;
            font-size: 5px;
            margin-top: 0.5vmin;
        }
<<<<<<< HEAD

=======
>>>>>>> origin/piseth
        .file-manger-icon img {
            width: 100px;
            height: 100px;
        }
    </style>
@endpush
@section('blade_scripts')
    <!--Internal Fancy uploader js-->
    {{-- <script src="{{ asset('public/assets/js/ace.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/ace-elements.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            /*Please dont delete this code*/
<<<<<<< HEAD

=======
>>>>>>> origin/piseth
            $("#btnnew_{{ $obj_info['name'] }}").click(function(e) {
                let route_create = "{{ $route['create'] }}";
                let extraFrm = {}; //{jscallback:'test'};
                let setting = {}; //{fnSuccess:foo};
                let popModal = {
                    show: true,
                    size: 'modal-xl'
                    //modal-sm, modal-lg, modal-xl
                };
                let loading_indicator = '';
                helper.silentHandler(route_create, null, extraFrm, setting, popModal, 'air_windows',
                    loading_indicator);
<<<<<<< HEAD

            });

            $("#upload").click(function(e) {

                $('.media-upload').css({
                    "width": "28%"
                })
            });
            $("#arrow-upload").click(function(e) {

                $('.media-upload').css({
                    "width": "0%"
                })
            });
            $("#media-box").click(function(e) {

                $('.media-upload').css({
                    "width": "0%"
                })
            });
            $("#save_img").click(function(e) {
                // alert(1);
                let route_submit = "{{ $route['submit'] }}";
                // alert(route_submit);
                // e.preventDefault();
                // let route_import = "{{ $route['create'] }}";
                let extraFrm = {}; //{jscallback:'test'};
                let frm = "frm-{{ $obj_info['name'] }}";
                let aftersave = (data) => {
                    // console.log(data['data'].tableData);
                    setTimeout(() => {

                        // window.location.reload();
                    }, 2000);

                    $('#' + frm)[0].reset();
                    $('#images').html('');
                    $('#num-of-files').html('No Files Chosen');
                };
                let setting = {
                    mode: "",
                    // or use jscallback = formreset
                    // fnSuccess: aftersave,
                };
                let container = '';
                let loading_indicator = '';
                let popModal = {
                    show: false,
                    size: 'modal-xl'
                    //modal-sm, modal-lg, modal-xl
                };
                helper.silentHandler(route_submit, frm,
                    extraFrm,
                    setting,
                    popModal, container,
                    loading_indicator);

            });

            $('.delete').click(function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                $('body').removeClass('timer-alert');
                swal({
                    title: "Are your sure to delete ?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    setInterval(() => {
                        window.location.href = link;
                        swal("Delete finished!");
                    }, 1000);
                });
            });
            $('#trash').click(function() {
                // alert(1);
            })

=======
            });
            $("#upload").click(function(e) {
                $('.media-upload').css({
                    "width": "28%"
                })
            });
            $("#arrow-upload").click(function(e) {
                $('.media-upload').css({
                    "width": "0%"
                })
            });
            $("#media-box").click(function(e) {
                $('.media-upload').css({
                    "width": "0%"
                })
            });
            $("#save_img").click(function(e) {
                // alert(1);
                let route_submit = "{{ $route['submit'] }}";
                // alert(route_submit);
                // e.preventDefault();
                // let route_import = "{{ $route['create'] }}";
                let extraFrm = {}; //{jscallback:'test'};
                let frm = "frm-{{ $obj_info['name'] }}";
                let aftersave = (data) => {
                    // console.log(data['data'].tableData);
                    setTimeout(() => {
                        // window.location.reload();
                    }, 2000);
                    $('#' + frm)[0].reset();
                    $('#images').html('');
                    $('#num-of-files').html('No Files Chosen');
                };
                let setting = {
                    mode: "",
                    // or use jscallback = formreset
                    // fnSuccess: aftersave,
                };
                let container = '';
                let loading_indicator = '';
                let popModal = {
                    show: false,
                    size: 'modal-xl'
                    //modal-sm, modal-lg, modal-xl
                };
                helper.silentHandler(route_submit, frm,
                    extraFrm,
                    setting,
                    popModal, container,
                    loading_indicator);
            });
            $('.delete').click(function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                $('body').removeClass('timer-alert');
                swal({
                    title: "Are your sure to delete ?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    setInterval(() => {
                        window.location.href = link;
                        swal("Delete finished!");
                    }, 1000);
                });
            });
>>>>>>> origin/piseth
        });
    </script>
@endsection
@section('content')
    {{-- Header --}}
    <section class="content-header bg-light sticky-top ct-bar-action ct-bar-action-shaddow">
        <div class="container-fluid">
            <div class="d-flex  border br-5">
                <div class="flex-grow-1">
                    <h5 class="mb-2 mg-t-20 mg-l-20">
                        {!! $obj_info['icon'] !!}
                        <a href="{{ url_builder($obj_info['routing'], [$obj_info['name']]) }}"
                            class="ct-title-nav text-md">{{ $obj_info['title'] }}</a>
                        <small class="text-sm">
                            <i class="ace-icon fa fa-angle-double-right text-xs"></i>
                            {{ $caption ?? '' }}
                        </small>
                    </h5>
                </div>
                <div class="pd-10 ">
                    <span class="btn btn-primary button-icon" id="upload"><i class="fe fe-upload"></i></span>
                    {{-- <button type="button" class="btn btn-dark button-icon"><i class="fe fe-upload"></i></button> --}}
                    <span class="btn btn-primary" id="save_img">save</span>
                    @include('app._include.btn_index', [
                        'new' => false,
                        'trash' => false,
                        'active' => false,
                    ])
                </div>

            </div>
    </section>
    {{-- end header --}}
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="media-box">
                <div class="media" id="media">
                    <!-- container -->
                    <div class="main-container container-fluid">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="tx-18 mb-4">
                                            {{-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                                <div class="card custom-card text-center">
                                                    <div class="card-body">
                                                        <div>
                                                            <h6 class="card-title mb-1">Ajax Alert</h6>
                                                            <p class="text-muted card-sub-title">With a loader (for a AJAX
                                                                requests)
                                                            </p>
                                                        </div>
                                                        <div class="btn ripple btn-pink" id='swal-ajax'>
                                                            Click me !
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}


                                        </div>
                                    </div>
                                    <div class="col-6 col-auto">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" placeholder="Search files.....">
                                            <span class="input-group-append">
                                                <button class="btn ripple btn-primary" type="button">Search</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($results as $result)
                                        <div class="col-xl-2 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                        <div class="dropdown-menu">
                                                            {{-- <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i> Edit</a> --}}
                                                            {{-- <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fas fa-stop-circle"></i> &nbsp;Disable</a> --}}
                                                            <a class="dropdown-item delete"
                                                                href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'totrash', $result['id']], []) }}"><i
                                                                    class="fe fe-trash me-2 "></i>

                                                                Delete</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon brick">
                                                        <a href="{{ asset('storage/app/media/' . $result['media']) }}"
                                                            data-caption="IMAGE-01" data-id="lion"
                                                            class="js-img-viewer"><img
                                                                src="{{ asset('storage/app/media/' . $result['media']) }}"
                                                                alt="img" class="br-7"></a>
                                                    </div>
                                                    <h6 class="mb-1 font-weight-semibold">abc.jpg</h6>
                                                    <span class="text-muted">4.23gb</span>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach




                                </div>
                                <!-- Pagination and Record info -->
                                @include('app._include.pagination')
                            </div>
                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- Container closed -->

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="media-upload">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            {{-- Start Form --}}
                            <form name="frm-{{ $obj_info['name'] }}" id="frm-{{ $obj_info['name'] }}" method="POST"
                                action="{{ $route['submit'] }}">
                                {{-- please dont delete these default Field --}}
                                @CSRF
                                <input type="hidden" name="{{ $fprimarykey }}" id="{{ $fprimarykey }}"
                                    value="{{ $input[$fprimarykey] ?? '' }}">
                                <input type="hidden" name="jscallback"
                                    value="{{ $jscallback ?? (request()->get('jscallback') ?? '') }}">

                                <div class="card">
                                    <div class="card-header">
                                        <span id="arrow-upload"><i class="fas fa-arrow-circle-right"></i></span>
                                    </div>
                                    <div class="card-body">

                                        <div class="container">
                                            <input type="file" id="file-input" name="images[]"
                                                accept="image/png, image/jpeg" onchange="preview()" multiple>
                                            <label for="file-input">

                                                <i class="fas fa-images"></i>
                                            </label>
                                            <p id="num-of-files">No Files Chosen</p>
                                            <div id="images"></div>
                                        </div>

                                        {{-- <div class="col-sm-12 col-md-12">
                                            <input type="file" class="dropify" data-height="200" name="file1[]"
                                                multiple />
                                        </div> --}}
                                    </div>
                                </div>

                        </div>
                        </form>
                        {{-- End From --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('public/js/script.js') }}"></script>
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> origin/piseth
@endsection
=======
@endsection
>>>>>>> menghonghai
