<div class="sidebar sidebar-main sidebar-fixed bg-teal-700">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    {{--<li class="{{ (Request::is('admin') ? 'active' : '') }}"><a href="{{action('HomeController@admin')}}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>--}}
                    <li class="nav-divider"></li>
                    <li class="{{ (Request::is('state') ? 'active' : '') }}"><a href="{{action('Information\StateController@index')}}"><i class=" icon-location4"></i> <span>State</span></a></li>
                    <li class="{{ (Request::is('city') ? 'active' : '') }}"><a href="{{action('Information\CityController@index')}}"><i class="icon-direction"></i> <span>City</span></a></li>
                    <li class="nav-divider"></li>
                    <li class="{{ (Request::is('all/user') ? 'active' : '') }}"><a href="{{action('HomeController@allUSer')}}"><i class="icon-user-tie"></i> <span> All User</span></a></li>
                    <li class="nav-divider"></li>
                    {{--<li class="{{ (Request::is('customer') ? 'active' : '') }}"><a href=""><i class="icon-home4"></i> <span>Customer</span></a></li>--}}
                    <li class="{{ (Request::is('information/*', 'information') ? 'active' : '') }}"><a href="#"><i class=" icon-equalizer3"></i> <span>Information</span></a>
                        <ul>
                            <li class="{{ (Request::is('icat/list') ? 'active' : '') }}"><a href="{{action('Information\IcatController@index')}}"><i class="icon-diamond3"></i> Category</a></li>
                            <li class="{{ (Request::is('isubcat/list') ? 'active' : '') }}"><a href="{{action('Information\IsubcatController@index')}}"><i class="icon-diamond3"></i> SubCategories</a></li>
                            <li class="{{ (Request::is('iseries/list') ? 'active' : '') }}"><a href="{{action('Information\IseriesController@index')}}"><i class="icon-diamond3"></i> Series</a></li>
                        </ul>
                    </li>

                    <li class="{{ (Request::is('traning/*', 'traning') ? 'active' : '') }}"><a href="#"><i class="icon-hammer-wrench"></i> <span>Traning</span></a>
                        <ul>
                            <li class="{{ (Request::is('tseries/list') ? 'active' : '') }}"><a href="{{action('Traning\TseriesController@index')}}"><i class="icon-diamond3"></i> Series</a></li>
                        </ul>
                    </li>

                    <li class="{{ (Request::is('store/*', 'store') ? 'active' : '') }}"><a href="#"><i class="icon-bag"></i> <span>Shop</span></a>
                        <ul>
                            <li class="{{ (Request::is('scat/list') ? 'active' : '') }}"><a href="{{action('Store\ScatController@index')}}"><i class="icon-diamond3"></i> Category</a></li>
                            <li class="{{ (Request::is('ssubcat/list') ? 'active' : '') }}"><a href="{{action('Store\SsubcatController@index')}}"><i class="icon-diamond3"></i> SubCategory</a></li>
                            <li class="{{ (Request::is('store/list') ? 'active' : '') }}"><a href="{{action('Store\ProductController@index')}}"><i class="icon-diamond3"></i> Product</a></li>
                            <li class="{{ (Request::is('store/order/list') ? 'active' : '') }}"><a href="{{action('Store\ProductController@orderList')}}"><i class="icon-diamond3"></i> Order List</a></li>
                        </ul>
                    </li>



                    <li class="{{ (Request::is('blog/*', 'blog') ? 'active' : '') }}"><a href="#"><i class="icon-clipboard6"></i> <span>Blog</span></a>
                        <ul>
                            <li class="{{ (Request::is('bcat/list') ? 'active' : '') }}"><a href="{{action('Blog\BcatController@index')}}"><i class="icon-diamond3"></i> Category</a></li>
                            <li class="{{ (Request::is('blog/create') ? 'active' : '') }}"><a href="{{action('Blog\BlogController@create')}}"><i class="icon-diamond3"></i> Create Blog</a></li>
                            <li class="{{ (Request::is('blog/list') ? 'active' : '') }}"><a href="{{action('Blog\BlogController@index')}}"><i class="icon-diamond3"></i> All Blog</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
