 <!-- main-header -->
 <div class="main-header side-header sticky nav nav-item" style="z-index: 2">
     <div class=" main-container container-fluid sticky-top">
         <div class="main-header-left ">
             <div class="responsive-logo">
                 <a href="{{ url_builder('admin.controller', ['home']) }}" class="header-logo">
                     <img src="{{ asset('public/images/gl_gentleman_light.png') }}" class="mobile-logo logo-1"
                         alt="logo" style="height: 50px">

                     <img src="{{ asset('public/images/gl_gentleman_dark.png') }}" class="mobile-logo dark-logo-1"
                         alt="logo" style="height: 50px">
                 </a>
             </div>
             <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                 <a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left"></i></a>
                 <a class="close-toggle" href="javascript:void(0);"><i class="header-icon fe fe-x"></i></a>
             </div>
             <div class="logo-horizontal">
                 <a href="{{ url_builder('admin.controller', ['home']) }}" class="header-logo">
                     <img src="{{ asset('public/images/gl_gentleman_light.png') }}" class="mobile-logo logo-1"
                         alt="logo" style="height: 50px">
                     <img src="{{ asset('public/images/gl_gentleman_dark.png') }}" class="mobile-logo dark-logo-1"
                         alt="logo" style="height: 50px">
                 </a>
             </div>
             {{-- <div class="main-header-center ms-4 d-sm-none d-md-none d-lg-block form-group">
                 <input class="form-control" placeholder="Search..." type="search">
                 <button class="btn"><i class="fas fa-search"></i></button>
             </div> --}}
         </div>



         <div class="main-header-right">
             <li class="dropdown nav-item mg-r-20">
                 <a class="new nav-link theme-layout nav-link-bg layout-setting">
                     <span class="dark-layout" id="dark-layout"><svg xmlns="http://www.w3.org/2000/svg"
                             class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24">
                             <path
                                 d="M20.742 13.045a8.088 8.088 0 0 1-2.077.271c-2.135 0-4.14-.83-5.646-2.336a8.025 8.025 0 0 1-2.064-7.723A1 1 0 0 0 9.73 2.034a10.014 10.014 0 0 0-4.489 2.582c-3.898 3.898-3.898 10.243 0 14.143a9.937 9.937 0 0 0 7.072 2.93 9.93 9.93 0 0 0 7.07-2.929 10.007 10.007 0 0 0 2.583-4.491 1.001 1.001 0 0 0-1.224-1.224zm-2.772 4.301a7.947 7.947 0 0 1-5.656 2.343 7.953 7.953 0 0 1-5.658-2.344c-3.118-3.119-3.118-8.195 0-11.314a7.923 7.923 0 0 1 2.06-1.483 10.027 10.027 0 0 0 2.89 7.848 9.972 9.972 0 0 0 7.848 2.891 8.036 8.036 0 0 1-1.484 2.059z" />
                         </svg></span>
                     <span class="light-layout" id="light-layout"><svg xmlns="http://www.w3.org/2000/svg"
                             class="header-icon-svgs" width="24" height="24" viewBox="0 0 24 24">
                             <path
                                 d="M6.993 12c0 2.761 2.246 5.007 5.007 5.007s5.007-2.246 5.007-5.007S14.761 6.993 12 6.993 6.993 9.239 6.993 12zM12 8.993c1.658 0 3.007 1.349 3.007 3.007S13.658 15.007 12 15.007 8.993 13.658 8.993 12 10.342 8.993 12 8.993zM10.998 19h2v3h-2zm0-17h2v3h-2zm-9 9h3v2h-3zm17 0h3v2h-3zM4.219 18.363l2.12-2.122 1.415 1.414-2.12 2.122zM16.24 6.344l2.122-2.122 1.414 1.414-2.122 2.122zM6.342 7.759 4.22 5.637l1.415-1.414 2.12 2.122zm13.434 10.605-1.414 1.414-2.122-2.122 1.414-1.414z" />
                         </svg></span>
                 </a>
             </li>


             <button class="navbar-toggler navresponsive-toggler d-lg-none ms-auto" type="button"
                 data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                 aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon fe fe-more-vertical "></span>
             </button>
             <div class="mb-0 navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0 ">
                 <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                     <ul class="nav nav-item header-icons navbar-nav-right ms-auto mg-r-15">
                         <li class="dropdown main-profile-menu  nav nav-item nav-link ps-lg-2">
                             <div class="btn-group ">
                                 <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="true">
                                     @if ($dflang[0] == 'kh')
                                         <img src="{{ asset('public/images/kh1.png') }}">
                                     @else
                                         <img src="{{ asset('public/images/uk1.png') }}">
                                     @endif
                                 </button>
                                 <ul class="dropdown-menu">
                                     <a class="dropdown-item" href="?lang=kh">
                                         <img src="{{ asset('public/images/kh1.png') }}">
                                         &nbsp; &nbsp; ភាសាខ្មែរ
                                     </a>
                                     <a class="dropdown-item" href="?lang=en">
                                         <img src="{{ asset('public/images/uk1.png') }}"> &nbsp; &nbsp; English
                                     </a>

                                 </ul>
                             </div>
                 </div>
                 </li>
                 {{-- <li class="dropdown nav-item">
                             <a class="new nav-link" data-bs-target="#country-selector" data-bs-toggle="modal"
                                 href=""><svg class="header-icon-svgs" xmlns="http://www.w3.org/2000/svg"
                                     width="24" height="24" viewBox="0 0 24 24">
                                     <path
                                         d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm7.931 9h-2.764a14.67 14.67 0 0 0-1.792-6.243A8.013 8.013 0 0 1 19.931 11zM12.53 4.027c1.035 1.364 2.427 3.78 2.627 6.973H9.03c.139-2.596.994-5.028 2.451-6.974.172-.01.344-.026.519-.026.179 0 .354.016.53.027zm-3.842.7C7.704 6.618 7.136 8.762 7.03 11H4.069a8.013 8.013 0 0 1 4.619-6.273zM4.069 13h2.974c.136 2.379.665 4.478 1.556 6.23A8.01 8.01 0 0 1 4.069 13zm7.381 6.973C10.049 18.275 9.222 15.896 9.041 13h6.113c-.208 2.773-1.117 5.196-2.603 6.972-.182.012-.364.028-.551.028-.186 0-.367-.016-.55-.027zm4.011-.772c.955-1.794 1.538-3.901 1.691-6.201h2.778a8.005 8.005 0 0 1-4.469 6.201z" />
                                 </svg></a>
                         </li> --}}


                 {{-- <li class="dropdown main-header-message right-toggle">
                             <a class="new nav-link nav-link pe-0" data-bs-toggle="sidebar-right"
                                 data-bs-target=".sidebar-right">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" width="24"
                                     height="24" viewBox="0 0 24 24">
                                     <path d="M4 6h16v2H4zm4 5h12v2H8zm5 5h7v2h-7z" />
                                 </svg>
                             </a>
                         </li>
                         <li class="nav-link search-icon d-lg-none d-block">
                             <form class="navbar-form" role="search">
                                 <div class="input-group">
                                     <input type="text" class="form-control" placeholder="Search">
                                     <span class="input-group-btn">
                                         <button type="reset" class="btn btn-default">
                                             <i class="fas fa-times"></i>
                                         </button>
                                         <button type="submit" class="btn btn-default nav-link resp-btn">
                                             <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                 class="header-icon-svgs" viewBox="0 0 24 24" width="24px"
                                                 fill="#000000">
                                                 <path d="M0 0h24v24H0V0z" fill="none" />
                                                 <path
                                                     d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                             </svg>
                                         </button>
                                     </span>
                                 </div>
                             </form>
                         </li> --}}
                 <li class="dropdown main-profile-menu nav nav-item nav-link ps-lg-2">
                     <a class="new nav-link profile-user d-flex" href="" data-bs-toggle="dropdown"><img
                             alt="" src="{{ asset('public/images/gl_logo.jpg') }}" class=""></a>
                     <div class="dropdown-menu">
                         <div class="menu-header-content p-3 border-bottom">
                             <div class="d-flex wd-100p">
                                 <div class="main-img-user"><img alt=""
                                         src="{{ asset('public/images/gl_logo.jpg') }}" class=""></div>
                                 <div class="ms-3 my-auto">
                                     <h6 class="tx-15 font-weight-semibold mb-0">{{ Auth()->user()->name }}
                                     </h6>
                                     {{-- <span
                                                 class="dropdown-title-text subtext op-6  tx-12">{{ Auth()->user()->name }}</span> --}}
                                 </div>
                             </div>
                         </div>
                         <a class="dropdown-item" href="profile.html"><i
                                 class="far fa-user-circle"></i>@lang('dev.profile')</a>
                         <a class="dropdown-item" href="mail-settings.html"><i class="far fa-sun"></i>
                             @lang('dev.setting')</a>

                         <a class="dropdown-item" href="mail-settings.html"
                             onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                 class="far fa-arrow-alt-circle-left"></i>
                             @lang('dev.logout')</a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </div>
                 </li>



                 </ul>
             </div>
             <!--switcher icon-->
             <div class="d-flex">
                 <a class="demo-icon new nav-link" href="javascript:void(0);">
                     <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs fa-spin" width="24"
                         height="24" viewBox="0 0 24 24">
                         <path
                             d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z" />
                         <path
                             d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z" />
                     </svg>
                 </a>
             </div>
         </div>
     </div>
 </div>
 </div>
 <!-- /main-header -->
