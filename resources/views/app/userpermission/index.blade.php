@php
//dd(request()->session()->all());
@endphp
@extends('layouts.app')
@section('blade_css')
@endsection
@section('blade_scripts')
    <script>
        function windowfun() {
            console.log('window fun');
        }

        @if (Session::has('status'))
            notif({
                type: "info",
                msg: "Welcome to Nowa",
                position: "right",
                bottom: '10'
            });
        @endif

        $(document).ready(function() {

            /*Please dont delete this code*/
            @if (null !== session('status') && session('status') == false)
                helper.successAlert("{{ session('message') }}");
            @endif

            @if (null !== session('status') && session('status') == true)
                helper.successAlert("{{ session('message') }}");
            @endif
            /*please dont delete this above code*/



            // let foo = (bar)=>{
            // console.log('foo-bar');
            // };

            $("#btnnew_{{ $obj_info['name'] }}").click(function(e) {
                let route_create = "{{ $route['create'] }}";
                // let extraFrm = {}; //{jscallback:'test'};
                // let setting = {};//{fnSuccess:foo};
                // let popModal = {
                // show: true,
                // size: 'modal-lg'
                // //modal-sm, modal-lg, modal-xl
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

            <div class="card-body table-responsive p-0">
                <table class="table  table-striped table-hover text-nowrap table-bordered">
                    @if (isset($istrash) && $istrash)
                        <thead style="color: var(--warning)">
                        @else
                            <thead style="color: var(--info)">
                    @endif

                    <tr>
                        <th style="width: 10px">ID</th>
                        <th>Permission Title</th>
                        <th>Rule</th>
                        <th style="width: 40px">Status</th>
                        <th style="width: 40px; text-align: center"><i class="fa fa-ellipsis-h"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                        {{-- @for ($i = 0; $i < 20; $i++) --}}
                        @foreach ($results as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{!! $row->title !!}</td>
                                <td>
                                    {{-- start check lavel setting --}}
                                    @if (!empty($row->levelsetting))
                                        @php
                                            $objarr = [];
                                            $objmethod = '';
                                            $levelsetting = json_decode($row->levelsetting, true);
                                            foreach ($levelsetting as $setting) {
                                                [$obj, $method] = explode('-', $setting);
                                                //$method = ucfirst($method);
                                                if (array_key_exists($obj, $objarr)) {
                                                    array_push($objarr[$obj], $method);
                                                } else {
                                                    $objarr[$obj] = [$method];
                                                }
                                            }
                                            
                                            $ind = 0;
                                            $styles = ['info', 'success'];
                                        @endphp
                                        {{-- start draw stting info --}}
                                        @if (!empty($objarr))
                                            @foreach ($objarr as $name => $action)
                                                @if ($definelevel[$name]['protectme']['display'] == 'yes')
                                                    @php
                                                        $ind++;
                                                        $obj_title = $definelevel[$name]['title'];
                                                        $mod = $ind % 2;
                                                        $style = $styles[$mod];
                                                    @endphp
                                                    <div class="callout callout-{{ $style }}"
                                                        style="padding: 5px; margin-bottom:10px">
                                                        <div style="display: flex">
                                                            <div style="margin-right:5px;">
                                                                <span class="badge bg-{{ $style }}"
                                                                    style="min-width:150px; padding:5px; text-align: left">{{ $obj_title }}
                                                                </span>
                                                            </div>
                                                            <div>
                                                                @foreach ($action as $val)
                                                                    <span class="badge bg-secondary">
                                                                        {{ $definelevel[$name]['protectme']['method'][strtolower($val)]['title'] }}
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        {{-- end --}}
                                    @endif
                                    {{-- end lavel setting --}}


                                </td>
                                <td>
                                    @if ($row->level_status == 'yes')
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
