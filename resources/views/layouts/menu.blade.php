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
                class="fas fa-tachometer-alt"></i>&nbsp;<span class="side-menu__label">@lang('dev.dashboard')</span></a>
    </li>

    <li class="slide {{ nav_checkactive(['news'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="far fa-calendar-check"></i>&nbsp;<span class="side-menu__label">@lang('dev.news_events')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['news-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['news', 'index']) }}">@lang('dev.all_news_events')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['news-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['news', 'create']) }}">@lang('dev.new')</a>
            </li>
        </ul>
    </li>

    <li class="side-item side-item-category">@lang('dev.sale')</li>
    <li class="slide {{ nav_checkactive(['order'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['order']) }}"><i
                class="fa fa-shopping-cart"></i>&nbsp;<span class="side-menu__label">@lang('dev.orders')</span></a>
    </li>
    <li class="slide {{ nav_checkactive(['trash'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['order', 'create']) }}"><i
                class="fa fa-trash"></i>&nbsp;<span class="side-menu__label">@lang('dev.trash')</span></a>
    </li>
    <li class="slide {{ nav_checkactive(['/'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['/']) }}"><i
                class="fas fa-file-invoice"></i>&nbsp;<span class="side-menu__label">@lang('dev.invoice')</span></a>
    </li>
    <li class="slide {{ nav_checkactive(['customer'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fa fa-address-card"></i>&nbsp;<span class="side-menu__label">@lang('dev.customer')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['customer-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['customer', 'index']) }}">@lang('dev.all_customer')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['customer-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['customer', 'create']) }}">@lang('dev.new')</a>
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
                    href="{{ url_builder('admin.controller', ['product', 'create']) }}">@lang('dev.new')</a>
            </li>
        </ul>
    </li>
    <li class="slide {{ nav_checkactive(['categorie'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fa fa-tags"></i>&nbsp;<span class="side-menu__label">@lang('dev.categorie')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['categorie-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['categorie']) }}">@lang('dev.all_categorie')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['categorie-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['categorie', 'create']) }}">@lang('dev.new')</a>
            </li>
        </ul>
    </li>
    <li class="slide {{ nav_checkactive(['producttype'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fa fa-puzzle-piece"></i>&nbsp;<span class="side-menu__label">@lang('dev.product_propertie')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['producttype-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['producttype']) }}">@lang('dev.all_product_propertie')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['producttype-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['producttype', 'create']) }}">@lang('dev.new')</a>
            </li>
        </ul>
    </li>
    <li class="slide {{ nav_checkactive(['color'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fa fa-adjust"></i>&nbsp;<span class="side-menu__label">@lang('dev.product_color')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['color-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['color']) }}">@lang('dev.all_product_color')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['color-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['color', 'create']) }}">@lang('dev.new')</a>
            </li>
        </ul>
    </li>

    <li class="side-item side-item-category">@lang('dev.user_management')</li>
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
                    href="{{ url_builder('admin.controller', ['user']) }}">@lang('dev.all_user')</a>
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
                    href="{{ url_builder('admin.controller', ['userpermission']) }}">@lang('dev.all_permission')</a>
            </li>
            <li>
                <a class="slide-item {{ nav_checkactive(['userpermission-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['userpermission', 'create']) }}">@lang('dev.new')</a>
            </li>

        </ul>
    </li>

    <li class="side-item side-item-category">@lang('dev.fixed_asset')</li>
    <li class="slide {{ nav_checkactive(['equipment'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fas fa-hammer"></i>&nbsp;<span class="side-menu__label">@lang('dev.equipment')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['equipment-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['equipment']) }}">@lang('dev.all_equipment')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['equipment-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['equipment', 'create']) }}">@lang('dev.new')</a>
            </li>
        </ul>
    </li>
    <li class="slide {{ nav_checkactive(['inventory'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fas fa-dumpster"></i>&nbsp;<span class="side-menu__label">@lang('dev.inventory')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['inventory-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['inventory', 'index']) }}">@lang('dev.all_inventory')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['inventory-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['inventory', 'create']) }}">@lang('dev.new')</a>
            </li>
        </ul>
    </li>
</br>
<li class="slide {{ nav_checkactive(['vendor'], $args, 'is-expanded') }}">
    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
            class="fas fa-industry"></i>&nbsp;<span class="side-menu__label">@lang('dev.vendor')</span><i
            class="angle fe fe-chevron-right"></i></a>
    <ul class="slide-menu ">
        <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
        {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
        <li><a class="slide-item {{ nav_checkactive(['vendor-index'], $args) }}"
                href="{{ url_builder('admin.controller', ['vendor', 'index']) }}">@lang('dev.all_vendor')</a>
        </li>
        <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
        {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
        <li><a class="slide-item {{ nav_checkactive(['vendor-create'], $args) }}"
                href="{{ url_builder('admin.controller', ['vendor', 'create']) }}">@lang('dev.new')</a>
        </li>
    </ul>
</li>
   
    <li class="slide {{ nav_checkactive(['/'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="{{ url_builder('admin.controller', ['/']) }}"><i
                class="fas fa-chart-area"></i>&nbsp;<span class="side-menu__label">@lang('dev.reporting')</span></a>
    </li>

    <li class="slide {{ nav_checkactive(['currency'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fab fa-cc-mastercard"></i>&nbsp;<span class="side-menu__label">@lang('dev.currency')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['currency-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['currency', 'index']) }}">@lang('dev.all_currency')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['currency-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['currency', 'create']) }}">@lang('dev.new')</a>
            </li>
        </ul>
    </li>

    <li class="slide {{ nav_checkactive(['new-event'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i
                class="fab fa-cc-visa"></i>&nbsp;<span class="side-menu__label">@lang('dev.bank_corporate')</span><i
                class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['example-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['example', 'index']) }}">@lang('dev.all_bank_corporate')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['example-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['example', 'create']) }}">@lang('dev.new')</a>
            </li>
        </ul>
    </li>

    <li class="slide {{ nav_checkactive(['switcher'], $args, 'is-expanded') }}">
        <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0);"><i class="fa fa-cogs "
                aria-hidden="true">
                &nbsp;</i><span class="side-menu__label">@lang('dev.setting')</span><i class="angle fe fe-chevron-right"></i></a>
        <ul class="slide-menu ">
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['media-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media']) }}">@lang('dev.general')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['media-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media', 'create']) }}">@lang('dev.contact')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);">Dashboards</a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['switcher-index'], $args) }}"
                    href="{{ url_builder('admin.controller', ['switcher']) }}">@lang('dev.switch_profile')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['media-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media', 'create']) }}">@lang('dev.terms_Condition')</a>
            </li>
            <li class="side-menu__label1 "><a href="javascript:void(0);"></a></li>
            {{-- <li><a class="slide-item active" href="index.html">Dashboard-1</a></li> --}}
            <li><a class="slide-item {{ nav_checkactive(['media-create'], $args) }}"
                    href="{{ url_builder('admin.controller', ['media', 'create']) }}">@lang('dev.policy_privacy')</a>
            </li>
        </ul>
    </li>
</ul>
