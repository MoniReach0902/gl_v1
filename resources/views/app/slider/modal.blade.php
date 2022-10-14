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
    <script src="https://adminlte.io/themes/v3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function() {

            $(".btnsave_{{ $obj_info['name'] }}").click(function(e) {
                e.preventDefault();
                let route_submit = "{{ $route['submit'] }}";
                let route_cancel = "{{ $route['cancel'] ?? '' }}";
                let frm, extraFrm;
                let popModal = {
                    show: false,
                    size: 'modal-xl'
                    //modal-sm
                    //modal-lg
                    //modal-xl
                };
                let container = '';
                let loading_indicator = '';
                let setting = {
                    mode: "{{ $extends }}"
                };
                $("#frmimport-{{ $obj_info['name'] }} .error").html('').hide();
                helper.silentHandler(route_submit, "frmimport-{{ $obj_info['name'] }}", extraFrm, setting,
                    popModal, container,
                    loading_indicator);

            });

            $(".btncancel_{{ $obj_info['name'] }}").click(function(e) {
                //window.location.replace(route_cancel);
                window.location = route_cancel;
            });

            $('#file-import').on('change', function() {
                let route_import = "{{ $route['import'] }}";
                let popModal = {
                    show: false
                };
                $("#frmimport-{{ $obj_info['name'] }} .error").html('').hide();
                $("#import-preview-data").html('');
                helper.silentHandler(route_import, "frmimport-{{ $obj_info['name'] }}", null, null,
                    popModal, 'import-preview-data',
                    '');
            });


            $(function() {
                bsCustomFileInput.init();
            });

        });
    </script>
@endsection
@section('content')
    {{-- Header --}}
    <section class="content-header bg-light sticky-top ct-bar-action ct-bar-action-shaddow">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h5 class="mb-2">
                        {!! $obj_info['icon'] !!}
                        <a href="{{ url_builder($obj_info['routing'], [$obj_info['name']]) }}"
                            class="ct-title-nav text-md">{{ $obj_info['title'] }}</a>
                        <small class="text-sm">
                            <i class="ace-icon fa fa-angle-double-right text-xs"></i>
                            Create Slider
                        </small>
                    </h5>



                </div>
                <div class="col-sm-6 text-right">
                    @include('app._include.btn_create', $action_btn)
                </div>
            </div>
        </div>
    </section>
    {{-- end header --}}
    <div class="container-fluid">
        {{-- Start Form --}}
        <div class="input-group my-group" style="width:100%;">

            <select class="form-control form-select input-sm tab_title" style="width:25%;">
                @foreach (config('me.app.project_lang') as $lang)
                    <option value="@lang($lang[0])">@lang($lang[1])</option>
                @endforeach

            </select>
            @php
                $active = '';
            @endphp
            @foreach (config('me.app.project_lang') as $lang)
                @php
                    $title = json_decode($input['title'] ?? '', true);
                @endphp
                <input type="text" class="form-control input-sm {{ $active }}" style="width:75%;"
                    name="title-{{ $lang[0] }}" id="title-{{ $lang[0] }}" placeholder="{{ $lang[1] }}"
                    value="{{ $title[$lang[0]] ?? '' }}">
                @php
                    $active = 'hide';
                @endphp
            @endforeach
            {{-- <span id="title-{{ config('me.app.project_lang')[0][0] }}-error" class="error invalid-feedback"
                style="display: none"></span> --}}
        </div>
    </div>
@endsection
