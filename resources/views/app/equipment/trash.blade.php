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
        <section style="position: sticky;top: 64px;" class="content-header bg-light d-flex ct-bar-action ct-bar-action-shaddow">
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
                        @include('app._include.btn_index', [
                            'new' => true,
                            'trash' => false,
                            // 'active' => true,
                        ])

                        <a href="{{ url_builder('admin.controller', [$obj_info['name'], 'index']) }}"
                            class="btn btn-outline-info button-icon">@lang('btn.btn_back')</a>
                    </div>

                </div>
        </section>
        {{-- end header --}}
        <div class="container-fluid">
            <div class="card-header mg-t-20">
                <form class="frmsearch-{{ $obj_info['name'] }}">
                    <div class="form-row justify-content-end" style="font-size: 11px">
                        <div class="form-group col-md-2">
                            <label for="txt">@lang('dev.search')</label>
                            <input type="text" class="form-control input-sm" name="txtequipment" id="txt"
                                value="{{ request()->get('txtequipment') ?? '' }}">
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
            </div>



            <div class="card-body p-0 mg-t-20">
                <!-- row -->
                <div class="row row-sh">

                    @foreach ($results as $equipments)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-body iconfont text-start">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title mb-3">{{ $equipments['text'] }}</h4>
                                    <div class="card-chart brround ms-auto mt-0">
                                        @include('app._include.btn_record', [
                                            'rowid' => $equipments->equipment_id,
                                            'edit' => false,
                                            'trash' => false,
                                            'restore' => true,
                                        ])
                                    </div>
                                </div>
                                    @if ($equipments->status == 'yes')
                                    <span class="badge bg-dark">
                                        @lang('table.enable')
                                    @else
                                        <span class="badge bg-danger">
                                            @lang('table.disable')
                                    @endif
                                        </span>
                                <div class="d-flex mb-0">
                                    <div class="">
                                        <h5 class="mb-1">{{ $equipments['text_inventory'] }}</h5>
                                        <p class="mb-2 tx-12 text-muted">{{ $equipments->seria_number }}</p>
                                    </div>
                                    
                                </div>

                                <small class="mb-0  text-muted">{{ $equipments->location }}<span class="float-end text-muted">{{ $equipments->create_date }}</span></small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- /row -->
                <!-- Pagination and Record info -->
                @include('app._include.pagination')
                <!-- /. end -->

            </div>

        </div>
    @endsection
