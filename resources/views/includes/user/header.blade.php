<!-- Main navbar -->
<div class="navbar navbar-inverse navbar-fixed-top bg-teal-600" id="main-navbar">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{action('HomeController@index')}}"><span class="text-bold text-uppercase">smartfarm</span></a>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-paragraph-justify3"></i></a></li>
            {{--<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>--}}
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
            <li class="{{ (Request::is('/') ? 'active' : '') }}"><a href="{{action('HomeController@index')}}">Home</a></li>
            <li class="{{ (Request::is('information') ? 'active' : '') }}"><a href="{{action('User\InformationController@index')}}">Information</a></li>
            <li class="{{ (Request::is('training') ? 'active' : '') }}"><a href="{{action('User\TrainingController@index')}}">Training</a></li>
            <li class="{{ (Request::is('shop') ? 'active' : '') }}"><a href="{{action('User\StoreController@index')}}">Product</a></li>
            <li class="{{ (Request::is('blog') ? 'active' : '') }}"><a href="{{action('User\BlogController@index')}}">Blog</a></li>

            @if(isset(Auth::user()->email))
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="" alt="">
                        <span class="text-capitalize">{{ isset(Auth::user()->name) ? Auth::user()->name : 'User name' }}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right animated bounceIn">
                        <li><a href="#"><i class="icon-paperplane"></i> {{ isset(Auth::user()->email) ? Auth::user()->email : 'User email' }}</a></li>

                        <li><a href="{{action('User\DashboardController@index')}}"><i class="icon-coins"></i> Dashboard</a></li>
                        <li class="divider"></li>
                        <li><a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i> Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li><a href="{{route('login')}}">Login</a></li>
            @endif

        </ul>
    </div>
</div>
<!-- /main navbar -->
