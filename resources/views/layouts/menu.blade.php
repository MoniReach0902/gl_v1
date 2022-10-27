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

    <li class="slide {{ nav_checkactive(['home'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['home']) }}"><i
                class="fas fa-tachometer-alt"></i>&nbsp;<span class="side-menu__label">Dashboard</span></a>
    </li>

    <li class="slide {{ nav_checkactive(['news'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="far fa-calendar-check"></i>&nbsp;<span class="side-menu__label">News & Events</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['news-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['news', 'index']) }}">All News & Events</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['news-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['news', 'create']) }}">Add New</a>
            </li>
        </ul>
    </li>

    <li class="side-item side-item-category">Sales</li>
    <li class="slide {{ nav_checkactive(['order'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['order']) }}"><i
                class="fa fa-shopping-cart"></i>&nbsp;<span class="side-menu__label">Orders</span></a>
    </li>
    <li class="slide {{ nav_checkactive(['trash'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['order', 'create']) }}"><i
                class="fa fa-trash"></i>&nbsp;<span class="side-menu__label">Trash</span></a>
    </li>
    <li class="slide {{ nav_checkactive(['/'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['/']) }}"><i
                class="fas fa-file-invoice"></i>&nbsp;<span class="side-menu__label">Invoices</span></a>
    </li>
    <li class="slide {{ nav_checkactive(['customer'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fa fa-address-card"></i>&nbsp;<span class="side-menu__label">@lang('dev.customer')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['customer-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['customer', 'index']) }}">@lang('dev.new_customer')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['customer-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['customer', 'create']) }}">@lang('dev.all_customer')</a>
            </li>
        </ul>
    </li>

    <li class="side-item side-item-category">@lang('dev.product_management')</li>
    <li class="slide {{ nav_checkactive(['product'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fa fa-cubes"></i>&nbsp;<span class="side-menu__label">@lang('dev.product')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['product-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['product', 'index']) }}">@lang('dev.all_product')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['product-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['product', 'create']) }}">@lang('dev.new_product')</a>
            </li>
        </ul>
    </li>
    <li class="slide {{ nav_checkactive(['categorie'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fa fa-tags"></i>&nbsp;<span class="side-menu__label">@lang('dev.category')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['categorie-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['categorie']) }}">@lang('dev.all_category')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['categorie-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['categorie', 'create']) }}">@lang('dev.new_category') </a>
            </li>
        </ul>
    </li>
    <li class="slide {{ nav_checkactive(['producttype'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fa fa-puzzle-piece"></i>&nbsp;<span class="side-menu__label">Product Properties</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['producttype-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['producttype']) }}">All Product Properties</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['producttype-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['producttype', 'create']) }}">Add New</a>
            </li>
        </ul>
    </li>
    
    <li class="slide {{ nav_checkactive(['colors'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fa fa-adjust"></i>&nbsp;<span class="side-menu__label">@lang('dev.product_color')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['colors-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['colors']) }}">@lang('dev.all_product_color')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['colors-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['colors', 'create']) }}">@lang('dev.new_product_color')</a>
            </li>
        </ul>
    </li>

    <li class="side-item side-item-category">Users Management</li>
    <li class="slide {{ nav_checkactive(['user'], $args, 'is-expanded') }}">
        <a class="side-menu__item {{ nav_checkactive(['user'], $args, 'active is-expanded') }}" data-bs-toggle="slide"
            href="javascript:void(0);">
            <i class="fas fa-users pd-r-10"></i>
            <span class="side-menu__label">@lang('dev.user')</span><i class="angle fe fe-chevron-right"></i>
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
            <span class="side-menu__label">@lang('dev.permission')</span><i class="angle fe fe-chevron-right"></i>
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

    <li class="side-item side-item-category">Fixed Assets</li>
    <li class="slide {{ nav_checkactive(['equipment'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fas fa-hammer"></i>&nbsp;<span class="side-menu__label">Equipments</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['equipment-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['equipment']) }}">All Equipments</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['equipment-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['equipment', 'create']) }}">Add New</a>
            </li>
        </ul>
    </li>
    <li class="slide {{ nav_checkactive(['inventory'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fas fa-dumpster"></i>&nbsp;<span class="side-menu__label">Inventorys</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['inventory-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['inventory', 'index']) }}">All Inventorys</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['inventory-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['inventory', 'create']) }}">Add New</a>
            </li>
        </ul>
    </li>
</br>
<li class="slide {{ nav_checkactive(['vendor'], $args, 'is-expanded') }}">
    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
            class="fas fa-industry"></i>&nbsp;<span class="side-menu__label">Vendors</span><i
            class="angle fe fe-chevron-right"></i></a>
    <ul class="slide-menu ">
        <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
        {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
        <li><a class="slide-item {{ nav_checkactive(['vendor-index'], $args) }}"
                href="{{ url_builder('admin.controller', ['vendor', 'index']) }}">All Vendors</a>
        </li>
        <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
        {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
        <li><a class="slide-item {{ nav_checkactive(['vendor-create'], $args) }}"
                href="{{ url_builder('admin.controller', ['vendor', 'create']) }}">Add New</a>
        </li>
    </ul>
</li>
   
    <li class="slide {{ nav_checkactive(['/'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['/']) }}"><i
                class="fas fa-chart-area"></i>&nbsp;<span class="side-menu__label">Reporting</span></a>
    </li>

    <li class="slide {{ nav_checkactive(['currency'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fab fa-cc-mastercard"></i>&nbsp;<span class="side-menu__label">Currencys</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['currency-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['currency', 'index']) }}">All Currencys</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['currency-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['currency', 'create']) }}">Add New</a>
            </li>
        </ul>
    </li>

    <li class="slide {{ nav_checkactive(['new-event'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fab fa-cc-visa"></i>&nbsp;<span class="side-menu__label">Bank Corporates</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['example-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['example', 'index']) }}">All Bank Corporates</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['example-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['example', 'create']) }}">Add New</a>
            </li>
        </ul>
    </li>

    <li class="slide {{ nav_checkactive(['switcher'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa fa-cogs "
                aria-hidden="true">
                &nbsp;</i><span class="side-menu__label">Settings</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['media-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media']) }}">General</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['media-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media', 'create']) }}">Contacts</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);">Dashboards</a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['switcher-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['switcher']) }}">Switcher</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['media-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media', 'create']) }}">Terms & Condition</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['media-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media', 'create']) }}">Privacy Policy</a>
            </li>
        </ul>
    </li>
</ul>
