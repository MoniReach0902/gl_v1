<!-- need to remove -->
{{-- <li class="nav-item">
    <a href="{{ url_builder('admin.controller', ['slider']) }}"
        class="nav-link showhidemenu {{ nav_checkactive(['slider'], $obj_info['name'] ?? '') }}">
        <i class="fas fa-image"></i>
        <p>@lang('dev.slider')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url_builder('admin.controller', ['room']) }}"
        class="nav-link showhidemenu {{ nav_checkactive(['room'], $obj_info['name'] ?? '') }}">
        <i class="fas fa-door-open"></i>
        <p>@lang('dev.room')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url_builder('admin.controller', ['booking']) }}"
        class="nav-link showhidemenu {{ nav_checkactive(['booking'], $obj_info['name'] ?? '') }}">
        <i class="fas fa-bookmark"></i>
        <p>@lang('dev.booking')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url_builder('admin.controller', ['user']) }}"
        class="nav-link showhidemenu {{ nav_checkactive(['user'], $obj_info['name'] ?? '') }}">
        <i class="fas fa-users"></i>
        <p>@lang('dev.user')</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url_builder('admin.controller', ['userpermission']) }}"
        class="nav-link showhidemenu {{ nav_checkactive(['userpermission'], $obj_info['name'] ?? '') }}">
        <i class="fas fa-user-cog"></i>
        <p> @lang('dev.permission')</p>
    </a>
</li>



<li class="nav-item">
    <a href="{{ url_builder('admin.controller', ['location']) }}"
        class="nav-link showhidemenu {{ nav_checkactive(['location'], $obj_info['name'] ?? '') }}">
        <i class="nav-icon fas fa-map-marker"></i>
        <p>@lang('dev.location')</p>
    </a>
</li>
<li class="nav-item">
    <p></p>
</li> --}}



<ul class="side-menu">
    <li class="side-item side-item-category">Sliders</li>
    <li class="slide {{ nav_checkactive(['slider'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fas fa-image"></i>&nbsp;<span
                class="side-menu__label">Slide Image</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['slider-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['slider', 'index']) }}">Slider</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['slider-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['slider', 'create']) }}">New slider</a>
            </li>
        </ul>
    </li>

    {{-- ===================== End Category ================= --}}
    
    <li class="side-item side-item-category">@lang("dev.category")</li>
    <li class="slide {{ nav_checkactive(['categorie'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);">
            <i class="fa-solid fa-list"></i>&nbsp;<span class="side-menu__label">Categories</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['categorie-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['categorie']) }}">All Categories</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['categorie-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['categorie', 'create']) }}">Add New</a>
            </li>
        </ul>
    </li>

    {{-- ===================== End Categories ================= --}}


    
    {{-- ===================== Start Brand ================= --}}
    <li class="slide {{ nav_checkactive(['brands'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa-sharp fa-solid fa-ring"></i>&nbsp;<span
                class="side-menu__label">Brands</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['brands-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['brands', 'index']) }}">Brand</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['brands-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['brands', 'create']) }}">New Brand</a>
            </li>
        </ul>
    </li>
    {{-- ===================== End Brand ================= --}}



    {{-- ===================== Start Product ================= --}}
    <li class="slide {{ nav_checkactive(['products'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fas fa-image"></i>&nbsp;<span
                class="side-menu__label">Products</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['products-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['products', 'index']) }}">Product</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['products-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['products', 'create']) }}">New Product</a>
            </li>
        </ul>
    </li>
    {{-- ===================== End Brand ================= --}}




    {{-- ===================== Start Currency ================= --}}
    <li class="slide {{ nav_checkactive(['currency'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa-solid fa-dollar-sign"></i>&nbsp;<span
                class="side-menu__label">Currency</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['currency-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['currency', 'index']) }}">Currency</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['currency-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['currency', 'create']) }}">New Currency</a>
            </li>
        </ul>
    </li>
    {{-- ===================== End Currency ================= --}}

    {{-- ===================== Start Colors ================= --}}
    <li class="slide {{ nav_checkactive(['colors'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa-solid fa-palette"></i>&nbsp;<span
                class="side-menu__label">Colors</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['colors-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['colors', 'index']) }}">All Colors</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['colors-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['colors', 'create']) }}">New Colors</a>
            </li>
        </ul>
    </li>
    {{-- ===================== End Currency ================= --}}
    {{-- ===================== Start Customer ================= --}}
    <li class="slide {{ nav_checkactive(['customer'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa fa-users" aria-hidden="true"></i>
            &nbsp;<span
                class="side-menu__label">Customer</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['customer-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['customer', 'index']) }}">Customer</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['customer-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['customer', 'create']) }}">New Customer</a>
            </li>
        </ul>
    </li>
    {{-- ===================== End Customer ================= --}}

    {{-- ===================== Start Equipment ================= --}}
    <li class="slide {{ nav_checkactive(['equipment'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa-solid fa-credit-card"></i>&nbsp;<span
                class="side-menu__label">Equipment</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['equipment-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['equipment', 'index']) }}">Equipment</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['equipment-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['equipment', 'create']) }}">New Equipment</a>
            </li>
        </ul>
    </li>
    {{-- ===================== End Equipment ================= --}}

    {{-- ===================== Start Inventory ================= --}}
    <li class="slide {{ nav_checkactive(['inventory'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa-solid fa-cart-shopping"></i>&nbsp;<span
                class="side-menu__label">Inventory</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['inventory-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['inventory', 'index']) }}">Inventory</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['inventory-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['inventory', 'create']) }}">New Inventory</a>
            </li>
        </ul>
    </li>
    {{-- ===================== End Inventory ================= --}}

    {{-- ===================== Start Media ================= --}}
    <li class="slide {{ nav_checkactive(['media'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fas fa-image"></i>&nbsp;<span
                class="side-menu__label">Media</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['media-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media', 'index']) }}">Media</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['media-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media', 'create']) }}">New Media</a>
            </li>
        </ul>
    </li>
    {{-- ===================== End Inventory ================= --}}

    {{-- ===================== Start Media ================= --}}
    <li class="slide {{ nav_checkactive(['events'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa-solid fa-calendar-days"></i>&nbsp;<span
                class="side-menu__label">Events</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['events-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['events', 'index']) }}">Events</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['events-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['events', 'create']) }}">New Events</a>
            </li>
        </ul>
    </li>
    {{-- ===================== End Inventory ================= --}}

    

    <li class="side-item side-item-category">Example</li>
    <li class="slide {{ nav_checkactive(['example'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fas fa-image"></i>&nbsp;<span class="side-menu__label">Example</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['example-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['example', 'index']) }}">Index Example</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['example-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['example', 'create']) }}">New Example</a>
            </li>
        </ul>
    </li>

    <li class="side-item side-item-category">Users Management</li>
    <li class="slide {{ nav_checkactive(['user'], $args, 'is-expanded') }}">
        <a class="side-menu__item {{ nav_checkactive(['user'], $args, 'active is-expanded') }}" data-bs-toggle="slide"
            href="javascript:void(0);">
            <i class="fa fa-user" aria-hidden="true"></i>
&nbsp;
            <span class="side-menu__label">Users</span><i class="angle fe fe-chevron-right"></i>
        </a>
        <ul class="slide-menu">
            <li class="side-menu__label1"><a href="javascript:void(0);">Menu-Levels</a></li>
            <li>
                <a class="slide-item {{ nav_checkactive(['user-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['user']) }}">@lang('dev.user')</a>
            </li>
            <li>
                <a class="slide-item {{ nav_checkactive(['user-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['user', 'create']) }}">@lang('dev.new')</a>
            </li>

        </ul>
    </li>
    <li class="slide {{ nav_checkactive(['userpermission'], $args, 'is-expanded') }}">
        <a class="side-menu__item {{ nav_checkactive(['userpermission'], $args, 'active is-expanded') }}"
            data-bs-toggle="slide" href="javascript:void(0);">
            <i class="fas fa-user-shield pd-r-10"></i>
            <span class="side-menu__label">Permission</span><i class="angle fe fe-chevron-right"></i>
        </a>
        <ul class="slide-menu">
            <li class="side-menu__label1"><a href="javascript:void(0);">Menu-Levels</a></li>
            <li>
                <a class="slide-item {{ nav_checkactive(['userpermission-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['userpermission']) }}">@lang('dev.permission')</a>
            </li>
            <li>
                <a class="slide-item {{ nav_checkactive(['userpermission-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['userpermission', 'create']) }}">@lang('dev.new')</a>
            </li>

        </ul>
    </li>


    <li class="side-item side-item-category">Home</li>
    <li class="slide {{ nav_checkactive(['switcher'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa fa-cogs "
                aria-hidden="true">
                &nbsp;</i><span class="side-menu__label">Settings</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);">Dashboards</a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['switcher-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['switcher']) }}">Switcher</a>
            </li>
        </ul>
    </li>

    <li class="side-item side-item-category">Media</li>
    <li class="slide {{ nav_checkactive(['media-index'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['media']) }}"><i
                class="fas fa-image"></i>&nbsp;<span class="side-menu__label">@lang('dev.media')</span><i
                class="angle fe fe-chevron-right"></i></a>
    </li>
    <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            <li><a class="slide-item {{ nav_checkactive(['inventory-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media', 'create']) }}">New Media</a>
            </li>
</ul>
