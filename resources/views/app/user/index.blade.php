@extends('layouts.app')
@section('blade_css')
@endsection
@section('blade_scripts')
    <script>
        function windowfun() {
            console.log('window fun');
        }
        $(document).ready(function() {

            /*Please dont delete this code*/
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



            // let foo = (bar)=>{
            //     console.log('foo-bar');
            // };

            $("#btnnew_{{ $obj_info['name'] }}").click(function(e) {
                let route_create = "{{ $route['create'] }}";
                // let extraFrm = {}; //{jscallback:'test'};
                // let setting = {};//{fnSuccess:foo};
                // let popModal = {
                //     show: true,
                //     size: 'modal-lg'
                //     //modal-sm, modal-lg, modal-xl
                // };

                // let loading_indicator = '';
                // helper.silentHandler(route_create, null, extraFrm, setting, popModal, 'air_windows',
                // loading_indicator);

                //window.location.replace(route_create);
                window.location = route_create;

            });

            $("#btntrash_{{ $obj_info['name'] }}").click(function(e) {
                let route_create = "{{ $route['trash'] ?? '' }}";
                window.location = route_create;

            });

            $("#btnactive_{{ $obj_info['name'] }}").click(function(e) {
                let route_create = "{{ $route['active'] ?? '' }}";
                window.location = route_create;

            });




        });
    </script>
@endsection
@section('content')
    {{-- Header --}}
    <section class="content-header bg-light sticky-top ct-bar-action ct-bar-action-shaddow">
        <div class="container-fluid">
            <div class="d-flex  border br-5">
                <div class="flex-grow-1">
                    <h5 class="mb-2 mg-t-20 mg-l-20">
                        {!! $obj_info['icon'] !!}
                        <a href="{{ url_builder($obj_info['routing'], [$obj_info['name']]) }}"
                            class="ct-title-nav text-md">{{ $obj_info['title'] }}</a>
                        <small class="text-sm">
                            <i class="ace-icon fa fa-angle-double-right text-xs"></i>
                            {{ $caption ?? '' }}
                        </small>
                    </h5>
                </div>
                <div class="pd-10 ">
                    @include('app._include.btn_index', ['new' => true, 'trash' => true, 'active' => true])
                </div>

            </div>
    </section>
    {{-- end header --}}
    <div class="container-fluid">
        <div class="card-header">
            <form class="frmsearch-{{ $obj_info['name'] }}">
                <div class="form-row justify-content-end" style="font-size: 11px">
                    <div class="form-group col-md-2">
                        <label for="txt">@lang('dev.search')</label>
                        <input type="text" class="form-control input-sm" name="txt" id="txt"
                            value="{{ request()->get('txt') ?? '' }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="year">@lang('dev.status')</label>
                        <select class="form-control input-sm" name="status" id="status">
                            <option value="">-- {{ __('dev.non_select') }} --</option>
                            {!! cmb_listing(['yes' =>  __('table.enable'), 'no' =>  __('table.disable')], [request()->get('status') ?? ''], '', '', '') !!}
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label>&nbsp;</label>
                        <button type="submit" value="filter"
                            class="btn btn-outline-secondary btn-block formactionbutton"><i
                                class="fa fa-search"></i></button>
                    </div>
                    <div class="form-group col-md-1">
                        <label>&nbsp;</label>
                        <button type="button"
                            class="btn btn-outline-secondary btn-block formactionbutton border border-secondary"
                            onclick="location.href='{{ url()->current() }}'"><i class="fa fa-refresh" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        {{--  --}}



        <div class="card-body table-responsive p-0">
            <table class="table  table-striped table-hover text-nowrap table-bordered">
                @if (isset($istrash) && $istrash)
                    <thead style="color: var(--warning)">
                    @else
                        <thead style="color: var(--info)">
                @endif

                <tr>
                    <th style="width: 10px">@lang('table.id')</th>
                    <th>@lang('table.full_name')</th>
                    <th>@lang('table.user_name')</th>
                    <th>@lang('table.email')</th>

                    <th style="width: 20%">@lang('dev.permission')</th>
                    <th style="width: 40px;">@lang('table.status')</th>
                    <th style="width: 40px; text-align: center"><i class="fa fa-ellipsis-h"></i></th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($results as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{!! $row->fullname !!}</td>
                            <td>{!! $row->name !!}</td>
                            <td>{!! $row->email !!}</td>

                            <td>{!! $row->permission !!}</td>
                            <td style="width: 20px">
                                @if ($row->userstatus == 'yes')
                                <span class="badge bg-dark">
                                    @lang('table.enable')
                                @else
                                    <span class="badge bg-danger">
                                        @lang('table.disable')
                                @endif
                                    </span>
                            </td>
                            <td>
                                @include('app._include.btn_record', [
                                    'rowid' => $row->id,
                                    'edit' => true,
                                    'trash' => true,
                                    'delete' => true,
                                ])
                            </td>
                        </tr>
                    @endforeach
                    {{-- endforeach --}}
                </tbody>
            </table>

            <!-- Pagination and Record info -->
            @include('app._include.pagination')

            <!-- /. end -->

        </div>

    </div>

    {{--  --}}
    </div>
@endsection
