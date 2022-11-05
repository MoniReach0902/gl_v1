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

            let hide = "{{ $isupdate ?? '' }}"
            if (hide) {
                $('.create_img').hide();

            } else {
                $('.update_img').hide();
            }


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
            $('#remove').on('click', function(e) {
                $('.update_img').hide();
                $('.create_img').show();
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
                        {!! $obj_info['icon'] !!}
                        <a href="{{ url_builder($obj_info['routing'], [$obj_info['name']]) }}"
                            class="ct-title-nav text-md">{{ $obj_info['title'] }}</a>
                        <small class="text-sm text-muted">
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

            <div class="card-body">
            <div class="row row-sm">

            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12">
                <div class="form-group">
                    <label for=""><b>@lang('dev.name_kh_eng')</b></label>
                    <div class="input-group my-group" style="width:100%;">

                        <select class="form-control form-select input-sm tab_title" style="width:25%;">
                            @foreach (config('me.app.project_lang') as $lang)
                                <option value="@lang($lang[0])">@lang('dev.lang_' . $lang[0])</option>
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
                            <input type="text" class="form-control input-sm {{ $active }}" style="width:75%;"
                                name="title-{{ $lang[0] }}" id="title-{{ $lang[0] }}"
                                placeholder="@lang('dev.lang_' . $lang[0])" value="{{ $name[$lang[0]] ?? '' }}">
                            @php
                                $active = 'hide';
                            @endphp
                        @endforeach
                        <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                            class="error invalid-feedback" style="display: none"></span>
                    </div>
                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12">
                <div class="form-group">
                    <label for=""><b>@lang('table.location')</b></label>
                    <div class="input-group my-group" style="width:100%;">
                    <input type="text" class="form-control" name="location" id="location"
                        placeholder="@lang('table.enter') @lang('table.location')" value="{{ $input['location'] ?? '' }}">
                    <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                        class="error invalid-feedback" style="display: none"></span>
                    </div>
                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12">
                <div class="form-group">
                    <label for=""><b>@lang('table.seria_number')</b></label>
                    <div class="input-group my-group" style="width:100%;">
                    <input type="text" class="form-control" name="seria_number" id="seria_number"
                        placeholder="@lang('table.enter') @lang('table.seria_number')" value="{{ $input['seria_number'] ?? '' }}">
                    <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                        class="error invalid-feedback" style="display: none"></span>
                    </div>
                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12">
                <div class="form-group">
                    <label for=""><b>@lang('table.model')</b></label>
                    <div class="input-group my-group" style="width:100%;">
                    <input type="text" class="form-control" name="model" id="model"
                        placeholder="@lang('table.enter') @lang('table.model')" value="{{ $input['model'] ?? '' }}">
                    <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                        class="error invalid-feedback" style="display: none"></span>
                    </div>
                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12">
                <div class="form-group">
                    <label for=""><b>@lang('table.cost')</b></label>
                    <div class="input-group my-group" style="width:100%;">
                    <input type="number" class="form-control" name="cost" id="cost" step="0.01" min="0"
                        placeholder="@lang('table.enter') @lang('table.cost')" value="{{ $input['cost'] ?? '' }}">
                    <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                        class="error invalid-feedback" style="display: none"></span>
                    </div>
                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12">
                <div class="form-group">
                    <label for=""><b>@lang('table.warranty_date')</b></label>
                    <div class="input-group my-group" style="width:100%;">
                    <input type="date" class="form-control" name="warranty_date" id="warranty_date"
                         value="{{ $input['warranty_date'] ?? '' }}">
                    <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                        class="error invalid-feedback" style="display: none"></span>
                    </div>
                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12">
                <div class="form-group">
                    <label for=""><b>@lang('dev.inventory')</b></label>
                    <div class="input-group my-group" style="width:100%;">
                        <select class="form-control input-sm" name="inventory_id" id="inventory_id">
                            <option value="">-- {{ __('dev.non_select') }}--</option>
                            {!! cmb_listing($inventory, [$input['inventory_id'] ?? ''], '', '') !!}
                          
                            
                        </select>
                    <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                        class="error invalid-feedback" style="display: none"></span>
                    </div>
                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12">
                <div class="form-group">
                    <label for=""><b>@lang('dev.vendor')</b></label>
                    <div class="input-group my-group" style="width:100%;">
                        <select class="form-control input-sm" name="vendor_id" id="vendor_id">
                            <option value="">-- {{ __('dev.non_select') }}--</option>
                            {!! cmb_listing($vendor, [$input['vendor_id'] ?? ''], '', '') !!}
                          
                            
                        </select>
                    <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                        class="error invalid-feedback" style="display: none"></span>
                    </div>
                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                </div>
            </div>

            </div>
            <div class="form-group">
                <label for=""><b>@lang('table.description')</b></label>
                <div class="input-group my-group" style="width:100%;">
                    <textarea class="form-control" name="description" id="description" cols="30" rows="8" placeholder="@lang('table.enter') @lang('table.description')">{{ $input['description'] ?? '' }}</textarea>
                <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                    class="error invalid-feedback" style="display: none"></span>
                </div>
                <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
            </div>
            </div>
            <!-- /.card-body -->

            {{--  --}}

        </form>
    </div>
@endsection
