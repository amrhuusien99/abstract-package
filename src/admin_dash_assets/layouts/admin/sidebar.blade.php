<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <li>
                <a href="{{route('admin/index')}}" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Admins<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/admins/index')}}/0/{{PAGINATION_COUNT}}">Admins</a>
                    </li>
                    <li>
                        <a href="{{route('admin/admins/create')}}">Add Admin</a>
                    </li>
                    <li>
                        <a href="{{route('admin/admins/archives')}}/0/{{PAGINATION_COUNT}}">Archives</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/users/index')}}/0/{{PAGINATION_COUNT}}">Users</a>
                    </li>
                    <li>
                        <a href="{{route('admin/users/create')}}">Add User</a>
                    </li>
                    <li>
                        <a href="{{route('admin/users/archives')}}/0/{{PAGINATION_COUNT}}">Archives</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Sliders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/sliders/index')}}/0/{{PAGINATION_COUNT}}">Sliders</a>
                    </li>
                    <li>
                        <a href="{{route('admin/sliders/create')}}">Add Slider</a>
                    </li>
                    <li>
                        <a href="{{route('admin/sliders/archives')}}/0/{{PAGINATION_COUNT}}">Archives</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Brands<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/brands/index')}}/0/{{PAGINATION_COUNT}}">Brands</a>
                    </li>
                    <li>
                        <a href="{{route('admin/brands/create')}}">Add Brand</a>
                    </li>
                    <li>
                        <a href="{{route('admin/brands/archives')}}/0/{{PAGINATION_COUNT}}">Archives</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/categories/index')}}/0/{{PAGINATION_COUNT}}">Categories</a>
                    </li>
                    <li>
                        <a href="{{route('admin/categories/create')}}">Add Category</a>
                    </li>
                    <li>
                        <a href="{{route('admin/categories/archives')}}/0/{{PAGINATION_COUNT}}">Archives</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Attributes<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/attributes/index')}}/0/{{PAGINATION_COUNT}}">Attributes</a>
                    </li>
                    <li>
                        <a href="{{route('admin/attributes/create')}}">Add Attribute</a>
                    </li>
                    <li>
                        <a href="{{route('admin/attributes/archives')}}/0/{{PAGINATION_COUNT}}">Archives</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Products<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/products/index')}}/0/{{PAGINATION_COUNT}}">Products</a>
                    </li>
                    <li>
                        <a href="{{route('admin/products/create')}}">Add Product</a>
                    </li>
                    <li>
                        <a href="{{route('admin/products/archives')}}/0/{{PAGINATION_COUNT}}">Archives</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Orders<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/orders/index')}}/0/{{PAGINATION_COUNT}}">Orders</a>
                    </li>
                    <li>
                        <a href="{{route('admin/orders/archives')}}/0/{{PAGINATION_COUNT}}">Archives</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Abouts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/abouts/index')}}/0/{{PAGINATION_COUNT}}">Abouts</a>
                    </li>
                    <li>
                        <a href="{{route('admin/abouts/create')}}">Add About</a>
                    </li>
                    <li>
                        <a href="{{route('admin/abouts/archives')}}/0/{{PAGINATION_COUNT}}">Archives</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Settings<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin/settings/index')}}/0/{{PAGINATION_COUNT}}">Settings</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
