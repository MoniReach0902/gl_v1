@php
$extends = 'app';
$action_btn = ['save' => true, 'print' => true, 'cancel' => true];
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
            let route_submit = "{{ $route['submit'] }}";
            let route_cancel = "{{ $route['cancel'] ?? '' }}";
            let route_print = "{{ $route['print'] ?? '' }}";
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

            $(".btnprint_{{ $obj_info['name'] }}").click(function(e) {
                //window.location.replace(route_cancel);
                //window.location = route_print;
                window.open(
                    route_print);
            });

            $("#province").change(function(e) {
                let parentId = $(this).val();
                let extraFrm = {
                    jscallback: 'updateDistrict',
                    'parent_id': parentId
                };
                let setting = {}; //{fnSuccess:foo};

                helper.silentHandler(
                    "{{ url_builder('admin.controller', ['location', 'byparent']) }}",
                    "",
                    extraFrm,
                    setting, {
                        show: false
                    },
                    '',
                    '');
            });

            $("#district").change(function(e) {
                let parentId = $(this).val();
                let extraFrm = {
                    jscallback: 'updateCommune',
                    'parent_id': parentId
                };
                let setting = {}; //{fnSuccess:foo};

                helper.silentHandler(
                    "{{ url_builder('admin.controller', ['location', 'byparent']) }}",
                    "",
                    extraFrm,
                    setting, {
                        show: false
                    },
                    '',
                    '');
            });


        });

        function updateDistrict(jsondata) {
            let dropdown = $('#district');
            let data = jsondata.data;
            helper.makeDropdownByJson(dropdown, data, -1, 'please select');
        }

        function updateCommune(jsondata) {
            let dropdown = $('#commune');
            let data = jsondata.data;
            helper.makeDropdownByJson(dropdown, data, -1, 'please select');
        }
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
                <div class="card-body table-responsive">
                    <table class="table  table-striped">
                        <thead>
                            <tr>
                                <th style="width: 100px">@lang('dev.type')</th>
                                <th style="width: 400px">@lang('dev.question')</th>
                                <th>@lang('dev.response')</th>
                            </tr>
                        </thead>
                        {{--  --}}
                        <tbody>
                            <tr>
                                <td colspan="3">{{ $question['ggeo']['label'] ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><i class="ace-icon fa fa-calendar-alt text-sm"></i></td>
                                <td>{{ $question['date']['label'] ?? '' }}</td>
                                <td>
                                    <input type="date" name="date" class="form-control"
                                        value="{{ $input['date'] ?? '' }}">

                                </td>
                            </tr>

                            <tr>
                                <td><i class="ace-icon fa fa-font text-sm"></i></td>
                                <td>{{ $question['inter_name']['label'] ?? '' }}</td>
                                <td>

                                    <input type="text" name="inter_name" class="form-control"
                                        value="{{ $input['inter_name'] ?? '' }}">
                                </td>
                            </tr>

                            <tr>
                                <td><i class="ace-icon fa fa-image text-sm"></i></td>
                                <td>{{ $question['signature']['label'] ?? '' }}</td>
                                <td>


                                </td>
                            </tr>
                            <tr>
                                <td><i class="ace-icon fa fa-font text-sm"></i></td>
                                <td>{{ $question['resp_name']['label'] ?? '' }}</td>
                                <td>

                                    <input type="text" name="resp_name" class="form-control"
                                        value="{{ $input['resp_name'] ?? '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td><i class="ace-icon fa fa-list text-sm"></i></td>
                                <td>{{ $question['province']['label'] ?? '' }}</td>
                                <td>

                                    <select class="form-control input-sm" name="province" id="province">
                                        <option value="">-- {{ __('me.app.ps') }} --</option>
                                        {!! cmb_listing($provinces, [$input['province'] ?? ''], '', '') !!}
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="ace-icon fa fa-list text-sm"></i></td>
                                <td>{{ $question['district']['label'] ?? '' }}</td>
                                <td>

                                    <select class="form-control input-sm" name="district" id="district">
                                        <option value="">-- {{ __('me.app.ps') }} --</option>
                                        {!! cmb_listing($districts, [$input['district'] ?? ''], '', '') !!}
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td><i class="ace-icon fa fa-list text-sm"></i></td>
                                <td>{{ $question['commune']['label'] ?? '' }}</td>
                                <td>

                                    <select class="form-control input-sm" name="commune" id="commune">
                                        <option value="">-- {{ __('me.app.ps') }} --</option>
                                        {!! cmb_listing($communes, [$input['commune'] ?? ''], '', '') !!}
                                    </select>
                                </td>
                            </tr>

                            </td>
                            </tr>
                            {{--  --}}
                            {{--  --}}
                            <tr>
                                <td><i class="ace-icon fa fa-check-circle  text-sm"></i></td>
                                <td>{{ $question['userlevel']['label'] ?? '' }}</td>
                                <td>
                                    @php
                                        $using = $input['userlevel'] ?? '';
                                        $userlevel = config('me.kobo.userlevel');
                                        
                                    @endphp
                                    @foreach ($userlevel as $key => $label)
                                        <label class="radio-inline" style="padding-right:10px">
                                            <input type="radio" name="userlevel" value="{{ $key }}"
                                                {{ $key == $using ? 'checked' : '' }}> {{ $label }}
                                        </label>
                                    @endforeach

                                </td>
                            </tr>
                            <tr>
                                <td><i class="ace-icon fa fa-check-circle  text-sm"></i></td>
                                <td>{{ $question['formtype']['label'] ?? '' }}</td>
                                <td>
                                    @php
                                        $using = $input['formtype'] ?? '';
                                        $formtype = config('me.kobo.formtype');
                                        
                                    @endphp
                                    @foreach ($formtype as $key => $label)
                                        <label class="radio-inline" style="padding-right:10px">
                                            <input type="radio" name="formtype" value="{{ $key }}"
                                                {{ $key == $using ? 'checked' : '' }}> {{ $label }}
                                        </label>
                                    @endforeach

                                </td>
                            </tr>
                            {{--  --}}

                            {{--  --}}
                            <tr>
                                <td><i class="ace-icon fa fa-check-circle  text-sm"></i></td>
                                <td>{{ $question['formuse']['label'] ?? '' }}</td>
                                <td>
                                    @php
                                        $using = $input['formuse'] ?? '';
                                        $formuse = config('me.kobo.formuse');
                                        
                                    @endphp
                                    @foreach ($formuse as $key => $label)
                                        <label class="radio-inline" style="padding-right:10px">
                                            <input type="radio" name="formuse" value="{{ $key }}"
                                                {{ $key == $using ? 'checked' : '' }}> {{ $label }}
                                        </label>
                                    @endforeach

                                </td>
                            </tr>
                            {{--  --}}
                            <tr>
                                <td><i class="ace-icon fa fa-check-circle  text-sm"></i></td>
                                <td>{{ $question['year']['label'] ?? '' }}</td>
                                <td>
                                    @php
                                        $using = $input['year'] ?? '';
                                        $round = config('me.kobo.year');
                                        
                                    @endphp
                                    @foreach ($round as $key => $label)
                                        <label class="radio-inline" style="padding-right:10px">
                                            <input type="radio" name="year" value="{{ $key }}"
                                                {{ $key == $using ? 'checked' : '' }}> {{ $label }}
                                        </label>
                                    @endforeach

                                </td>
                            </tr>
                            <tr>
                                <td><i class="ace-icon fa fa-check-circle  text-sm"></i></td>
                                <td>{{ $question['round']['label'] ?? '' }}</td>
                                <td>
                                    @php
                                        $using = $input['round'] ?? '';
                                        $round = config('me.kobo.round');
                                        // ["1st Round" => "ជុំទី ១", "2nd Round" => "ជុំទី ២", "3rd Round" => "ជុំទី ៣", "4th Round"=>"ជុំទី ៤"];
                                    @endphp
                                    @foreach ($round as $key => $label)
                                        <label class="radio-inline" style="padding-right:10px">
                                            <input type="radio" name="round" value="{{ $key }}"
                                                {{ $key == $using ? 'checked' : '' }}> {{ $label }}
                                        </label>
                                    @endforeach

                                </td>
                            </tr>
                            <tr>
                                <td><i class="ace-icon fa fa-check-circle  text-sm"></i></td>
                                <td>{{ $question['phase']['label'] ?? '' }}</td>
                                <td>
                                    @php
                                        $using = $input['phase'] ?? '';
                                        $phase = config('me.kobo.phase');
                                        // ["1st Round" => "ជុំទី ១", "2nd Round" => "ជុំទី ២", "3rd Round" => "ជុំទី ៣", "4th Round"=>"ជុំទី ៤"];
                                    @endphp
                                    @foreach ($phase as $key => $label)
                                        <label class="radio-inline" style="padding-right:10px">
                                            <input type="radio" name="phase" value="{{ $key }}"
                                                {{ $key == $using ? 'checked' : '' }}> {{ $label }}
                                        </label>
                                    @endforeach

                                </td>
                            </tr>



                            {{--  --}}
                            <tr>
                                <td colspan="3">{{ $question['gindic']['label'] ?? '' }}</td>
                            </tr>
                            @foreach ($columns as $item)
                                <tr>
                                    <td><b>123</b></td>
                                    <td>
                                        {{ $question[$item]['label'] ?? '' }}
                                        <br>
                                        {{ $question[$item]['validation'] ?? '' }}
                                    </td>
                                    <td>
                                        <input type="text" name="{{ $item }}" class="form-control"
                                            value="{{ $input[$item] ?? '' }}">
                                        <span id="{{ $item }}-error" class="error invalid-feedback"
                                            style="display: block;font-size:13px"></span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                <!-- /.card-body -->
            </div>
            {{--  --}}


        </form>
        {{-- End From --}}
        {{--  --}}
    </div>
@endsection
