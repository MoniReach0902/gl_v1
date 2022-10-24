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
    <section class="content-header bg-light d-flex ct-bar-action ct-bar-action-shaddow">
        <div class="container-fluid">
            <div class="d-flex border br-5">
                <div class="flex-grow-1">
                    <h5 class="mb-2 mg-t-20 mg-l-20">
                        {{-- {!! $obj_info['icon'] !!} --}}
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
        <div class="row">
            <div class="col-md-12" id="media-box">
                <div class="media" id="media">
                    <!-- container -->
                    <div class="main-container container-fluid">
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12 col-xl-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="tx-18 mb-4">
                                            {{-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                                <div class="card custom-card text-center">
                                                    <div class="card-body">
                                                        <div>
                                                            <h6 class="card-title mb-1">Ajax Alert</h6>
                                                            <p class="text-muted card-sub-title">With a loader (for a AJAX
                                                                requests)
                                                            </p>
                                                        </div>
                                                        <div class="btn ripple btn-pink" id='swal-ajax'>
                                                            Click me !
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}


                                        </div>
                                    </div>
                                    <div class="col-6 col-auto">
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" placeholder="Search files.....">
                                            <span class="input-group-append">
                                                <button class="btn ripple btn-primary" type="button">Search</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach ($news as $new)
                                    <div class="col-xl-3 col-md-4 col-sm-6">
                                        <div class="card p-0 ">
                                            <div class="d-flex align-items-center px-3 pt-3">
                                                <div class="float-end ms-auto">
                                                    <a href="javascript:void(0);" class="option-dots"
                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="fe fe-edit me-2"></i> Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="fas fa-stop-circle"></i> &nbsp;Disable</a>
                                                        <a class="dropdown-item delete"
                                                            href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'totrash', $new['newevent_id']], []) }}"><i
                                                                class="fe fe-trash me-2 "></i>

                                                            Delete</a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 text-center">
                                                <div class="file-manger-icon brick">
                                                    <a  href="#"
                                                        data-caption="IMAGE-01" data-id="lion"
                                                        ><img
                                                            src="https://sabay.com/assets/images/csr/Ignite/Ignite_03.png"
                                                            style="width: 200px;height:150px" alt="img"></a>
                                                </div><br>
                                                <h6 class="mb-1 font-weight-semibold">{{ $new['create_date'] }}</h6>
                                            </div>

                                        </div>
                                    </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fas fa-stop-circle"></i> &nbsp;Disable</a>
                                                            <a class="dropdown-item delete"
                                                                href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'totrash', $new['newevent_id']], []) }}"><i
                                                                    class="fe fe-trash me-2 "></i>

                                                                Delete</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon brick">
                                                        <a  href="#"
                                                            data-caption="IMAGE-01" data-id="lion"
                                                            ><img
                                                                src="https://sabay.com/assets/images/csr/Ignite/Ignite_03.png"
                                                                style="width: 200px;height:150px" alt="img"></a>
                                                    </div><br>
                                                    <h6 class="mb-1 font-weight-semibold">{{ $new['create_date'] }}</h6>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fas fa-stop-circle"></i> &nbsp;Disable</a>
                                                            <a class="dropdown-item delete"
                                                                href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'totrash', $new['newevent_id']], []) }}"><i
                                                                    class="fe fe-trash me-2 "></i>

                                                                Delete</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon brick">
                                                        <a  href="#"
                                                            data-caption="IMAGE-01" data-id="lion"
                                                            ><img
                                                                src="https://sabay.com/assets/images/csr/Ignite/Ignite_03.png"
                                                                style="width: 200px;height:150px" alt="img"></a>
                                                    </div><br>
                                                    <h6 class="mb-1 font-weight-semibold">{{ $new['create_date'] }}</h6>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            <div class="card p-0 ">
                                                <div class="d-flex align-items-center px-3 pt-3">
                                                    <div class="float-end ms-auto">
                                                        <a href="javascript:void(0);" class="option-dots"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fe fe-edit me-2"></i> Edit</a>
                                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="fas fa-stop-circle"></i> &nbsp;Disable</a>
                                                            <a class="dropdown-item delete"
                                                                href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'totrash', $new['newevent_id']], []) }}"><i
                                                                    class="fe fe-trash me-2 "></i>

                                                                Delete</a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body pt-0 text-center">
                                                    <div class="file-manger-icon brick">
                                                        <a  href="#"
                                                            data-caption="IMAGE-01" data-id="lion"
                                                            ><img
                                                                src="https://sabay.com/assets/images/csr/Ignite/Ignite_03.png"
                                                                style="width: 200px;height:150px" alt="img"></a>
                                                    </div><br>
                                                    <h6 class="mb-1 font-weight-semibold">{{ $new['create_date'] }}</h6>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach




                                </div>
                                <!-- Pagination and Record info -->
                                {{--@include('app._include.pagination')--}}
                            </div>
                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- Container closed -->

                </div>
            </div>
        </div>
        
    </div>
@endsection
