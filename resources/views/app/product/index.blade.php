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
        <div class="card-header">
            <form class="frmsearch-{{ $obj_info['name'] }}">
                <div class="form-row" style="font-size: 11px">
                    <div class="form-group col-md-2">
                        <label for="txt">@lang('dev.search')</label>
                        <input type="text" class="form-control input-sm" name="txtcategorie" id="txt"
                            value="{{ request()->get('txtcategorie') ?? '' }}">
                    </div>
                    <div class="form-group col-md-2">
<<<<<<< HEAD
=======
                        <label for="year">Categorie</label>
                        <select class="form-control input-sm" name="status" id="status">
                            <option value="">-- {{ __('dev.noneselected') }} --</option>
                            {!! cmb_listing(['yes' => 'Enable', 'no' => 'Disable'], [request()->get('status') ?? ''], '', '', '') !!}
                        </select>
                    </div>
                    <div class="form-group col-md-2">
>>>>>>> d6cba399928d6b78b4dd6c89856f85647cf38f17
                        <label for="year">@lang('dev.year')</label>
                        <select class="form-control input-sm" name="status" id="status">
                            <option value="">-- {{ __('dev.noneselected') }} --</option>
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
                            class="btn btn-outline-light btn-block formactionbutton border border-secondary"
                            onclick="location.href='{{ url()->current() }}'">reset
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

<<<<<<< HEAD

            <div class="card-body table-responsive p-0 mg-t-20">
                <table class="table  table-striped table-hover text-nowrap table-bordered">
                    @if (isset($istrash) && $istrash)
                                <thead style="color: var(--warning)">
                                @else
                                    <thead style="color: var(--info)">
                            @endif
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th style="width: 8%">Image</th>
                                <th>Name</th>
                                <th>Cost</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Categorie Name</th>
                                <th>Brand Name</th>
                                <th>Create date</th>
                                <th>Update date</th>
                                <th>Create By</th>
                                <th style="width: 40px">Status</th>
                                <th style="width: 40px; text-align: center"><i class="fa fa-ellipsis-h"></i></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($results as $products)
                                <tr>
                                    <td>{{ $products->product_id }}</td>
                                    <td>{{ $products['text'] }}</td>
                                    <td style="width: 10%">{{ $products->create_date }}</td>
                                    <td style="width: 10%">{{ $products->update_date }}</td>
                                    <td style="width: 10%">{{ $products->username }}</td>
                                    <td style="width: 10%">
                                        @if ($products->status == 'yes')
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
                                        'rowid' => $products->product_id,
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
=======
				<!-- container -->
				<div class="main-container container-fluid">

					<!-- row -->
					<div class="row">
						<div class="col-lg-8 col-xl-2">
							<div class="card">
								<div class="main-content-left main-content-left-mail card-body">
									<a class="btn btn-primary btn-compose" id="btnCompose" data-bs-target="#Vertically" data-bs-toggle="modal" href=""><i class="fa fa-plus me-2"></i> Add Categorie</a>
									<div class="main-mail-menu">
										<nav class="nav main-nav-column">
											<a class="nav-link thumb" href="javascript:void(0);">categorie name1<span class="badge rounded-pill bg-warning number-badge"><b>11</b></span> </a>
											<a class="nav-link thumb" href="javascript:void(0);">categorie name2<span class="badge rounded-pill bg-warning number-badge"><b>40</b></span></a>
                                            <a class="nav-link thumb" href="javascript:void(0);">categorie name3<span class="badge rounded-pill bg-warning number-badge"><b>20</b></span> </a>
											<a class="nav-link thumb" href="javascript:void(0);">categorie name4<span class="badge rounded-pill bg-warning number-badge"><b>50</b></span></a>
                                            <a class="nav-link thumb" href="javascript:void(0);">categorie name5<span class="badge rounded-pill bg-warning number-badge"><b>60</b></span> </a>
											<a class="nav-link thumb" href="javascript:void(0);">categorie name6<span class="badge rounded-pill bg-warning number-badge"><b>88</b></span></a>
										</nav>
									</div><!-- main-mail-menu -->
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-xl-10">
							<div class="text-muted mb-2 tx-16">All Brands</div>
							<div class="row">
								<div class="col-md-6 col-xl-3">
									<div class="card">
										<a href="file-manager1.html">
											<div class="card-body">
												<div class="tx-16 mb-1">
													<svg class="file-manager-icon me-2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path fill="#fbb8c7" d="M18.12158,11.88672c-1.18039-1.14226-3.05327-1.14485-4.23681-0.00586l-1.58985,1.58008c-0.39155,0.38922-0.39343,1.02216-0.00421,1.41371c0.00043,0.00043,0.00085,0.00086,0.00128,0.00129l4.67481,4.68457L17.14148,20H19c1.65611-0.00181,2.99819-1.34389,3-3v-0.83008c-0.00009-0.26567-0.10585-0.52039-0.29395-0.708L18.12158,11.88672z"/><path fill="#f74f75" d="M5,20h14c0.355-0.00278,0.70662-0.06923,1.03815-0.19617l-9.91657-9.91711C8.94094,8.74376,7.06706,8.74161,5.88379,9.88184L2.294,13.46191c-0.18812,0.1876-0.2939,0.44232-0.294,0.708V17C2.00181,18.65611,3.34389,19.99819,5,20z"/><path fill="#fa95ac" d="M19,4H5C3.34387,4.00183,2.00183,5.34387,2,7v7.16992c0.00012-0.26569,0.1059-0.52039,0.29401-0.70801l3.58978-3.58008c1.18329-1.14026,3.05713-1.13806,4.23779,0.00488l2.87585,2.87604l0.88733-0.8819c1.18353-1.13898,3.05646-1.13641,4.23682,0.00586l3.58447,3.5752c0.18811,0.18762,0.29388,0.44232,0.29395,0.70801V7C21.99817,5.34387,20.65613,4.00183,19,4z"/></svg>
													Brand item1
													<div class="float-end tx-13 text-muted mt-1">20 item</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-6 col-xl-3">
									<div class="card">
										<a href="file-manager1.html">
											<div class="card-body">
												<div class="tx-16 mb-1">
													<svg class="file-manager-icon me-2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path fill="#94daf6" d="M14,18H5c-1.65611-0.00181-2.99819-1.34389-3-3V9c0.00181-1.65611,1.34389-2.99819,3-3h9c1.65611,0.00181,2.99819,1.34389,3,3v6C16.99819,16.65611,15.65611,17.99819,14,18z"/><path fill="#4ec2f0" d="M21.89465,7.55359c-0.24683-0.49432-0.8476-0.69495-1.34192-0.44812l-3.56421,1.7821C16.98999,8.92572,16.99994,8.96149,17,9v6c-0.00006,0.03851-0.01001,0.07428-0.01147,0.11243l3.56421,1.7821C20.69165,16.96381,20.84479,16.99994,21,17c0.55212-0.00037,0.99969-0.44788,1-1V8C21.99994,7.84503,21.96387,7.6922,21.89465,7.55359z"/></svg>
													Brand item2
													<div class="float-end tx-13 text-muted mt-1">50 item</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-6 col-xl-3">
									<div class="card">
										<a href="file-manager1.html">
											<div class="card-body">
												<div class="tx-16 mb-1">
													<svg class="file-manager-icon me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#ffd79c" d="M20,9,13,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z"/><path fill="#ffbd5a" d="M20 9H15a2 2 0 0 1-2-2V2zM12 18.00031a.99943.99943 0 0 1-1-1v-2a1 1 0 1 1 2 0v2A.99943.99943 0 0 1 12 18.00031zM12 13.00031a.8444.8444 0 0 1-.37988-.08008 1.02883 1.02883 0 0 1-.33008-.21.98946.98946 0 0 1-.29-.71 1.02776 1.02776 0 0 1 .29-.71 1.60941 1.60941 0 0 1 .14941-.12012.74157.74157 0 0 1 .18067-.08984.61981.61981 0 0 1 .17968-.06055.95515.95515 0 0 1 .58008.06055 1.16023 1.16023 0 0 1 .33008.21 1.0321 1.0321 0 0 1 .29.71.99349.99349 0 0 1-.29.71A1.01024 1.01024 0 0 1 12 13.00031z"/></svg>
													Brand item3
													<div class="float-end tx-13 text-muted mt-1">100 item</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-6 col-xl-3">
									<div class="card">
										<a href="file-manager1.html">
											<div class="card-body">
												<div class="tx-16 mb-1">
													<svg class="file-manager-icon me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#f34343" d="M21.65137,2.24121a1.00561,1.00561,0,0,0-.80323-.22949l-13,2A1.00054,1.00054,0,0,0,7,5V15.35107A3.45946,3.45946,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.85779L20,9.16553v4.18554A3.45946,3.45946,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A.99909.99909,0,0,0,21.65137,2.24121Z"/></svg>
													Brand item4
													<div class="float-end tx-13 text-muted mt-1">150 item</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-6 col-xl-3">
									<div class="card">
										<a href="file-manager1.html">
											<div class="card-body">
												<div class="tx-16 mb-1">
													<svg class="file-manager-icon me-2" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" viewBox="0 0 24 24"><path fill="#aca7fb" d="M21.2,6.21l-7.58,7.58c-1.16755,1.17084-3.06319,1.17351-4.23404,0.00596C9.38397,13.79398,9.38198,13.79199,9.38,13.79L1.8,6.21C2.29464,5.16676,3.34544,4.50126,4.5,4.5h14C19.65456,4.50126,20.70536,5.16676,21.2,6.21z"/><path fill="#c8c4fc" d="M21.20001,6.21002L13.62,13.78998c-1.16754,1.17084-3.06317,1.17352-4.23401,0.00598C9.38397,13.79401,9.38196,13.79199,9.38,13.78998L1.79999,6.21002C1.60345,6.61169,1.50085,7.0528,1.5,7.5v10c0.00488,1.65485,1.34515,2.99512,3,3h14c1.65485-0.00488,2.99512-1.34515,3-3v-10C21.49915,7.0528,21.39655,6.61169,21.20001,6.21002z"/><path fill="#766df9" d="M17.5,9.5c-0.26527,0.0003-0.51971-0.10515-0.707-0.293l-2-2c-0.38694-0.39399-0.38123-1.02706,0.01276-1.414c0.38897-0.38202,1.01227-0.38202,1.40125,0L17.5,7.086l3.293-3.293c0.39399-0.38694,1.02706-0.38122,1.414,0.01277c0.38201,0.38897,0.38201,1.01226,0,1.40123l-4,4C18.01971,9.39485,17.76527,9.5003,17.5,9.5z"/></svg>
													Brand item5
													<div class="float-end tx-13 text-muted mt-1">200 item</div>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="col-md-6 col-xl-3">
									<div class="card">
										<a href="file-manager1.html">
											<div class="card-body">
												<div class="tx-16 mb-1">
													<svg class="file-manager-icon me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="#75c3b6" d="M20,9,13,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3Z"/><path fill="#1a9c86" d="M20 9H15a2 2 0 0 1-2-2V2zM12 18.00031a.99943.99943 0 0 1-1-1v-5a1 1 0 1 1 2 0v5A.99943.99943 0 0 1 12 18.00031z"/><path fill="#1a9c86" d="M12,18.00031a.99676.99676,0,0,1-.707-.293l-2-2A.99989.99989,0,1,1,10.707,14.29328L12,15.58625l1.293-1.293A.99989.99989,0,1,1,14.707,15.70734l-2,2A.99676.99676,0,0,1,12,18.00031Z"/></svg>
													Brand item6
													<div class="float-end tx-13 text-muted mt-1">250 item</div>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
							<div class="text-muted mb-2 tx-16">All Products</div>
								<div class="row">
									<div class="card-body table-responsive p-0 mg-t-20">
                                        <table class="table  table-striped table-hover text-nowrap table-bordered">
                                            @if (isset($istrash) && $istrash)
                                                        <thead style="color: var(--warning)">
                                                        @else
                                                            <thead style="color: var(--info)">
                                                    @endif
                                                    <tr>
                                                        <th style="width: 10px">ID</th>
                                                        <th style="width: 8%">Image</th>
                                                        <th>Name</th>
                                                        <th>Cost</th>
                                                        <th>Price</th>
                                                        <th>Stock</th>
                                                        <th>Categorie</th>
                                                        <th>Brand</th>
                                                        <th>Create date</th>
                                                        <th>Update date</th>
                                                        <th>Create By</th>
                                                        <th style="width: 40px">Status</th>
                                                        <th style="width: 40px; text-align: center"><i class="fa fa-ellipsis-h"></i></th>
                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($results as $products)
                                                        <tr>
                                                            <td>{{ $products->product_id }}</td>
                                                            <td><img src="https://post.medicalnewstoday.com/wp-content/uploads/sites/3/2020/02/322868_1100-800x825.jpg" width="80"></td>
                                                            <td>{{ $products['text'] }}</td>
                                                            <td>{{ $products->cost }} USD</td>
                                                            <td>{{ $products->price }} USD</td>
                                                            <td>{{ $products->qty_stock }}</td>
                                                            <td>{{ $products->categoriename }}</td>
                                                            <td>{{ $products->brandname }}</td>
                                                            <td style="width: 10%">{{ $products->create_date }}</td>
                                                            <td style="width: 10%">{{ $products->update_date }}</td>
                                                            <td style="width: 10%">{{ $products->username }}</td>
                                                            <td style="width: 10%">
                                                                @if ($products->status == 'yes')
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
                                                                'rowid' => $products->product_id,
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
							</div>
							
						</div>
					</div>
					<!-- End Row -->

				</div>
				<!-- Container closed -->

>>>>>>> d6cba399928d6b78b4dd6c89856f85647cf38f17
        </form>
    </div>
@endsection
