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
    {{-- <script src="https://adminlte.io/themes/v3/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            /*Please dont delete this code*/
            @if (null !== session('status') && session('status') == false)
                notif({
                    msg: 'nnnnn',
                    type: "success",
                    position: "left",
                    fade: true,
                    clickable: true,
                    timeout: 2000,
                });
            @endif

            @if (session('status') == true)
                notif({
                    msg: 'nnnnn',
                    type: "success",
                    position: "left",
                    fade: true,
                    clickable: true,
                    timeout: 2000,
                });
            @endif
            /*please dont delete this above code*/

            $(".btnsave_{{ $obj_info['name'] }}").click(function(e) {

                // helper.successAlert("nnnn");
                // notif({
                //     msg: 'nnnnn',
                //     type: "success",
                //     position: "left",
                //     fade: true,
                //     clickable: true,
                //     timeout: 2000,
                // });
                e.preventDefault();
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
        <form name="frmimport-{{ $obj_info['name'] }}" id="frmimport-{{ $obj_info['name'] }}" method="POST"
            action="{{ $route['submit'] }}" enctype="multipart/form-data">
            {{-- please dont delete these default Field --}}
            @CSRF
            <input type="hidden" name="{{ $fprimarykey }}" id="{{ $fprimarykey }}"
                value="{{ $input[$fprimarykey] ?? '' }}">
            <input type="hidden" name="jscallback" value="{{ $jscallback ?? (request()->get('jscallback') ?? '') }}">
            {{--  --}}
            <div class="card card-default color-palette-box">
                <div class="card-body table-responsive">


                    {{--  --}}
                    <div class="container-fluid">
                        <div class="row">



                            <label for="exampleInputFile">@lang('dev.img')</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-import" name="img">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <span id="file_import-error" class="error invalid-feedback" style="display: none"></span>

                            </div>

                        </div>
                    </div>
                    {{--  --}}




                </div>
                <!-- /.card-body -->
            </div>
            {{--  --}}


        </form>
        {{-- End From --}}
        {{--  --}}
    </div>
@endsection
