<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{asset('images/icon/logo.png')}}" alt="Sanjha Kitab" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{(Route::current()->getName() == 'adminDashBoard') ? 'active' : ''}} has-sub">
                    <a class="js-arrow" href="{{route('adminDashBoard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="{{(Route::current()->getName() == 'users') ? 'active' : ''}} has-sub">
                    <a href="{{route('users')}}">
                        <i class="fas fa-user"></i>Users</a>
                </li>

                <li class="{{(Route::current()->getName() == 'books') ? 'active' : ''}} has-sub">
                    <a href="{{route('books')}}">
                        <i class="fas fa-book"></i>Books</a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
