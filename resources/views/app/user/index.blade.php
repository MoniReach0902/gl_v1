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
                    @include('app._include.btn_index', ['new' => true, 'trash' => true, 'active' => true])
                </div>
            </div>
        </div>
    </section>
    {{-- end header --}}
    <div class="container-fluid">
        {{--  --}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button onclick="not6()" class="btn btn-primary mg-t-5">Primary</button>

            <div class="card-body table-responsive p-0">
                <table class="table  table-striped table-hover text-nowrap table-bordered">
                    @if (isset($istrash) && $istrash)
                        <thead style="color: var(--warning)">
                        @else
                            <thead style="color: var(--info)">
                    @endif

                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Location</th>
                        <th>Permission</th>
                        <th style="width: 40px">Status</th>
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
                                <td>
                                    {{ implode('>', [$row->province, $row->district, $row->commune]) }}
                                </td>
                                <td>{!! $row->permission !!}</td>
                                <td>
                                    @if ($row->userstatus == 'yes')
                                        <span class="badge bg-success">
                                            Enable
                                        @else
                                            <span class="badge bg-danger">
                                                Disable
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
