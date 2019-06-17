<!----- Main SideBar ------>
<aside class="sidebar z-depth-1">
    <ul class="accordion" id="accordion" role="tablist" aria-multiselectable="false">
        <li class="header">منو اصلی</li>
        <li class="sidebar-link">
            <a class="waves-effect" href="#">
                <i class="fa fa-dashboard"></i>
                داشبورد
            </a>
        </li>
        <li class="sidebar-link">
            <a class="waves-effect" href="javascript:;">
                <i class="fa fa-tags"></i>
                دسته بندی ها
                <span class="fa fa-angle-down"></span>
            </a>
            <ul class="collapse">
                <li class="waves-effect"><a href="{{ route('admin.categories.index') }}">
                        لیست دسته بندی ها
                    </a>
                </li>
                <li class="waves-effect"><a href="{{ route('admin.categories.create') }}">
                        ساخت دسته بندی
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-link">
            <a class="waves-effect" href="javascript:;">
                <i class="fa fa-th-large"></i>
                محصولات
                <span class="fa fa-angle-down"></span>
            </a>
            <ul class="collapse">
                <li class="waves-effect"><a href="{{ route('admin.products.index') }}">
                        لیست محصولات
                    </a>
                </li>
                <li class="waves-effect"><a href="{{ route('admin.products.create') }}">
                        ساخت محصول
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-link">
            <a class="waves-effect" href="javascript:;">
                <i class="fa fa-dollar"></i>
                کد تخفیف
                <span class="fa fa-angle-down"></span>
            </a>
            <ul class="collapse">
                <li class="waves-effect"><a href="{{ route('admin.coupons.index') }}">
                        لیست کد تخفیف
                    </a>
                </li>
                <li class="waves-effect"><a href="{{ route('admin.coupons.create') }}">
                        ساخت کد تخفیف
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-link">
            <a class="waves-effect" href="javascript:;">
                <i class="fa fa-newspaper-o"></i>
                لیست سفارش ها
                <span class="fa fa-angle-down"></span>
            </a>
            <ul class="collapse">
                <li class="waves-effect"><a href="{{ route('admin.orders.index') }}">
                        لیست سفارش ها
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-link">
            <a class="waves-effect" href="javascript:;">
                <i class="fa fa-users"></i>
                کاربران
                <span class="fa fa-angle-down"></span>
            </a>
            <ul class="collapse">
                <li class="waves-effect"><a href="{{ route('admin.users.index') }}">
                        لیست کاربران
                    </a>
                </li>
                <li class="waves-effect"><a href="{{ route('admin.users.create') }}">
                        ساخت کاربر
                    </a>
                </li>
            </ul>
        </li>
        <li class="sidebar-link">
            <a class="waves-effect" href="javascript:;">
                <i class="fa fa-users"></i>
                نقش ها
                <span class="fa fa-angle-down"></span>
            </a>
            <ul class="collapse">
                <li class="waves-effect"><a href="#">
                        لیست نقش ها
                    </a>
                </li>
                <li class="waves-effect"><a href="#">
                        ساخت نقش
                    </a>
                </li>
            </ul>
        </li>
    </ul>

</aside>