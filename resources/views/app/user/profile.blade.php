@extends('layouts.app')
@section('blade_css')
    <style>
        .modal-backdrop {
            z-index: 1040 !important;
            position: static
        }

        .modal-content {
            margin-top: 50px;
            z-index: 1100 !important;
        }
    </style>
@endsection
@section('blade_scripts')
    <script>
        function windowfun() {
            console.log('window fun');
        }
        $(document).ready(function() {
            let route_submit = "{{ $route['submit'] }}";
            let route_cancel = "{{ $route['cancel'] ?? '' }}";
            let frm, extraFrm;

            let popModal = {
                show: false,
                size: 'modal-md'
                //modal-sm
                //modal-lg
                //modal-xl
            };
            let container = '';
            let loading_indicator = '';
            let setting = {};

            /*Please dont delete this code*/

            $(".btnsave_{{ $obj_info['name'] }}").click(function(e) {
                e.preventDefault();

                // $("#frm-{{ $obj_info['name'] }} .error").html('').hide();
                helper.silentHandler(route_submit, "frm-{{ $obj_info['name'] }}", extraFrm, setting,
                    popModal, container,
                    loading_indicator);
                // location.reload();

            });
            $(".btnusername_{{ $obj_info['name'] }}").click(function(e) {
                e.preventDefault();

                // $("#frm-{{ $obj_info['name'] }} .error").html('').hide();
                helper.silentHandler("{{ $route['username'] }}", "frm-1{{ $obj_info['name'] }}",
                    extraFrm,
                    setting,
                    popModal, container,
                    loading_indicator);

            });
            $(".btnpassword_{{ $obj_info['name'] }}").click(function(e) {
                e.preventDefault();


                // $("#frm-{{ $obj_info['name'] }} .error").html('').hide();
                helper.silentHandler("{{ $route['password'] }}", "frm-2{{ $obj_info['name'] }}",
                    extraFrm,
                    setting,
                    popModal, container,
                    loading_indicator);

            });
            @if (null !== session('status') && session('status') == false)
                $(document).Toasts('create', {
                    class: 'bg-danger ct-min-toast-width',
                    title: 'Invalid',
                    subtitle: '',
                    body: "{{ session('message') }}",
                    fade: true,
                    autohide: true,
                    delay: 3000,
                    //position: 'bottomLeft',
                });
            @endif

            @if (null !== session('status') && session('status') == true)
                $(document).Toasts('create', {
                    class: 'bg-success ct-min-toast-width',
                    title: 'Success',
                    subtitle: '',
                    body: "{{ session('message') }}",
                    fade: true,
                    autohide: true,
                    delay: 3000,
                    //position: 'bottomLeft',
                });
            @endif
            /*please dont delete this above code*/
        });
    </script>
@endsection
@section('content')
    {{-- Header --}}
    <section class="content-header bg-light sticky-top ct-bar-action ct-bar-action-shaddow ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="card" style="cursor: pointer" data-toggle="modal" data-target="#change_phone">
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light justify-content-between">
                                <a class="navbar-brand"><i class="fas fa-mobile-alt"></i>&nbsp;@lang('dev.change_phonenumber')</a>
                                <i class="fas fa-cog"></i>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">

                    <div class="card" style="cursor: pointer" data-toggle="modal" data-target="#change_username">
                        <div class="card-body">
                            <nav class="navbar navbar-light bg-light justify-content-between">
                                <a class="navbar-brand"><i class="fas fa-user-alt"></i>&nbsp;@lang('dev.change_username')</a>
                                <i class="fas fa-cog"></i>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                    <div class="card" style="cursor: pointer" data-toggle="modal" data-target="#change_password">
                        <div class="card-body">
                            <nav class="navbar  bg-light justify-content-between">
                                <a class="navbar-brand"><i class="fas fa-key"></i>&nbsp;@lang('dev.change_password')</a>
                                <i class="fas fa-cog"></i>
                            </nav>
                        </div>
                    </div>
                    <a href="{{ url_builder('admin.controller', ['user', 'changePassword']) }}" id="change-password"></a>

                </div>
            </div>

        </div>

        <div class="modal fade" id="change_phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="fas fa-mobile-alt"></i>&nbsp;@lang('dev.change_phonenumber')</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{-- Modal Phone Number --}}
                    <div class="modal-body">
                        <form name="frm-{{ $obj_info['name'] }}" id="frm-{{ $obj_info['name'] }}" method="POST"
                            action="{{ $route['submit'] }}">
                            @CSRF
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">@lang('dev.new_phone_number')</label>
                                <input type="text" class="form-control" id="" name="new_phone_number">

                                <span id="new_phone_number-error" class="error invalid-feedback"
                                    style="display: block;font-size:13px"></span>


                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">@lang('dev.password')</label>
                                <input type="password" class="form-control" id="" name="password">
                                <span id="password-error" class="error invalid-feedback"
                                    style="display: block;font-size:13px"></span>

                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-window-close"></i></button>
                        <button type="button" class="btn btn-success btnsave_user reload"><i
                                class="fas fa-save"></i></button>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="change_username" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="fas fa-user-alt"></i>&nbsp;@lang('dev.change_username')</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form name="frm-1{{ $obj_info['name'] }}" id="frm-1{{ $obj_info['name'] }}" method="POST"
                            action="{{ $route['username'] }}">
                            @CSRF
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">@lang('dev.username')</label>
                                <input type="text" class="form-control" id="" name="username">

                                <span id="username-error" class="error invalid-feedback"
                                    style="display: block;font-size:13px"></span>

                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">@lang('dev.password')</label>
                                <input type="password" class="form-control" id="" name="password1">
                                <span id="password1-error" class="error invalid-feedback"
                                    style="display: block;font-size:13px"></span>

                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-window-close"></i></button>
                        <button type="button" class="btn btn-success btnusername_user reload"><i
                                class="fas fa-save"></i></button>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5><i class="fas fa-key"></i>&nbsp;@lang('dev.change_password')</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form name="frm-2{{ $obj_info['name'] }}" id="frm-2{{ $obj_info['name'] }}" method="POST"
                            action="{{ $route['password'] }}">
                            @CSRF
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">@lang('dev.current_password')</label>
                                <input type="password" class="form-control" id="" name="current_password">

                                <span id="current_password-error" class="error invalid-feedback"
                                    style="display: block;font-size:13px"></span>

                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">@lang('dev.password')</label>
                                <input type="password" class="form-control" id="" name="password2">
                                <span id="password2-error" class="error invalid-feedback"
                                    style="display: block;font-size:13px"></span>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">@lang('dev.confirm_password')</label>
                                <input type="password" class="form-control" id="" name="password_confirmation">
                                <span id="password_confirmation-error" class="error invalid-feedback"
                                    style="display: block;font-size:13px"></span>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-window-close"></i></button>
                        <button type="button" class="btn btn-success btnpassword_user reload"><i
                                class="fas fa-save "></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('page_scripts')
    <script>
        $(document).ready(function() {
            $('.reload').click(function() {
                setTimeout(() => {
                    location.reload();
                }, 2000);
            })
        })
    </script>
@endpush
