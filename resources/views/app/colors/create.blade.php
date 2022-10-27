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



                <div class="card">
                    <div class="card-body pd-t-20">                 
                                <div class="col-md-12 ">
                                    <label for="">@lang('dev.product_color')</label>
                                    <div class="input-group my-group" style="width:100%;">
                
                                        <select class="form-control form-select input-sm tab_title pd-l-20" style="width:20%;">
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
                                            <input type="text" class="form-control input-sm {{ $active }}" style="width:80%;"
                                                name="title-{{ $lang[0] }}" id="title-{{ $lang[0] }}"
                                                placeholder="@lang('dev.lang_' . $lang[0])" value="{{ $name[$lang[0]] ?? '' }}">
                                            @php
                                                $active = 'hide';
                                            @endphp
                                        @endforeach
                                        <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error" class="error invalid-feedback"
                                            style="display: none"></span>
                                    </div>
                                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                                </div>
               
                            
                                <div class="col-md-12 mg-t-20">
                                    <label for=""><b>@lang('dev.image')</b></label>
                                    <div class="input-group my-group" style="width:100%;">
                                        <input type="file" class="dropify" data-height="400" name="images" value="{{ $input['image_url'] ?? ''}}" accept=".png,.jpg,"/>
                                        <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error"
                                            class="error invalid-feedback" style="display: none"></span>
                                    </div>
                                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                                </div>
                                <div class=" col-md-12 mg-t-20">
                                    <label class="custom-switch ps-0">
                                        <span class="custom-switch-description me-2">@lang('table.status')</span>
                                        <input type="checkbox" name="custom-switch-checkbox1" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            
                            </div>
                        </div>
                   
        </form>
    </div>
    {{-- @include('layouts.extra_modal') --}}
@endsection