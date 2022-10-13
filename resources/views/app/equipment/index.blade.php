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
                alert(1);
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
        <div class="card custom-card">
            <div class="card-body pb-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Searching.....">
                    <span class="input-group-append">
                        <button class="btn ripple btn-primary" type="button">Search</button>
                    </span>
                </div>
            </div>
            <div class="card-body ps-0 pe-0 bd-t-0 pt-0">
                <div class="main-content-body-profile mb-3">
                    <nav class="nav main-nav-line">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab1">All</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab2">Inventory name1</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab3">Inventory name2</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab4">Inventory name3</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab5">Inventory name4</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab2">Inventory name1</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab3">Inventory name2</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab4">Inventory name3</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab5">Inventory name4</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab2">Inventory name1</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab3">Inventory name2</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab4">Inventory name3</a>
                        <a class="nav-link" data-bs-toggle="tab" href="#tab5">Inventory name4</a>
                    </nav>
                </div>
            </div>
        </div>

        <form name="frm-2{{ $obj_info['name'] }}" id="frm-2{{ $obj_info['name'] }}" method="POST"
            action="{{ $route['submit'] }}" enctype="multipart/form-data">
            {{-- please dont delete these default Field --}}
            @CSRF
            <input type="hidden" name="{{ $fprimarykey }}" id="{{ $fprimarykey }}"
                value="{{ $input[$fprimarykey] ?? '' }}">
            <input type="hidden" name="jscallback" value="{{ $jscallback ?? (request()->get('jscallback') ?? '') }}">



            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0 text-md-nowrap">
                        <thead>
                            @if (isset($istrash) && $istrash)
                                <thead style="color: var(--warning)">
                                @else
                                    <thead style="color: var(--info)">
                            @endif
                            <tr>
                                <th>Name</th>
                                <th>Seria code</th>
                                <th>Location</th>
                                <th>Model</th>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Brand</th>
                                <th style="width: 40px">Status</th>
                                <th style="width: 40px; text-align: center"><i class="fa fa-ellipsis-h"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipment as $equipments)
                                <tr>
                                    <td>{{ $equipments['text'] }}</td>
                                    <td>{{ $equipments['seria_number'] }}</td>
                                    <td>{{ $equipments['location'] }}</td>
                                    <td>{{ $equipments['model'] }}</td>
                                    <td>{{ $equipments['description'] }}</td>
                                    <td>{{ $equipments['cost'] }} USD</td>
                                    <td>{{ $equipments['brand_id'] }}</td>
                                    <td style="width: 10%">
                                        @if ($equipments->status == 'yes')
                                        <span class="badge bg-dark">
                                            Enable
                                        @else
                                            <span class="badge bg-danger">
                                                Disable
                                    @endif
                                    </span>
                                    </td>
                                    <td> 
                                    @include('app._include.btn_record', [
                                        'rowid' => $equipments->equipments_id,
                                        'edit' => true,
                                        'trash' => true,
                                        'delete' => true,
                                    ])</td>
                                </tr>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

        </form>




        {{--  --}}
    </div>
@endsection
