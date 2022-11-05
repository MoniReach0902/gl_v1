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
                        title: "{{ __('table.are_your_sure_delete') }}",
                        text: "",
                        type: "warning",
                        showCancelButton: true,
                        cancelButtonText: "{{__('table.cancel')}}",
                        cancelButtonColor: 'danger',
                        closeOnConfirm: false,
                        confirmButtonText: "{{__('btn.btn_OK')}}",
                        showLoaderOnConfirm: true
                    }, function() {
                        setInterval(() => {
                            window.location.href = link;
                            // swal("Delete finished!");
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
                                            'new' => true,
                                            'trash' => true,
                                            'active' => true,
                                        ])
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
            <div style="position: sticky;top: 74px;" class="card-header mg-t-20">
                <form class="frmsearch-{{ $obj_info['name'] }}">
                    <div class="form-row justify-content-end" style="font-size: 11px;">
                        <div class="form-group col-md-2">
                            <label for="txt">@lang('dev.search')</label>
                            <input type="text" class="form-control input-sm" name="txtequipment" id="txt"
                                value="{{ request()->get('txtequipment') ?? '' }}">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inventory_id">@lang('dev.inventory')</label>
                            <select class="form-control input-sm" name="inventory_id" id="inventory">
                                <option value="">-- {{ __('dev.non_select') }}--</option>
                                {!! cmb_listing($inventory,  [request()->get('inventory_id') ?? ''], '', '') !!}
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="vendor_id">@lang('dev.vendor')</label>
                            <select class="form-control input-sm" name="vendor_id" id="vendor">
                                <option value="">-- {{ __('dev.non_select') }}--</option>
                                {!! cmb_listing($vendor,  [request()->get('vendor_id') ?? ''], '', '') !!}
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
            </div>

            <form name="frm-2{{ $obj_info['name'] }}" id="frm-2{{ $obj_info['name'] }}" method="POST"
                action="{{ $route['submit'] }}" enctype="multipart/form-data">
                {{-- please dont delete these default Field --}}
                @CSRF
                <input type="hidden" name="{{ $fprimarykey }}" id="{{ $fprimarykey }}"
                    value="{{ $input[$fprimarykey] ?? '' }}">
                <input type="hidden" name="jscallback" value="{{ $jscallback ?? (request()->get('jscallback') ?? '') }}">


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
                                            'edit' => true,
                                            'trash' => true,
                                            'disable' => $equipments->status_equipment == 'no' ? false : true,
                                            'enable' => $equipments->status_equipment == 'yes' ? false : true,
                                            ])
										</div>
									</div>
                                        @if ($equipments->status_equipment == 'yes')
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
            </form>
        </div>
    @endsection
