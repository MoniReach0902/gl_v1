@php
$extends = 'app';
$action_btn = ['save' => true, 'cancel' => true];
@endphp
@if (is_axios())
    @php
        $extends = 'axios';
        $action_btn = ['save' => true, 'cancel' => false];
    @endphp
@endif

@extends('layouts.' . $extends)

@section('blade_scripts')
    <script>
        $(document).ready(function() {
            let route_submit = "{{ $route['submit'] }}";
            let route_cancel = "{{ $route['cancel'] ?? '' }}";
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

                e.preventDefault();
                $("#frm-{{ $obj_info['name'] }} .error").html('').hide();
                helper.silentHandler(route_submit, "frm-{{ $obj_info['name'] }}", extraFrm, setting,
                    popModal, container,
                    loading_indicator);


            });

            $(".btncancel_{{ $obj_info['name'] }}").click(function(e) {
                //window.location.replace(route_cancel);
                window.location = route_cancel;
            });

            $('.collap').on('click', function() {
                var eThis = $(this);
                var pr = eThis.parents('.accordion');
                pr.find('.collapse').slideToggle();
            })

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
                    @include('app._include.btn_create', $action_btn)
                </div>

            </div>
    </section>
    {{-- end header --}}
    <div class="container-fluid">
        {{-- Start Form --}}
        <form name="frm-{{ $obj_info['name'] }}" id="frm-{{ $obj_info['name'] }}" method="POST"
            action="{{ $route['submit'] }}">
            {{-- please dont delete these default Field --}}
            @CSRF
            <input type="hidden" name="{{ $fprimarykey }}" id="{{ $fprimarykey }}"
                value="{{ $input[$fprimarykey] ?? '' }}">
            <input type="hidden" name="jscallback" value="{{ $jscallback ?? (request()->get('jscallback') ?? '') }}">
            {{--  --}}
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                Permission Name
                            </span>

                        </div>
                        <input type="text" name="title" class="form-control" value="{{ $input['title'] ?? '' }}">
                        <span id="title-error" class="error invalid-feedback" style="display: none"></span>
                    </div>
                </div>

                <div class="card-body">
                    {{-- <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <h6 class="card-title mb-1">File Upload</h6>
                                        <p class="text-muted card-sub-title">Dropify is a jQuery plugin to create a
                                            beautiful file uploader that converts a standard <code>input
                                                type="file"</code> into a nice drag & drop zone with previews and custom
                                            styles.</p>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-12 col-md-4">
                                            <input type="file" class="dropify" data-height="200" />
                                        </div>
                                        <div class="col-sm-12 col-md-4 mg-t-10 mg-md-t-0">
                                            <input type="file" class="dropify"
                                                data-default-file="../assets/img/photos/1.jpg" data-height="200" />
                                        </div>
                                        <div class="col-sm-12 col-md-4 mg-t-10 mg-md-t-0">
                                            <input type="file" class="dropify" disabled="disabled" />
                                        </div>
                                    </div>
                                    <div>
                                        <input id="demo" type="file" name="files"
                                            accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js"
                                            multiple />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
                <!-- /.card-body -->
            </div>
            {{--  --}}


        </form>
        {{-- End From --}}
        {{--  --}}
    </div>
@endsection
