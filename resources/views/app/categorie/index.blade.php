@php
//dd(request()->session()->all());
@endphp
@extends('layouts.app')
@section('blade_css')
@endsection
@section('blade_scripts')
    <script>
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
            location.reload();
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
            $("#save_img").click(function(e) {
                // alert(1);
                let route_submit = "{{ $route['submit'] }}";
                // alert(route_submit);
                // e.preventDefault();
                // let route_import = "{{ $route['create'] }}";
                let extraFrm = {}; //{jscallback:'test'};
                let setting = {}; //{fnSuccess:foo};
                let container = '';
                let loading_indicator = '';
                let popModal = {
                    show: false,
                    size: 'modal-xl'
                    //modal-sm, modal-lg, modal-xl
                };
                helper.silentHandler(route_submit, "frm-2{{ $obj_info['name'] }}",
                    extraFrm,
                    setting,
                    popModal, container,
                    loading_indicator);

            });
            $('.delete').click(function(e) {
                e.preventDefault();
                var link = $(this).attr("href");
                $('body').removeClass('timer-alert');
                swal({
                    title: "Are your sure to delete ?",
                    text: "",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    setInterval(() => {
                        window.location.href = link;
                        swal("Delete finished!");
                    }, 1000);
                });
            });
            

            $("#btnnew_{{ $obj_info['name'] }}").click(function(e) {

                let route_create = "{{ $route['create'] }}";

                window.location = route_create;
                //     loading_indicator);
            });

            $("#btntrash_{{ $obj_info['name'] }}").click(function(e) {
                let route_create = "{{ $route['trash'] ?? '' }}";
                window.location = route_create;

            });


            $('.btn_remove').on('click', function() {
                var eThis = $(this);
                var p = eThis.parents('#photo');
                var id = p.find('#id').val();
                p.find('#img_id').val(id * -1);

                // alert(id);
                // p.hide();
                // alert(id * -1);

            })

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
                    @include('app._include.btn_index', ['new' => true, 'trash' => true, 'active' => true])
                </div>

            </div>
    </section>
    {{-- end header --}}
    <div class="container-fluid">
        <div class="card-header mg-t-20">
            <form class="frmsearch-{{ $obj_info['name'] }}">
                <div class="form-row" style="font-size: 11px">
                    <div class="form-group col-md-2">
                        <label for="txt">@lang('dev.search')</label>
                        <input type="text" class="form-control input-sm" name="txtcategorie" id="txt"
                            value="{{ request()->get('txtcategorie') ?? '' }}">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="year">@lang('dev.status')</label>
                        <select class="form-control input-sm" name="status" id="status">
                            <option value="">-- {{ __('dev.non_select') }} --</option>
                            {!! cmb_listing(['yes' => 'Enable', 'no' => 'Disable'], [request()->get('status') ?? ''], '', '', '') !!}
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

        <form name="frm-2{{ $obj_info['name'] }}" id="frm-2{{ $obj_info['name'] }}" method="POST"
            action="{{ $route['submit'] }}" enctype="multipart/form-data">
            {{-- please dont delete these default Field --}}
            @CSRF
            <input type="hidden" name="{{ $fprimarykey }}" id="{{ $fprimarykey }}"
                value="{{ $input[$fprimarykey] ?? '' }}">
            <input type="hidden" name="jscallback" value="{{ $jscallback ?? (request()->get('jscallback') ?? '') }}">


            <div class="card-body table-responsive p-0 mg-t-20">
                <table class="table  table-striped table-hover text-nowrap table-bordered">
                    @if (isset($istrash) && $istrash)
                                <thead style="color: var(--warning)">
                                @else
                                    <thead style="color: var(--info)">
                            @endif
                            <tr>
                                <th style="width: 10px">@lang('table.id')</th>
                                <th>@lang('table.name')@lang('table.category')</th>
                                <th>@lang('table.create_date')</th>
                               {{-- <th>@lang('table.update_date')</th> --}}
                                <th>@lang('table.crate_by')</th>
                                <th style="width: 40px;">@lang('table.status')</th>
                                <th style="width: 40px; text-align: center"><i class="fa fa-ellipsis-h"></i></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $categories)
                                <tr>
                                    <td>{{ $categories->categorie_id }}</td>
                                    <td>{{ $categories['text'] }}</td>
                                    <td style="width: 10%">{{ $categories->create_date }}</td>
                                   {{-- <td style="width: 10%">{{ $categories->update_date }}</td> --}}
                                    <td style="width: 10%">{{ $categories->username }}</td>
                                    <td style="width: 20px">
                                        @if ($categories->status == 'yes')
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
                                        'rowid' => $categories->categorie_id,
                                        'edit' => true,
                                        'trash' => true,
                                        'delete' => true,
                                    ])
                                </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
     <!-- Pagination and Record info -->
     @include('app._include.pagination')
                <!-- /. end -->
    
            </div>
        </form>
    </div>
@endsection
