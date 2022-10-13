@php
$extends = 'app';
$action_btn = ['save' => true, 'print' => false, 'cancel' => false, 'new' => true];
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
@endsection

@section('blade_scripts')
    <script>
        $(document).ready(function() {
            $(document).on("change", ".tab_title", function(ev) {
                ///

                var $value = $(this).val();
                helper.enableDisableByLang($(this), {!! json_encode($langcode, true) !!}, 'title-', $value);

                ///
            });
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
            $("#btnnew_{{ $obj_info['name'] }}").click(function(e) {


                window.location = route_new;
                //     loading_indicator);
            });

            $(".btnprint_{{ $obj_info['name'] }}").click(function(e) {
                //window.location.replace(route_cancel);
                //window.location = route_print;
                window.open(
                    route_print);
            });




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
            <br>


            <div class="container">
                
                <div class="row row-sm">
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="main-content-label mg-b-5">
                                   
                                </div>
                                
                            
                                    <div class="row row-sm">

                                        <div class="col-lg-6">
                                            <div class="form-group has-success mg-b-0">
                                                <div class="form-group">
                                                    <label for="">Name English & Khmer</label>
                                                    <div class="input-group my-group" style="width:100%;">
                
                                                        <select class="form-control form-select input-sm tab_title" style="width:20%;">
                                                            @foreach (config('me.app.project_lang') as $lang)
                                                                <option value="@lang($lang[0])">@lang($lang[1])</option>
                                                            @endforeach
                            
                                                        </select>
                                                        @php
                                                            $active = '';
                                                        @endphp
                                                        @foreach (config('me.app.project_lang') as $lang)
                                                            @php
                                                                // dd($lang);
                                                                $title = json_decode($input['title'] ?? '', true);
                                                            @endphp
                                                            <input type="text" class="form-control input-sm {{ $active }}" style="width:80%;"
                                                                name="title-{{ $lang[0] }}" id="title-{{ $lang[0] }}"
                                                                placeholder="{{ $lang[1] }}" value="{{ $title[$lang[0]] ?? '' }}">
                                                            @php
                                                                $active = 'hide';
                                                            @endphp
                                                        @endforeach
                                                        <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                                                            class="error invalid-feedback" style="display: none"></span>
                                                    </div>
                                                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Seria Number</label>
                                                    <input type="text" class="form-control" placeholder="Enter Seria number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Model</label>
                                                    <input type="text" class="form-control" placeholder="Enter Model">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Description</label>
                                                        <textarea class="form-control" placeholder="Enter description" rows="3"></textarea>
                                                    <span id="phone-error" class="error invalid-feedback" style="display: none"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
                                            <div class="form-group has-danger mg-b-0">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Cost</label>
                                                    <input type="number" class="form-control" placeholder="Enter Cost">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Inventory_id">Inventory</label>
                                                    <select class="form-control input-sm" name="inventory_id" id="inventory_id">
                                                        <option value="">-- {{ __('dev.noneselected') }}--</option>
                                                        <option value="1">inventory 1</option>
                                                        <option value="2">inventory 2</option>
                                                        <option value="3">inventory 3</option>
                                                        <option value="">
                                                            <a class="slide-item {{ nav_checkactive(['inventory-create'], $args) }}"
                                                            href="{{ url_builder('admin.controller', ['inventory', 'create']) }}">Add New</a>
                                                        </option>
                                                    </select>
                                                    <span id="permission_id-error" class="error invalid-feedback" style="display: none"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="vendor_id">Vendor</label>
                                                    <select class="form-control input-sm" name="vendor_id" id="vendor_id">
                                                        <option value="">-- {{ __('dev.noneselected') }}--</option>
                                                        <option value="1">vendor 1</option>
                                                        <option value="2">vendor 2</option>
                                                        <option value="3">vendor 3</option>
                                                        <option value="3">Add New</option>
                                                    </select>
                                                    <span id="permission_id-error" class="error invalid-feedback" style="display: none"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="vendor_id">Warranty date</label>
                                                    <div class="input-group">
                                                        <div class="input-group-text">
                                                            <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                                        </div>
                                                        <input type="date" class="form-control fc-datepicker" placeholder="Month/Date/Year">
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

        </form>
    </div>
@endsection
