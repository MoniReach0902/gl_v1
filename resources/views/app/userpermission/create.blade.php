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
        @if (Session::has('status'))
            notif({
                type: "info",
                msg: "Welcome to Nowa",
                position: "right",
                bottom: '10'
            });
        @endif
    </script>
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

            @if (null !== session('status') && session('status') == false)

                notif({
                    type: "info",
                    msg: "Welcome to Nowa",
                    position: "right",
                    bottom: '10'
                });
            @endif
            $(".btnsave_{{ $obj_info['name'] }}").click(function(e) {
                console.log('aaaa');
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
                            {{ $caption ?? '' }}
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

                    @foreach ($definelevel as $item)
                        @php
                            //dd($item);
                            // if(isset($input)){
                            //     dd($item, $input);
                            // }
                        @endphp
                        <div class="card direct-chat direct-chat-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {!! $item['icon'] !!}
                                    {{ $item['title'] }}

                                </h3>
                                <div class="card-tools">
                                    @if (isset($active_permission) && isset($active_permission[$item['name']]))
                                        @foreach ($active_permission[$item['name']] as $key => $val)
                                            <span class="badge bg-success">
                                                {{ $item['protectme']['method'][$val]['title'] }}
                                            </span>
                                        @endforeach
                                    @endif

                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                </div>
                            </div>

                            <div class="card-body" style="padding: 10px 10px 10px 30px">
                                <div class="form-group">
                                    {{-- @php
                                        dd($item);
                                    @endphp --}}
                                    @foreach ($item['protectme']['method'] as $method => $info)
                                        @php
                                            $check = '';
                                            $checkbox_value = $item['name'] . '-' . $method;
                                            if (isset($input['levelsetting']) && in_array($checkbox_value, $input['levelsetting'])) {
                                                $check = 'checked';
                                            }
                                            
                                        @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="levelsetting[]"
                                                value="{{ $checkbox_value }}" class="" {{ $check }}>
                                            <label class="form-check-label">{!! $info['title'] !!}</label>
                                        </div>
                                    @endforeach

                                    {{-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked="">
                            <label class="form-check-label">Create</label>
                        </div> --}}

                                </div>
                            </div>



                        </div>
                    @endforeach


                </div>
                <!-- /.card-body -->
            </div>
            {{--  --}}


        </form>
        {{-- End From --}}
        {{--  --}}
    </div>
@endsection
