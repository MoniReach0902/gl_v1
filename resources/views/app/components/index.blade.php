@php
//dd(request()->session()->all());
@endphp
@extends('layouts.app')
@section('blade_css')
@endsection

@section('content')
    
    <!-- container -->
    <div class="main-container container-fluid">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">FORM LAYOUTS</span>
            </div>
            <div class="justify-content-center mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
                </ol>
            </div>
        </div>
        <!-- /breadcrumb -->

        <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Horizontal Alignment
                        </div>
                        <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                        <div class="pd-30 pd-sm-20">
                            <div class="row row-xs">
                                <div class="col-md-5">
                                    <input class="form-control" placeholder="Enter your username" type="text">
                                </div>
                                <div class="col-md-5 mg-t-10 mg-md-t-0">
                                    <input class="form-control" placeholder="Enter your password" type="password">
                                </div>
                                <div class="col-md mg-t-10 mg-md-t-0">
                                    <button class="btn btn-primary btn-block">Sign In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Vertical Alignment
                        </div>
                        <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class=" p-2">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Enter your username" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Enter your password" type="password">
                                    </div><button class="btn btn-primary pd-x-20">Sign In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Basic Example
                        </div>
                        <p class="mg-b-20">A form control layout using basic layout.</p>
                        <div class="d-flex flex-column pd-30 pd-sm-20">
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter your username" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Your Email" type="email">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Enter Your Password" type="password">
                            </div>
                            <div class="form-group">
                                <label class="ckbox">
                                            <input type="checkbox"><span class="tx-13">I agree terms and conditions</span>
                                        </label>
                            </div>
                            <button class="btn ripple btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Left Label Alignment
                        </div>
                        <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                        <div class="pd-30 pd-sm-20">
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Firstname</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Enter your firstname" type="text">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Lastnane</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Enter your lastname" type="text">
                                </div>
                            </div>
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="form-label mg-b-0">Email</label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input class="form-control" placeholder="Enter your email" type="email">
                                </div>
                            </div>
                            <button class="btn btn-primary pd-x-30 mg-r-5 mg-t-5">Register</button>
                            <button class="btn btn-secondary pd-x-30 mg-t-5">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Form Group Wrapper
                        </div>
                        <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                        <div class="">
                            <div class="row row-xs formgroup-wrapper">
                                <div class="col-md-6">
                                    <div class="main-form-group">
                                        <label class="form-label">Email</label> <input class="form-control" placeholder="Enter your email" type="email" value="me@sprukotechnologies.com">
                                    </div>
                                    <!-- main-form-group -->
                                </div>
                                <div class="col-md-6 mg-t-20 mg-md-t-0">
                                    <div class="main-form-group">
                                        <label class="form-label">Password</label> <input class="form-control" placeholder="Enter your password" type="password" value="thisismypassword">
                                    </div>
                                    <!-- main-form-group -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Form in Modal
                        </div>
                        <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                        <div class="">
                            <a class="btn btn-primary" data-bs-target="#modaldemo1" data-bs-toggle="modal" href="">View Live Demo</a>
                        </div>
                        <!-- pd-y-30 -->
                        <div class="modal">
                            <div class="modal-dialog wd-xl-400" role="document">
                                <div class="modal-content">
                                    <div class="modal-body pd-sm-40">
                                        <button aria-label="Close" class="close pos-absolute t-15 r-20 tx-26" data-bs-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                        <h5 class="modal-title mg-b-5">Create New Account</h5>
                                        <p class="mg-b-20">Let's get you all setup so you can begin using our app.</p>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Firstname" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Lastname" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Phone" type="text">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Email" type="text">
                                        </div>
                                        <div class="form-group mg-b-25">
                                            <label class="ckbox mg-b-5"><input type="checkbox"><span class="tx-13">I agree to <a href="">Terms</a> and <a href="">Privacy Policy</a></span></label> <label class="ckbox"><input checked type="checkbox"><span class="tx-13">Yes, I want to receive email from your newsletter.</span></label>
                                        </div><button class="btn btn-primary btn-block">Continue</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Form in Dropdown
                        </div>
                        <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                        <div class="main-dropdown-form-demo">
                            <div class="mg-t-20">
                                <button class="btn btn-primary pd-x-20" data-bs-toggle="dropdown">Live Example <i class="icon ion-ios-arrow-down mg-l-5 tx-12"></i></button>
                                <div class="dropdown-menu">
                                    <h6 class="dropdown-title">Subscribe</h6>
                                    <p class="mg-b-20">Don't miss any update from us.</p>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Enter your fullname" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Enter your email" type="email">
                                    </div><button class="btn btn-primary btn-block">Subscribe</button>
                                </div>
                            </div>
                        </div>
                        <!-- main-dropdown-demo -->
                    </div>
                </div>
            </div>



            
        </div>
        <!-- /row -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">NOTIFICATIONS</span>
            </div>
            <div class="justify-content-center mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Apps</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
                </ol>
            </div>
		</div>
        <!-- /breadcrumb -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- div -->
                <div class="card mg-b-20">
                    <div class="card-body">
                        <h3 class="card-title  mg-b-10">Position Notification</h3>
                        <div class="example border-0 p-0">
                            <div class="btn-list">
                                <button onclick="not1()" class="btn btn-primary mg-t-5">Top</button>
                                <button onclick="not2()" class="btn btn-primary mg-t-5">Center</button>
                                <button onclick="not3()" class="btn btn-primary mg-t-5">Left</button>
                                <button onclick="not4()" class="btn btn-primary mg-t-5">Top Fullwidth</button>
                                <button onclick="not5()" class="btn btn-primary mg-t-5">Right</button>
                                <button onclick="not51()" class="btn btn-primary mg-t-5">Bottom</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- div -->

                <!-- div -->
                <div class="card mg-b-20">
                    <div class="card-body">
                        <h3 class="card-title  mg-b-10">Notification Types</h3>
                        <div class="example border-0 p-0">
                            <div class="btn-list">
                                <button onclick="not6()" class="btn btn-primary mg-t-5">Primary</button>
                                <button onclick="not7()" class="btn btn-success mg-t-5">Success</button>
                                <button onclick="not8()" class="btn btn-danger mg-t-5">Error</button>
                                <button onclick="not9()" class="btn btn-warning mg-t-5">Warning</button>
                                <button onclick="not10()" class="btn btn-info mg-t-5">Info</button>
                                <button onclick="not11()" class="btn btn-danger mg-t-5">Fixed Error</button>
                                <button onclick="not12()" class="btn btn-dark mg-t-5">Opacity</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- div -->

                <!-- div -->
                <div class="card mg-b-20">
                    <div class="card-body">
                        <h3 class="card-title  mg-b-10">Notification Styles</h3>
                        <div class="example border-0 p-0">
                            <div class="btn-list">
                                <button onclick="not13()" class="btn btn-primary mg-t-5">Mutiple lines</button>
                                <button onclick="not14()" class="btn btn-primary mg-t-5">Fade Animation</button>
                                <button onclick="not15()" class="btn btn-primary mg-t-5">Customize Background</button>
                                <button onclick="not16()" class="btn btn-primary mg-t-5">Timeout</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- div -->

                <!-- div -->
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title  mg-b-10">Call Back Notification</h3>
                        <div class="example border-0 p-0">
                            <div class="btn-list">
                                <button onclick="not17()" class="btn btn-primary">Call Back</button>
                                <button onclick="not18()" class="btn btn-primary">Call Back 2</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- div -->
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            Payment Details
                        </div>
                        <p class="mg-b-20">It is Very Easy to Customize and it uses in your website apllication.</p>
                        <div class="row">
                            <div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
                                <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                    <h5 class="card-title mg-b-20">Your Payment Details</h5>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Name on Card</label> <input class="form-control" required="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="main-content-label tx-11 tx-medium tx-gray-600">Card Number</label>
                                        <div class="pos-relative">
                                            <input class="form-control pd-r-80" required="" type="text">
                                            <div class="d-flex pos-absolute t-5 r-10"><img alt="" class="wd-30 mg-r-5" src="../assets/img/visa.png"> <img alt="" class="wd-30" src="../assets/img/mastercard.png"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row row-sm">
                                            <div class="col-sm-9">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">Expiration Date</label>
                                                <div class="row row-sm">
                                                    <div class="col-sm-7">
                                                        <select class="form-control select2-no-search">
                                                                <option label="Choose one">
                                                                </option>
                                                                <option value="January">
                                                                    January
                                                                </option>
                                                                <option value="February">
                                                                    February
                                                                </option>
                                                                <option value="March">
                                                                    March
                                                                </option>
                                                                <option value="April">
                                                                    April
                                                                </option>
                                                                <option value="May">
                                                                    May
                                                                </option>
                                                            </select>
                                                    </div>
                                                    <div class="col-sm-5 mg-t-10 mg-sm-t-0">
                                                        <select class="form-control select2-no-search">
                                                                <option label="Choose one">
                                                                </option>
                                                                <option value="2018">
                                                                    2018
                                                                </option>
                                                                <option value="2019">
                                                                    2019
                                                                </option>
                                                                <option value="2020">
                                                                    2020
                                                                </option>
                                                                <option value="2021">
                                                                    2021
                                                                </option>
                                                                <option value="2022">
                                                                    2022
                                                                </option>
                                                            </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 mg-t-20 mg-sm-t-0">
                                                <label class="main-content-label tx-11 tx-medium tx-gray-600">CVC</label> <input class="form-control" required="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mg-b-20">
                                        <label class="ckbox"><input checked type="checkbox"><span class="tx-13">Save my card for future purchases</span></label>
                                    </div>
                                    <button class="btn btn-primary btn-block">Complete Payment</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">STRIPED ROWS</h4>
                    </div>
                    <p class="tx-12 tx-gray-500 mb-2">Example of Nowa Striped Rows.. <a href="">Learn more</a></p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Joan Powell</td>
                                    <td>Associate Developer</td>
                                    <td>$450,870</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Gavin Gibson</td>
                                    <td>Account manager</td>
                                    <td>$230,540</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Julian Kerr</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>$55,300</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Cedric Kelly</td>
                                    <td>Accountant</td>
                                    <td>$234,100</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>Samantha May</td>
                                    <td>Junior Technical Author</td>
                                    <td>$43,198</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
    </div>
        <!--/div-->
    
    
             <!-- row -->
                        <div class="row row-sm">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                                <div class="card sales-card circle-image1">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="ps-4 pt-4 pe-3 pb-4 pt-0">
                                                <div class="">
                                                    <h6 class="mb-2 tx-12 ">TODAY ORDERS</h6>
                                                </div>
                                                <div class="pb-0 mt-0">
                                                    <div class="d-flex">
                                                        <h4 class="tx-26 font-weight-semibold mb-2">5,74,12</h4>
                                                    </div>
                                                    <p class="mb-0 tx-12 text-muted">Last week<i class="fas fa-arrow-circle-up mx-2 text-success"></i>
                                                        <span class=" text-primary"> +427</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="circle-icon widget bg-primary-gradient text-center align-self-center shadow-primary overflow-hidden box-shadow-primary">
                                                <i class="fe fe-shopping-bag tx-20 lh-lg text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                                <div class="card sales-card circle-image2">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="ps-4 pt-4 pe-3 pb-4 pt-0">
                                                <div class="">
                                                    <h6 class="mb-2 tx-12">TODAY EARNINGS</h6>
                                                </div>
                                                <div class="pb-0 mt-0">
                                                    <div class="d-flex">
                                                        <h4 class="tx-26 font-weight-semibold mb-2">$47,589</h4>
                                                    </div>
                                                    <p class="mb-0 tx-12 text-muted">Last week<i class="fas fa-arrow-circle-down mx-2 text-danger"></i>
                                                        <span class=" text-success"> -453</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="circle-icon widget bg-info-gradient text-center align-self-center shadow-secondary overflow-hidden box-shadow-info">
                                                <i class="fe fe-dollar-sign tx-20 lh-lg text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                                <div class="card sales-card circle-image3">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="ps-4 pt-4 pe-3 pb-4 pt-0">
                                                <div class="">
                                                    <h6 class="mb-2 tx-12">PROFIT GAIN</h6>
                                                </div>
                                                <div class="pb-0 mt-0">
                                                    <div class="d-flex">
                                                        <h4 class="tx-26 font-weight-semibold mb-2">$8,943</h4>
                                                    </div>
                                                    <p class="mb-0 tx-12 text-muted">Last week<i class="fas fa-arrow-circle-up mx-2 text-success"></i>
                                                        <span class=" text-primary"> +788</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="circle-icon widget bg-success-gradient text-center align-self-center shadow-success overflow-hidden box-shadow-success">
                                                <i class="fe fe-external-link tx-20 lh-lg text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                                <div class="card sales-card circle-image4">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="ps-4 pt-4 pe-3 pb-4 pt-0">
                                                <div class="">
                                                    <h6 class="mb-2 tx-12">Total Earnings</h6>
                                                </div>
                                                <div class="pb-0 mt-0">
                                                    <div class="d-flex">
                                                        <h4 class="tx-26 font-weight-semibold mb-2">5,74.12</h4>
                                                    </div>
                                                    <p class="mb-0 tx-12  text-muted">Last week<i class="fas fa-arrow-circle-down mx-2 text-danger"></i>
                                                        <span class=" text-success"> -693</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="circle-icon widget bg-warning-gradient text-center align-self-center warning-success overflow-hidden box-shadow-warning">
                                                <i class="fe fe-credit-card tx-20 lh-lg text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row closed -->
    
                        <!-- row -->
                        <div class="row row-sm">
                            <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="plan-card text-center">
                                            <i class="fe fe-share text-primary plan-icon"></i>
                                            <h6 class="text-drak text-uppercase mt-2">Total Shares</h6>
                                            <h2 class="mb-2">678</h2>
                                            <span class="badge badge-success"> +89% </span>
                                            <span class="text-muted">From previous month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="plan-card text-center">
                                            <i class="fe fe-message-square plan-icon text-primary"></i>
                                            <h6 class="text-drak text-uppercase mt-2">Total Comments</h6>
                                            <h2 class="mb-2">493</h2>
                                            <span class="badge badge-danger"> +76% </span>
                                            <span class="text-muted">From previous month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="plan-card text-center">
                                            <i class="fe fe-thumbs-up plan-icon text-primary"></i>
                                            <h6 class="text-drak text-uppercase mt-2">Total Likes</h6>
                                            <h2 class="mb-2">3,287</h2>
                                            <span class="badge badge-success"> +18% </span>
                                            <span class="text-muted">From previous month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="plan-card text-center">
                                            <i class="fe fe-eye plan-icon text-primary"></i>
                                            <h6 class="text-drak text-uppercase mt-2">Total Views</h6>
                                            <h2 class="mb-2">279</h2>
                                            <span class="badge badge-danger"> +5% </span>
                                            <span class="text-muted">From previous month</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
    
                        <!-- row -->
                        <div class="row row-sm">
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="">App Views</div>
                                                <div class="h3 mt-2 mb-2"><b>19.89K</b><span class="text-success tx-13 ms-2">(+25%)</span></div>
                                            </div>
                                            <div class="col-auto align-self-center ">
                                                <div class="feature mt-0 mb-0">
                                                    <i class="fe fe-eye project bg-primary-transparent text-primary "></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <p class="mb-1">Overview of Last month</p>
                                            <div class="progress progress-sm h-1 mb-1">
                                                <div class="progress-bar bg-primary wd-80 " role="progressbar"></div>
                                            </div>
                                            <small class="mb-0 text-muted">Monthly<span class="float-end text-muted">60%</span></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="">New Users</div>
                                                <div class="h3 mt-2 mb-2"><b>692</b><span class="text-success tx-13 ms-2">(+15%)</span></div>
                                            </div>
                                            <div class="col-auto align-self-center ">
                                                <div class="feature mt-0 mb-0">
                                                    <i class="fe fe-users project bg-pink-transparent text-pink "></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <p class="mb-1">Overview of Last month</p>
                                            <div class="progress progress-sm h-1 mb-1">
                                                <div class="progress-bar bg-secondary wd-50 " role="progressbar"></div>
                                            </div>
                                            <small class="mb-0 text-muted">Monthly<span class="float-end text-muted">50%</span></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="">Churned Users</div>
                                                <div class="h3 mt-2 mb-2"><b>286</b><span class="text-success tx-13 ms-2">(+08%)</span></div>
                                            </div>
                                            <div class="col-auto align-self-center ">
                                                <div class="feature mt-0 mb-0">
                                                    <i class="ti-pulse project bg-warning-transparent text-warning "></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <p class="mb-1">Overview of Last month</p>
                                            <div class="progress progress-sm h-1 mb-1">
                                                <div class="progress-bar bg-danger wd-30 " role="progressbar"></div>
                                            </div>
                                            <small class="mb-0 text-muted">Monthly<span class="float-end text-muted">30%</span></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="">Total Revenue</div>
                                                <div class="h3 mt-2 mb-2"><b>$2.98M</b><span class="text-success tx-13 ms-2">(+35%)</span></div>
                                            </div>
                                            <div class="col-auto align-self-center ">
                                                <div class="feature mt-0 mb-0">
                                                    <i class="ti-bar-chart-alt project bg-success-transparent text-success "></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <p class="mb-1">Overview of Last month</p>
                                            <div class="progress progress-sm h-1 mb-1">
                                                <div class="progress-bar bg-success wd-25 " role="progressbar"></div>
                                            </div>
                                            <small class="mb-0 text-muted">Monthly<span class="float-end text-muted">25%</span></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
    
                        <div class="row row-sm">
                            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                                <div class="card bg-primary-gradient text-white ">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="icon1 mt-2 text-center">
                                                    <i class="fe fe-users tx-40"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-0 text-center">
                                                    <span class="text-white">Members</span>
                                                    <h2 class="text-white mb-0">600</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                                <div class="card bg-danger-gradient text-white">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="icon1 mt-2 text-center">
                                                    <i class="fe fe-shopping-cart tx-40"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-0 text-center">
                                                    <span class="text-white">Sales</span>
                                                    <h2 class="text-white mb-0">854</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                                <div class="card bg-success-gradient text-white">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="icon1 mt-2 text-center">
                                                    <i class="fe fe-bar-chart-2 tx-40"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-0 text-center">
                                                    <span class="text-white">Profits</span>
                                                    <h2 class="text-white mb-0">98K</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                                <div class="card bg-warning-gradient text-white">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="icon1 mt-2 text-center">
                                                    <i class="fe fe-pie-chart tx-40"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mt-0 text-center">
                                                    <span class="text-white">Taxes</span>
                                                    <h2 class="text-white mb-0">876</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
           
    
                       <div class="breadcrumb-header justify-content-between">
                            <div class="left-content">
                              <span class="main-content-title mg-b-0 mg-b-lg-1">WIDGET NOTIFICATION</span>
                            </div>
                            <div class="justify-content-center mt-2">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Widget notification</li>
                                </ol>
                            </div>
                        </div>
                        <!-- /breadcrumb -->
    
                        <!-- row -->
                        <div class="row row-sm">
                            <div class="col-lg-6 col-md-12 col-xl-3">
                                <!--Page Widget Error-->
                                <div class="card bd-0 mg-b-20">
                                    <div class="card-body text-danger bg-danger-transparent br-5 bd bd-danger">
                                        <div class="main-error-wrapper">
                                            <i class="si si-close mg-b-20 tx-50"></i>
                                            <h4 class="mg-b-20">Data Not Found.</h4>
                                            <a class="btn btn-outline-danger btn-sm" href="">Click to view details</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Page Widget Error-->
                            </div>
                            <div class="col-lg-6 col-md-12 col-xl-3">
                                <!--Page Widget Error-->
                                <div class="card bd-0 mg-b-20">
                                    <div class="card-body text-success bg-success-transparent br-5  bd bd-success">
                                        <div class="main-error-wrapper">
                                            <i class="si si-check mg-b-20 tx-50"></i>
                                            <h4 class="mg-b-20">Success Data</h4>
                                            <a class="btn btn-outline-success btn-sm" href="">Click to view details</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Page Widget Error-->
                            </div>
                            <div class="col-lg-6 col-md-12 col-xl-3">
                                <!--Page Widget Error-->
                                <div class="card bd-0 mg-b-20">
                                    <div class="card-body text-warning bg-warning-transparent br-5  bd bd-warning">
                                        <div class="main-error-wrapper">
                                            <i class="si si-exclamation mg-b-20 tx-50"></i>
                                            <h4 class="mg-b-20">Warning Alert</h4>
                                            <a class="btn btn-outline-warning btn-sm" href="">Click to view details</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Page Widget Error-->
                            </div>
                            <div class="col-lg-6 col-md-12 col-xl-3">
                                <!--Page Widget Error-->
                                <div class="card bd-0 mg-b-20">
                                    <div class="card-body text-info bg-info-transparent br-5 bd bd-info">
                                        <div class="main-error-wrapper">
                                            <i class="si si-info mg-b-20 tx-50"></i>
                                            <h4 class="mg-b-20">Info Alert</h4>
                                            <a class="btn btn-outline-info btn-sm" href="">Click to view details</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Page Widget Error-->
                            </div>
                        </div> 
        


                        <!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="left-content">
						  <span class="main-content-title mg-b-0 mg-b-lg-1">INVOICE</span>
						</div>
						<div class="justify-content-center mt-2">
							<ol class="breadcrumb">
								<li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Pages</a></li>
								<li class="breadcrumb-item active" aria-current="page">Invoice</li>
							</ol>
						</div>
					</div>
					<!-- /breadcrumb -->

					<!-- Row -->
						<div class="row row-sm">
							<div class="col-lg-12 col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="d-lg-flex">
											<h6 class="main-content-label mb-1"><span class="d-flex mb-4"><a href="index.html"><img src="../assets/img/brand/favicon.png" class="sign-favicon ht-40" alt="logo"></a></span></h6>
												<div class="ms-auto">
													<p class="mb-1"><span class="font-weight-bold">Invoice No : #000321</span></p>
												</div>
										</div>
										<div class="row row-sm">
											<div class="col-lg-6">
												<p class="h3">Invoice Form:</p>
												<address>
													Street Address<br>
													State, City<br>
													Region, Postal Code<br>
													yourdomain@example.com
												</address>
											</div>
											<div class="col-lg-6 text-end">
												<p class="h3">Invoice To:</p>
												<address>
													Street Address<br>
													State, City<br>
													Region, Postal Code<br>
													ypurdomain@example.com
												</address>
												<div class="">
													<p class="mb-1"><span class="font-weight-bold">Invoice Date :</span></p>
														<address>
															01st November 2020
														</address>
												</div>
											</div>
										</div>
										<div class="table-responsive mg-t-40">
											<table class="table table-invoice table-bordered">
												<thead>
													<tr>
														<th class="wd-20p">Product</th>
														<th class="wd-40p">Description</th>
														<th class="tx-center">QNTY</th>
														<th class="tx-right">Unit</th>
														<th class="tx-right">Amount</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Logo Creation</td>
														<td class="tx-12">Logo and business cards design</td>
														<td class="tx-center">2</td>
														<td class="tx-right">$60.00</td>
														<td class="tx-right">$120.00</td>
													</tr>
													<tr>
														<td>Online Store Design & Development</td>
														<td class="tx-12">Design/Development for all popular modern browsers</td>
														<td class="tx-center">3</td>
														<td class="tx-right">$80.00</td>
														<td class="tx-right">$240.00</td>
													</tr>
													<tr>
														<td>App Design</td>
														<td class="tx-12">Promotional mobile application</td>
														<td class="tx-center">1</td>
														<td class="tx-right">$40.00</td>
														<td class="tx-right">$40.00</td>
													</tr>
													<tr>
														<td class="valign-middle" colspan="2" rowspan="4">
															<div class="invoice-notes">
																<label class="main-content-label tx-13">Notes</label>
																<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
															</div><!-- invoice-notes -->
														</td>
														<td class="tx-right">Sub-Total</td>
														<td class="tx-right" colspan="2">$400.00</td>
													</tr>
													<tr>
														<td class="tx-right">Tax</td>
														<td class="tx-right" colspan="2">3%</td>
													</tr>
													<tr>
														<td class="tx-right">Discount</td>
														<td class="tx-right" colspan="2">10%</td>
													</tr>
													<tr>
														<td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
														<td class="tx-right" colspan="2">
															<h4 class="tx-bold">$450.00</h4>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="card-footer text-end">
										<button type="button" class="btn ripple btn-primary mb-1"><i class="fe fe-credit-card me-1"></i> Pay Invoice</button>
										<button type="button" class="btn ripple btn-secondary mb-1"><i class="fe fe-send me-1"></i> Send Invoice</button>
										<button type="button" class="btn ripple btn-info mb-1" onclick="javascript:window.print();"><i class="fe fe-printer me-1"></i> Print Invoice</button>
									</div>
								</div>
							</div>
						</div>
						<!-- End Row -->
                        	<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="left-content">
						<span class="main-content-title mg-b-0 mg-b-lg-1">PROFILE</span>
					</div>
					<div class="justify-content-center mt-2">
						<ol class="breadcrumb">
							<li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Pages</a></li>
							<li class="breadcrumb-item active" aria-current="page">Profile</li>
						</ol>
					</div>
				</div>
				<!-- /breadcrumb -->

				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card">
							<div class="card-body d-md-flex">
								<div class="">
									<span class="profile-image pos-relative">
										<img class="br-5" alt="" src="../assets/img/faces/profile.jpg">
										<span class="bg-success text-white wd-1 ht-1 rounded-pill profile-online"></span>
									</span>
								</div>
								<div class="my-md-auto mt-4 prof-details">
									<h4 class="font-weight-semibold ms-md-4 ms-0 mb-1 pb-0">Sonya Taylor</h4>
									<p class="tx-13 text-muted ms-md-4 ms-0 mb-2 pb-2 ">
										<span class="me-3"><i class="far fa-address-card me-2"></i>Ui/Ux
											Developer</span>
										<span class="me-3"><i class="fa fa-taxi me-2"></i>West fransisco,Alabama</span>
										<span><i class="far fa-flag me-2"></i>New Jersey</span>
									</p>
									<p class="text-muted ms-md-4 ms-0 mb-2"><span><i
												class="fa fa-phone me-2"></i></span><span
											class="font-weight-semibold me-2">Phone:</span><span>+94 12345 6789</span>
									</p>
									<p class="text-muted ms-md-4 ms-0 mb-2"><span><i
												class="fa fa-envelope me-2"></i></span><span
											class="font-weight-semibold me-2">Email:</span><span>spruko.space@gmail.com</span>
									</p>
									<p class="text-muted ms-md-4 ms-0 mb-2"><span><i
												class="fa fa-globe me-2"></i></span><span
											class="font-weight-semibold me-2">Website</span><span>sprukotechnologies</span>
									</p>
								</div>
							</div>
							<div class="card-footer py-0">
								<div class="profile-tab tab-menu-heading border-bottom-0">
									<nav class="nav main-nav-line p-0 tabs-menu profile-nav-line border-0 br-5 mb-0	">
										<a class="nav-link  mb-2 mt-2 active" data-bs-toggle="tab"
											href="#about">About</a>
										<a class="nav-link mb-2 mt-2" data-bs-toggle="tab" href="#edit">Edit Profile</a>
										<a class="nav-link  mb-2 mt-2" data-bs-toggle="tab"
											href="#timeline">Timeline</a>
										<a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#gallery">Gallery</a>
										<a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#friends">Friends</a>
										<a class="nav-link  mb-2 mt-2" data-bs-toggle="tab" href="#settings">Account
											Settings</a>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Row -->

                <!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="left-content">
						  <span class="main-content-title mg-b-0 mg-b-lg-1">BUTTONS</span>
						</div>
						<div class="justify-content-center mt-2">
							<ol class="breadcrumb">
								<li class="breadcrumb-item tx-15"><a href="javascript:void(0);">ELements</a></li>
								<li class="breadcrumb-item active" aria-current="page">Buttons</li>
							</ol>
						</div>
					</div>
					<!-- /breadcrumb -->
                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="card" id="button2">
                                <div class="card-body">
                                 <h3 class="card-title  mg-b-10">Outline Buttons</h3>
                                    <p class="mg-b-20">Below example buttons are basic Outline Buttons..</p>
                                    <div class="text-wrap">
                                        <div class="example">
                                            <div class="btn-list">
                                                <a href="javascript:void(0);" class="btn btn-outline-primary ">Primary</a>
                                                <a href="javascript:void(0);" class="btn btn-outline-secondary ">Secondary</a>
                                                <a href="javascript:void(0);" class="btn btn-outline-success ">Success</a>
                                                <a href="javascript:void(0);" class="btn btn-outline-info ">Info</a>
                                                <a href="javascript:void(0);" class="btn btn-outline-warning ">Warning</a>
                                                <a href="javascript:void(0);" class="btn btn-outline-danger ">Danger</a>
                                                <a href="javascript:void(0);" class="btn btn-outline-dark  ">Dark</a>
                                                <a href="javascript:void(0);" class="btn btn-outline-light  ">Light</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="left-content">
						  <span class="main-content-title mg-b-0 mg-b-lg-1">BREADCRUMBS</span>
						</div>
						<div class="justify-content-center mt-2">
							<ol class="breadcrumb">
								<li class="breadcrumb-item tx-15"><a href="javascript:void(0);">ELements</a></li>
								<li class="breadcrumb-item active" aria-current="page">Breadcrumbs</li>
							</ol>
						</div>
					</div>
					<!-- /breadcrumb -->

					<!-- row -->
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="card custom-card" id="basic">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Basic Styling</h6>
										<p class="text-muted card-sub-title">The example below is the basic styling of the breadcrumb from Bootstrap.</p>
									</div>
									<div class="text-wrap">
										<div class="example">
											<nav aria-label="breadcrumb">
												<ol class="breadcrumb breadcrumb-style mg-b-0">
													<li class="breadcrumb-item">
														<a href="javascript:void(0);">Home</a>
													</li>
													<li class="breadcrumb-item">
														<a href="javascript:void(0);">Library</a>
													</li>
													<li class="breadcrumb-item active">Data</li>
												</ol>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <div class="row">

                        
                          <!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="left-content">
						  <span class="main-content-title mg-b-0 mg-b-lg-1">ALERT</span>
						</div>
						<div class="justify-content-center mt-2">
							<ol class="breadcrumb">
								<li class="breadcrumb-item tx-15"><a href="javascript:void(0);">ELements</a></li>
								<li class="breadcrumb-item active" aria-current="page">ALERT</li>
							</ol>
						</div>
					</div>
					<!-- /breadcrumb -->

					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="card" id="solid-alert">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Solid Colored Alerts</h6>
									<p class="text-muted card-sub-title">Use one of the four required contextual classes.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<div class="alert alert-solid-success alert-dismissible fade show" role="alert">
											<strong>Well done!</strong> You successfully read this  alert message.
											<button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button>
										  </div>
										<div class="alert alert-solid-info alert-dismissible fade show" role="alert">
											<strong>Heads up!</strong> This alert needs your attention, but it's not super .
											<button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="alert alert-solid-warning alert-dismissible fade show" role="alert">
											<strong>Warning!</strong> Better check yourself, you're not looking too good.
											<button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button>
										</div>
										<div class="alert alert-solid-danger mg-b-0 alert-dismissible fade show" role="alert">
											<strong>Oh snap!</strong> Change a few things up and try submitting again.
											<button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button"><span aria-hidden="true">&times;</span></button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    </div>
    <!--div-->           
    </div>
                
@endsection
