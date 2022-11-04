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
        $action_btn = ['save' => true, 'print' => false, 'cancel' => false];
    @endphp
@endif

@extends('layouts.' . $extends)

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

@section('blade_scripts')
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
    <section style="position: sticky;top: 64px; z-index:2" class="content-header bg-light ct-bar-action ct-bar-action-shaddow">
            
        <div class="col-lg-12 col-md-12 sticky">
            <div class="card custom-card" id="right">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <nav class="breadcrumb-4 d-flex">
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
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>der --}}
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


            

                <div class="card">
                    <div class="card-body">
                        <div class="pd-20 pd-sm-20">
                            <div class="row row-xs">
                                
                                <div class="col-md-4">
                                    <label for="name">	Name: </label>
                                    <input class="form-control" placeholder="Enter name" type="text">
                                </div>
                               
                                <div class="col-md-4 mg-t-10">
                                    <label for="name">	Location: </label>
                                    <input class="form-control" placeholder="Enter phone number" type="text">
                                </div>
                                <div class="col-md-4 mg-t-10">
                                    <label for="name">	Serail Number: </label>
                                    <input class="form-control" placeholder="Enter email" type="text">
                                </div>
                                <div class="col-md-4 mg-t-10">
                                    <label for="name">	Model: </label>
                                    <input class="form-control" placeholder="Enter address" type="text">
                                </div>
                                <div class="col-md-4 mg-t-10">
                                    <label for="name">	Cost: </label>
                                    <input class="form-control" placeholder="Enter address" type="text">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="permission_id">Brands ID:</label>
                                    <select class="form-control input-sm" name="permission_id" id="permission_id">
                                        <option value="">-- Select --</option>
                                        <option value="1">Top Admin</option>
                                        
                                    </select>
                                    <span id="permission_id-error" class="error invalid-feedback" style="display: none"></span>
                                </div>
                                <div class="form-group col-md-4 ">
                                    <label for="permission_id">Inventory ID:</label>
                                    <select class="form-control input-sm" name="permission_id" id="permission_id">
                                        <option value="">-- Select --</option>
                                        <option value="1">Top Admin</option>
                                        
                                    </select>
                                    <span id="permission_id-error" class="error invalid-feedback" style="display: none"></span>
                                </div>
                                
                                <div class="col-md-4 ">
                                    <label for="name"> Warranty Date: </label>
                                    <input class="form-control" type="date">
                                </div>
                                <div class="col-md-12 mg-t-10">
                                    <label for="name">	Description: </label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="8"></textarea>
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
                    </div>
                </div>

        </form>
    </div>
    {{-- @include('layouts.extra_modal') --}}
@endsection