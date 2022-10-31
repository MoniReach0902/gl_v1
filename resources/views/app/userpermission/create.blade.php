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
    <section class="content-header bg-light d-flex ct-bar-action ct-bar-action-shaddow">
        <div class="container-fluid">
            <div class="d-flex border br-5">
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
            {{--  --}}

            <div class="card mg-t-20">
            <div class="card card-default color-palette-box">
                <div class="card-header">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                @lang('table.name')
                            </span>

                        </div>
                        <input type="text" name="title" class="form-control" value="{{ $input['title'] ?? '' }}">
                        <span id="title-error" class="error invalid-feedback" style="display: none"></span>
                    </div>
                </div>

                <div class="card-body">

                    @foreach ($definelevel as $item)
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12 col-md-10">
                                <div class="card">
                                    {{-- <div class="card-body"> --}}

                                    <div class="accordion accordion-indigo" id="accordion">
                                        <div class="card mb-0 ">

                                            <div class="card-header tx-medium bd-0 tx-white bg-white-10 text-light"
                                                id="">
                                                <a aria-controls="collapseTwo" aria-expanded="false" id="collap"
                                                    class="collap" data-bs-toggle="collapse" href="">
                                                    {!! $item['icon'] !!}
                                                    {{ $item['title'] }}

                                                    @if (isset($active_permission) && isset($active_permission[$item['name']]))
                                                        @foreach ($active_permission[$item['name']] as $key => $val)
                                                            <span class="badge-pill bg-dark text-light mg-r-10"
                                                                style="float: right">
                                                                {{ $item['protectme']['method'][$val]['title'] }}

                                                            </span>
                                                        @endforeach
                                                    @endif
                                                </a>
                                            </div>
                                            <div aria-labelledby="headingTwo" class="collapse " data-bs-parent="#accordion"
                                                id="collapseTwo" role="tabpanel">
                                                <div class="card-body">
                                                    @foreach ($item['protectme']['method'] as $method => $info)
                                                        @php
                                                            $check = '';
                                                            $checkbox_value = $item['name'] . '-' . $method;
                                                            if (isset($input['levelsetting']) && in_array($checkbox_value, $input['levelsetting'])) {
                                                                $check = 'checked';
                                                            }
                                                            
                                                        @endphp

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="levelsetting[]" value="{{ $checkbox_value }}"
                                                                class="" {{ $check }}>
                                                            <label class="form-check-label">{!! $info['title'] !!}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- accordion -->
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <!-- /.card-body -->
            </div>
            {{--  --}}
                       </div>

        </form>
        {{-- End From --}}
        {{--  --}}
    </div>
@endsection
