@php
$extends = 'app';
$action_btn = ['save' => true, 'print' => false, 'cancel' => true, 'new' => true];
foreach (config('me.app.project_lang') as $lang) {
    $langcode[] = $lang[0];
}
@endphp
@if (is_axios())
    @php
        $extends = 'axios';
        $action_btn = ['save' => true, 'cancel' => false];
    @endphp
@endif
@extends('layouts.' . $extend)
@section('blade_css')
    <style>
        .img-box i {
            font-size: 70px !important;
            cursor: pointer;

        }

        .img-box {
            display: flex;
            justify-content: center
        }
    </style>
@endsection


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


        }

        #arrow-upload {
            font-size: 25px;
            cursor: pointer;
        }

        #upload {
            font-size: 18px;
            padding: 5px 20px;
        }

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

        input[type="file"] {
            display: none;
        }

        label {
            display: block;
            position: relative;

            font-size: 50px;
            text-align: center;
            width: 300px;
            padding: 18px 0;
            margin: auto;
            border-radius: 5px;
            cursor: pointer;
        }

        .container p {
            text-align: center;
            margin: 20px 0 30px 0;
        }

        #images {
            width: 90%;
            position: relative;
            margin: auto;
            display: flex;
            justify-content: space-evenly;
            gap: 20px;
            flex-wrap: wrap;
        }

        figure {
            width: 45%;
        }

        figcaption {
            text-align: center;
            font-size: 5px;
            margin-top: 0.5vmin;
        }

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

            let route_submit = "{{ $route['submit'] }}";
            let route_cancel = "{{ $route['cancel'] ?? '' }}";
            let route_print = "{{ $route['print'] ?? '' }}";
            let route_new = "{{ $route['new'] ?? '' }}";
            let frm, extraFrm;
            let popModal = {
                show: false,
                size: 'modal-lg'
                //modal-sm
                //modal-lg
                //modal-xl
            };
            let container = '';
            let loading_indicator = '';
            let setting = {
                mode: "{{ $extends }}"
            };
            $(".btnsave_{{ $obj_info['name'] }}").click(function(e) {
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

            $(".btncancel_{{ $obj_info['name'] }}").click(function(e) {
                //window.location.replace(route_cancel);
                window.location = route_cancel;
            });
            $('#img_box').click(function() {
                let route_import =
                    "{{ url_builder('admin.controller', ['user', 'create']) }}";

                let extraFrm = {

                }; //{jscallback:'test'};
                let setting = {}; //{fnSuccess:foo};
                let popModal = {
                    show: true,
                    size: 'modal-xl',
                    modal: 'Extra',
                    //modal-sm, modal-lg, modal-xl
                };

                let loading_indicator = '';
                helper.silentHandler(route_import, '', '', setting, popModal,
                    'extra_modal',
                    loading_indicator);
            });




        });
    </script>
@endsection
@section('content')
    {{-- Header --}}
    <section class="content-header bg-light d-flex ct-bar-action ct-bar-action-shaddow">
        <div class="container-fluid">
            <div class="d-flex  border br-5">
                <div class="flex-grow-1">
                    <h5 class="mb-2 mg-t-20 mg-l-20">
                        {{-- {!! $obj_info['icon'] !!} --}}
                        <a href="{{ url_builder($obj_info['routing'], [$obj_info['name']]) }}"
                            class="ct-title-nav text-md">{{ $obj_info['title'] }}</a>
                        <small class="text-sm text-muted">
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
        {{-- Start Form --}}

        <form name="frm-{{ $obj_info['name'] }}" id="frm-{{ $obj_info['name'] }}" method="POST"
            action="{{ $route['submit'] }}">
            {{-- please dont delete these default Field --}}
            @CSRF
            <input type="hidden" name="{{ $fprimarykey }}" id="{{ $fprimarykey }}"
                value="{{ $input[$fprimarykey] ?? '' }}">
            <input type="hidden" name="jscallback" value="{{ $jscallback ?? (request()->get('jscallback') ?? '') }}">
            <br>


            
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-body">
                        <div class="pd-20 pd-sm-20">
                            <div class="row row-xs">
                                
                                <div class="col-md-12">
                                    <label for="name">	Name: </label>
                                    <input class="form-control" placeholder="Enter name" type="text">
                                </div>
                                <div class="col-md-12">
                                    <label for="name">	Title: </label>
                                    <input class="form-control" placeholder="Enter name" type="text">
                                </div>
                               
                                <div class="col-md-12 mg-t-10">
                                    <label for="name"> Creat Date: </label>
                                    <input class="form-control" type="date">
                                </div>
                                <div class="col-md-12 mg-t-10">
                                    <label for="name">	Description: </label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="8"></textarea>
                                </div>
                                <div class="col-sm-12 col-md-12 mg-t-10">
                                    <input type="file" class="dropify" data-height="200" />
                                </div>
                              
                                <div class=" col-md-12 mg-t-10">
                                    <label class="custom-switch ps-0">
                                        <span class="custom-switch-description me-2">Status</span>
                                        <input type="checkbox" name="custom-switch-checkbox1" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
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
        </form>
    </div>
    {{-- @include('layouts.extra_modal') --}}
@endsection
