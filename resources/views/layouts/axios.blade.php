<!DOCTYPE html>
<html lang="en">

<head>
    @yield('third_party_stylesheets')
    @stack('page_css')
</head>

<body>
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
    </div>
    {{-- yield use @saction --}}
    @yield('blade_scripts')
    {{-- stack use @push --}}
    @stack('page_scripts')
</body>

</html>
