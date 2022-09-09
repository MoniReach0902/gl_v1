@php ($extends = 'app')
@if(is_axios())
@php ($extends = 'app_silent')
@endif

@extends('layouts.'.$extends)

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Page Not Found</h1>
    </div>
@endsection
