<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <b>
                    <img src="https://www.waffcake.com/img/logo_wk_02.png" alt="WaffCake" class="light-logo">
                </b>
                <span>
                    <img src="https://www.waffcake.com/img/logo_wk_02.png" alt="WaffCake" class="dark-logo"></span> </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark"
                        href="#"><i class="fas fa-expand"></i></a> </li>
                <li class="nav-item"> <a
                        class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="#">
                        <!--<i class="icon-menu ti-menu"></i>--><i class="fas fa-expand"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="hidden-md-down">
                            {{ Auth()->user()->name }} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <a href="{{route('getUser',Auth()->user()->id)}}" class="dropdown-item"><i class="ti-user"></i>
                            Mi
                            Perfil</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item">
                            <i class="fa fa-power-off"></i>
                            Cerrar Sesion
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>