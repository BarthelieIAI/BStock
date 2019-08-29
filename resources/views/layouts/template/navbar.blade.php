<header class="app-header">
    <a class="app-header__logo" href="#" style="text-decoration-style: solid">B-STOCK</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->

        <!-- User Menu-->
        <li class="dropdown show">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu" aria-expanded="true">
                <i class="fa fa-user fa-lg"></i></a>
            <ul
                    class="dropdown-menu settings-menu dropdown-menu-right"
                    x-placement="bottom-end"
                    style="position: absolute;
                    transform: translate3d(-117px, 50px, 0px); top: 0px; left: 0px;
                    will-change: transform;"
            >

                   <li> <a class="dropdown-item" href="#"><i class="icon fa fa-lock"></i> Verrouiller</a></li>
                <li>
                    <a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>