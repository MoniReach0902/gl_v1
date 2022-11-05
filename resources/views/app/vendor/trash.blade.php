@php
    //dd(request()->session()->all());
@endphp
@extends('layouts.app')
@section('blade_css')
@endsection
@push('page_css')
    @section('blade_scripts')
        <script>
            $(document).ready(function() {

                /*Please dont delete this code*/
                @if (null !== session('status') && session('status') == false)
                    helper.successAlert("{{ session('message') }}");
                @endif

                @if (null !== session('status') && session('status') == true)
                    // location.reload();
                    notif({
                        msg: message,
                        type: "success",
                        position: "right",
                        fade: true,
                        clickable: true,
                        timeout: 2000,
                    });
                @endif
                /*please dont delete this above code*/

                // let foo = (bar)=>{
                //     console.log('foo-bar');
                // };

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

        <section style="position: sticky;top: 64px; z-index:2" class="content-header bg-light ct-bar-action ct-bar-action-shaddow">
            
            <div class="col-lg-12 col-md-12 sticky">
                <div class="card custom-card" id="right">
                    <div class="card-body">
                        <div class="text-wrap">
                            <div class="example">
                                <nav class="breadcrumb-4 d-flex">
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
                                        @include('app._include.btn_index', [
                                            'new' => false,
                                            'trash' => false,
                                            // 'active' => true,
                                        ])
                
                                        <a href="{{ url_builder('admin.controller', [$obj_info['name'], 'index']) }}"
                                            class="btn btn-outline-info button-icon">@lang('btn.btn_back')</a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        {{-- end header --}}
        <div class="container-fluid">
        
                <form class="frmsearch-{{ $obj_info['name'] }}">
                    <div class="form-row justify-content-end" style="font-size: 11px">
                        <div class="form-group col-md-6">
                            <label for="txt">@lang('dev.search')</label>
                            <input type="text" class="form-control input-sm" name="txtvendor" id="txt"
                                value="{{ request()->get('txtvendor') ?? '' }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="year">@lang('dev.type')</label>
                            <select class="form-control input-sm" name="type" id="type">
                                <option value="">-- {{ __('dev.non_select') }} --</option>
                                {!! cmb_listing(
                                    ['equipment' => __('table.equipment'), 'shop' => __('table.product_shop')],
                                    [request()->get('type') ?? ''],
                                    '',
                                    '',
                                    '',
                                ) !!}
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="year">@lang('dev.status')</label>
                            <select class="form-control input-sm" name="status" id="status">
                                <option value="">--{{ __('dev.non_select') }} --</option>
                                {!! cmb_listing(
                                    ['yes' => __('table.enable'), 'no' => __('table.disable')],
                                    [request()->get('status') ?? ''],
                                    '',
                                    '',
                                    '',
                                ) !!}
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
                                onclick="location.href='{{ url()->current() }}'"><i class="fa fa-refresh"
                                    aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </form>

            <div class="card-body table-responsive p-0 mg-t-20">
                <table class="table  table-striped table-hover text-nowrap table-bordered">
                    @if (isset($istrash) && $istrash)
                        <thead style="color: var(--warning)">
                        @else
                            <thead style="color: var(--info)">
                    @endif
                    <tr>
                        <th style="width: 10px">@lang('table.id')</th>
                        <th style="width: 150px;">@lang('table.image_logo')</th>
                        <th>@lang('table.name')</th>
                        <th style="width: 10%">@lang('table.create_date')</th>
                        <th style="width: 10%">@lang('table.create_by')</th>
                        <th style="width: 20px;">@lang('table.status')</th>
                        <th style="width: 40px; text-align: center"><i class="fa fa-ellipsis-h"></i></th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $vendors)
                            <tr>
                                <td>{{ $vendors->vendor_id }}</td>
                                <td>

                                    <a href="{{ asset('storage/app/vendor/' . $vendors['image_url']) }}"
                                        data-caption="IMAGE-01" data-id="lion" class="js-img-viewer">
                                        <img src="{{ asset('storage/app/vendor/' . $vendors['image_url']) }}" width="150px"
                                            height="100px">
                                    </a>

                                </td>
                                <td>{{ $vendors['text'] }}</td>
                                <td>{{ $vendors->create_date }}</td>
                                <td>{{ $vendors->username }}</td>
                                <td style="width: 20px">
                                    @if ($vendors->status == 'yes')
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
                                        'rowid' => $vendors->vendor_id,
                                        'edit' => false,
                                        'trash' => false,
                                        'restore' => true,
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

        </div>
    @endsection
