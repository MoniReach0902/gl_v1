@php($extends = 'app')
@if (is_axios())
    @php($extends = 'app_silent')
@endif

@extends('layouts.' . $extends)

@section('content')
    <!-- main-content -->


    <!-- container -->


    <!-- row -->
    <div class="row">
        <!-- Main-error-wrapper -->
        <div class="main-error-wrapper wrapper-1 page page-h">
            <h1 class="">501<span class="tx-20">error</span></h1>
            <h2 class="">Oopps. The page you were looking for doesn't exist.</h2>
            <h6 class="">You may have mistyped the address or the page may have moved.</h6><a class="btn btn-primary"
                href="{{ url_builder('admin.controller', ['home']) }}">Back to Home</a>
        </div>
        <!-- /Main-error-wrapper -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
