@extends('layouts.app')


@section('blade_scripts')
    <script>
        $(document).ready(function() {
            let parent_h = $(".content-wrapper").height();
            parent_h = parent_h;
            $("#myiframe").height(parent_h);

            // alert($(".content-wrapper").height());

        });
    </script>
@endsection

@section('content')
<!-- main-content -->

    <!-- container -->
    <div class="main-container container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
            <span class="main-content-title mg-b-0 mg-b-lg-1">@lang('dev.dashboard')</span>
            </div>
            <!--<div class="justify-content-center mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Home</li>
                </ol>
            </div>-->
        </div>
        <!-- /breadcrumb -->

        <!-- row -->
        <div class="row">
            <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12">
                <div class="card primary-custom-card1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12">
                                    <div style="width: 330px"><img class="img-fluid" src="{{ asset('public/images/gl_logo.jpg') }}" alt=""></div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12">
                                <div class="text-justified align-items-center">
                                    <h2 class="text-dark font-weight-semibold mb-3 mt-2">Hi, Welcome Back <span class="text-primary">{{ Auth()->user()->name }}!</span></h2>
                                    <p class="text-dark tx-17 mb-2 lh-3">Thank you for use our system</p>
                                    <p class="font-weight-semibold tx-12 mb-4">For billing related queries, contact us through support chat or mail us at moni_reach@pp.bbu.edu.kh </p>
                                    <!--<button class="btn btn-primary mb-3 shadow">Upgrade to new Plan</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
                <!-- <div class="container"> -->
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <div class="card sales-card circle-image1">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-12 ">@lang('dev.order_today')</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-20 font-weight-semibold mb-2">50 @lang('dev.time')</h4>
                                                </div>
                                                <p class="mb-0 tx-12 text-muted">@lang('dev.yesterday')<i class="fa fa-caret-up mx-2 text-success"></i>
                                                    <span class="text-success font-weight-semibold">30 @lang('dev.time')</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="circle-icon bg-primary-transparent text-center align-self-center overflow-hidden">
                                            <i class="fe fe-shopping-bag tx-16 text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <div class="card sales-card circle-image2">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-12">@lang('dev.total_equipment')</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-20 font-weight-semibold mb-2">50 @lang('dev.equipment')</h4>
                                                </div>
                                                <p class="mb-0 tx-12 text-muted"><br>
                                                    <span class="font-weight-semibold text-danger"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="circle-icon bg-info-transparent text-center align-self-center overflow-hidden">
                                            <i class="fas fa-hammer tx-16 text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <div class="card sales-card circle-image3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-12">@lang('dev.total_customer')</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-20 font-weight-semibold mb-2">10 @lang('dev.people')</h4>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="circle-icon bg-secondary-transparent text-center align-self-center overflow-hidden">
                                            <i class="fa fa-address-card tx-16 text-secondary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                            <div class="card sales-card circle-image4">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="ps-4 pt-4 pe-3 pb-4">
                                            <div class="">
                                                <h6 class="mb-2 tx-12">@lang('dev.total_product')</h6>
                                            </div>
                                            <div class="pb-0 mt-0">
                                                <div class="d-flex">
                                                    <h4 class="tx-22 font-weight-semibold mb-2">200 @lang('dev.product')</h4>
                                                </div>
                                                <p class="mb-0 tx-12 text-muted">@lang('dev.not_use')<i class="fa fa-caret-down mx-2 text-danger"></i>
                                                    <span class="font-weight-semibold text-danger"> -453</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="circle-icon bg-warning-transparent text-center align-self-center overflow-hidden">
                                            <i class="fa fa-cubes tx-16 text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
        <!-- row closed -->
    </div>
    <!-- News & Events slide -->
    
    
    {{-- content-wrapper --}}
@endsection

