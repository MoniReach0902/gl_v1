<!-- main-sidebar -->
<div class="sticky" style="z-index: 1">
    <aside class="app-sidebar">
        <div class="main-sidebar-header active">
            <a class="header-logo active" href="{{ url_builder('admin.controller', ['home']) }}">
                <img src="{{ asset('public/images/gl_logo.png') }}" class="main-logo  desktop-logo" alt="logo">
                <img src="{{ asset('public/images/gl_logo.png') }}" class="main-logo  desktop-dark" alt="logo">
                <img src="{{ asset('public/images/gl_logo.png') }}" class="main-logo  mobile-logo" alt="logo">
                <img src="{{ asset('public/images/gl_logo.png') }}" class="main-logo  mobile-dark" alt="logo">
            </a>
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            @include('layouts.menu')
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
<!-- main-sidebar -->
