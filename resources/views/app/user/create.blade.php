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

            $("#province_id").change(function(e) {
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

            $("#district_id").change(function(e) {
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
            $('#permission_id').change(function() {
                var eThis = $(this);
                if (eThis.val() == 1) {
                    $('.hidden').hide();
                } else {
                    $('.hidden').show();
                }

            })

        });

        function updateDistrict(jsondata) {
            let dropdown = $('#district_id');
            let data = jsondata.data;
            helper.makeDropdownByJson(dropdown, data, -1, 'please select');
        }

        function updateCommune(jsondata) {
            let dropdown = $('#commune_id');
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
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <div class="card card-default color-palette-box">

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">@lang('dev.name')</label>
                                <input type="email" class="form-control" name="fullname" id="fullname"
                                    placeholder="Enter fullname" value="{{ $input['fullname'] ?? '' }}">
                                <span id="fullname-error" class="error invalid-feedback" style="display: none"></span>
                            </div>
                            <div class="form-group">
                                <label for="name">@lang('dev.username')</label>
                                <input type="email" class="form-control" name="name" id="name"
                                    placeholder="Enter name" value="{{ $input['name'] ?? '' }}">
                                <span id="name-error" class="error invalid-feedback" style="display: none"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">@lang('dev.phone')</label>
                                <input type="tel" class="form-control" name="phone" id="phone"
                                    placeholder="Phone Number" value="{{ $input['email'] ?? '' }}">
                                <span id="phone-error" class="error invalid-feedback" style="display: none"></span>
                            </div>
                            <div class="form-group">
                                <label for="permission_id">@lang('dev.permission')</label>
                                <select class="form-control input-sm" name="permission_id" id="permission_id">
                                    <option value="">-- {{ __('dev.noneselected') }}--</option>
                                    <option value="1">Top Admin</option>
                                    {!! cmb_listing($permission, [$input['permission_id'] ?? ''], '', '') !!}
                                </select>
                                <span id="permission_id-error" class="error invalid-feedback" style="display: none"></span>
                            </div>
                            @if (!$isupdate)
                                <div class="form-group">
                                    <label for="password">@lang('dev.password')</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Enter password">
                                    <span id="password-error" class="error invalid-feedback" style="display: none"></span>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">@lang('dev.confirm_password')</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        id="password_confirmation" placeholder="Enter cofirm password">
                                    <span id="password_confirmation-error" class="error invalid-feedback"
                                        style="display: none"></span>
                                </div>
                            @endif


                            <div class="form-group hidden">
                                <label for="province_id">@lang('dev.userlevel')</label>
                                <select class="form-control input-sm select2" name="userlevel[]" id="userlevel" multiple>
                                    <option value="">-- {{ __('dev.noneselected') }} --</option>
                                    {!! cmb_listing(config('me.kobo.userlevel'), $input['userlevel'] ?? [], '', '') !!}
                                </select>
                                <span id="userlevel-error" class="error invalid-feedback" style="display: none"></span>
                            </div>
                            <div class="form-group hidden">
                                <label for="province_id">@lang('dev.formtype')</label>
                                <select class="form-control input-sm" name="formtype[]" id="formtype" multiple>
                                    <option value="0">-- {{ __('dev.noneselected') }} --</option>
                                    {!! cmb_listing(config('me.kobo.formtype'), $input['formtype'] ?? [], '', '') !!}
                                </select>
                                <span id="formtype-error" class="error invalid-feedback" style="display: none"></span>
                            </div>
                            <div class="form-group hidden">
                                <label for="province_id">@lang('dev.formuse')</label>
                                <select class="form-control input-sm" name="formuse[]" id="formuse" multiple>
                                    <option value="">-- {{ __('dev.noneselected') }} --</option>
                                    {!! cmb_listing(config('me.kobo.formuse'), $input['formuse'] ?? [], '', '') !!}
                                </select>
                                <span id="formuse-error" class="error invalid-feedback" style="display: none"></span>
                            </div>

                            <div class="form-group hidden">
                                <label for="province_id">@lang('dev.province')</label>
                                <select class="form-control input-sm" name="province_id" id="province_id">
                                    <option value="">-- {{ __('dev.noneselected') }} --</option>
                                    <option value="0">@lang('dev.national_level')</option>
                                    {!! cmb_listing($provinces, [$input['province_id'] ?? ''], '', '') !!}
                                </select>
                                <span id="province_id-error" class="error invalid-feedback" style="display: none"></span>
                            </div>

                            <div class="form-group hidden">
                                <label for="district_id">@lang('dev.district')</label>
                                <select class="form-control input-sm" name="district_id" id="district_id">
                                    <option value="">-- {{ __('dev.noneselected') }} --</option>
                                    {!! cmb_listing($districts, [$input['district_id'] ?? ''], '', '') !!}
                                </select>
                            </div>

                            <div class="form-group hidden">
                                <label for="commune_id">@lang('dev.commune')</label>
                                <select class="form-control input-sm" name="commune_id" id="commune_id">
                                    <option value="">-- {{ __('dev.noneselected') }} --</option>
                                    {!! cmb_listing($communes, [$input['commune_id'] ?? ''], '', '') !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">@lang('dev.status')</label>
                                <br>
                                {!! check_select('userstatus', ['Enable' => 'yes', 'Disable' => 'no'], $input['userstatus'] ?? '', '') !!}
                            </div>



                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{--  --}}
                </div>
            </div>




        </form>
        {{-- End From --}}
        {{--  --}}
    </div>
@endsection
