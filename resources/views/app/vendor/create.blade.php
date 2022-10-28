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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>@lang('dev.name_kh_eng')</b></label>
                            <div class="input-group my-group" style="width:100%;">

                                <select class="form-control form-select input-sm tab_title" style="width:10%;">
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
                                    <input type="text" class="form-control input-sm {{ $active }}"
                                        style="width:80%;" name="title-{{ $lang[0] }}" id="title-{{ $lang[0] }}"
                                        placeholder="{{ $lang[1] }}" value="{{ $name[$lang[0]] ?? '' }}">
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">@lang('dev.permission')</label>
                            <select class="form-control input-sm" name="type" id="type">
                                <option value="">-- {{ __('dev.noneselected') }}--</option>
                                {!! cmb_listing(['equipment' => 'equipment', 'shop' => 'shop'], [$input['type'] ?? ''], '', '') !!}
                            </select>
                            <span id="type-error" class="error invalid-feedback" style="display: none"></span>
                        </div>
                    </div>
                </div>



                <div class="form-group create_img">
                    <label for=""><b>@lang('table.image_logo')</b></label>
                    <div class="input-group my-group" style="width:100%;">
                        <input type="file" class="dropify" data-height="400"
                            accept="image/png, image/jpeg,image/PNG, image/JPEG,image/jpg,image/JPG" name="images"
                            value="" />
                        <span id="title-{{ config('me.app.project_lang')['en'][0] }}-error" class="error invalid-feedback"
                            style="display: none"></span>
                    </div>

                    <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                </div>
                @if (isset($input))
                    <div class="input-group my-group update_img" style="width:100%;">
                        <div class="dropify-wrapper has-preview" style="height: 411.988px;">
                            <div class="dropify-message"><span class="file-icon">
                                </span>
                                <p class="dropify-error">Ooops, something wrong appended.</p>
                            </div>
                            <div class="dropify-loader" style="display: none;"></div>
                            <div class="dropify-errors-container">
                                <ul></ul>
                            </div><input type="file" class="dropify" data-height="400"
                                accept="image/png, image/jpeg,image/PNG, image/JPEG,image/jpg,image/JPG" name=""
                                value="" data-date="3331-09-10T00:00:00+07:00"><button type="button" id="remove"
                                class="dropify-clear remove_img">Remove</button>
                            <div class="dropify-preview" style="display: block;"><span class="dropify-render"><img
                                        src="{{ asset('storage/app/vendor/' . $input['image_url'] ?? '') }}"
                                        style="max-height: 400px;"></span>
                                <div class="dropify-infos">
                                    <div class="dropify-infos-inner">
                                        <p class="dropify-filename"><span
                                                class="dropify-filename-inner">333109105.jpg</span>
                                        </p>
                                        <p class="dropify-infos-message">Drag and drop or click to replace</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <span id="title-en-error" class="error invalid-feedback" style="display: none"></span>
                    </div>
                    <input type="hidden" name="old_image" value="{{ $input['image_url'] ?? '' }}">
                @endif

            </div>
            <!-- /.card-body -->

            {{--  --}}

        </form>
    </div>
@endsection
