@extends('layouts.index')
@section('title')
    Blog
@endsection
@section('content')
    <div class="visible-xs-block my-sidebar position-absolute">
        <a class="sidebar-mobile-detached-toggle"><i class="icon-grid7"></i></a>
    </div>
    <div class="container-detached mb-20">
        <div class="row">
            <div class="col-md-9">

                <a href="#" class="display-inline-block">
                    <img src="{{asset('public/assets/images/dipen.jpg')}}" class="img-responsive" alt="">
                </a>
                <div class="content-group border-top-lg border-top-teal-300">
                    <div class="page-header page-header-default" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                        <div class="breadcrumb-line">
                            {{--<a class="sidebar-mobile-detached-toggle visible-xs-block text-right"><i class="icon-grid7"></i></a>--}}
                            <ul class="breadcrumb">
                                <li><a href="{{action('HomeController@index')}}"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="#">Information</a></li>
                            </ul>

                            <div class="form-group">
                                <div class="has-feedback">
                                    <input type="search" data-url="{{action('User\BlogController@blogSearch')}}" class="form-control" placeholder="Search" name="search"  id="search">
                                    <div class="form-control-feedback">
                                        <i class="icon-search4 text-size-small text-muted"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-detached" >
                    <div class="row" id="blog">

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="sidebar-detached">

                    <div class="sidebar sidebar-default sidebar-separate">
                        <div class="sidebar-content">

                            <!-- Sidebar search -->
                            <div class="sidebar-category">
                                <div class="category-title">
                                    <span>Search</span>
                                    <ul class="icons-list">
                                        <li><a href="#" data-action="collapse"></a></li>
                                    </ul>
                                </div>

                                <div class="category-content">
                                    <form action="#">
                                        <div class="has-feedback has-feedback-left">
                                            <input type="search" data-url="{{action('User\BlogController@blogSearch')}}" class="form-control" placeholder="Search" name="search"  id="search1">
                                            <div class="form-control-feedback">
                                                <i class="icon-search4 text-size-base text-muted"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /sidebar search -->


                            <!-- Categories -->
                            <div class="sidebar-category">
                                <div class="category-title">
                                    <span>Categories</span>
                                    <ul class="icons-list">
                                        <li><a href="#" data-action="collapse"></a></li>
                                    </ul>
                                </div>

                                <div class="category-content no-padding">
                                    <ul class="navigation" id="blogCatClick">
                                        @foreach($table as $row)
                                            <li>
                                                <a href="{{action('User\BlogController@blogCat',[$row->bcatID])}}">
                                                    <i class="{{$row->icon}}"></i>
                                                    <span>{{$row->name}}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- /categories -->

                            <!-- Recent comments -->
                            <div class="sidebar-category">
                                <div class="category-title">
                                    <span>Recent comments</span>
                                    <ul class="icons-list">
                                        <li><a href="#" data-action="collapse"></a></li>
                                    </ul>
                                </div>

                                <div class="category-content">
                                    <ul class="media-list">
                                        <li class="media">
                                            <div class="media-left">
                                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                            </div>

                                            <div class="media-body">
                                                <a href="#" class="media-heading">
                                                    <span class="text-semibold">James Alexander</span>
                                                </a>

                                                <span class="text-muted">Who knows, maybe that...</span>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">
                                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                            </div>

                                            <div class="media-body">
                                                <a href="#" class="media-heading">
                                                    <span class="text-semibold">Margo Baker</span>
                                                </a>

                                                <span class="text-muted">That was something he...</span>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">
                                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                            </div>

                                            <div class="media-body">
                                                <a href="#" class="media-heading">
                                                    <span class="text-semibold">Jeremy Victorino</span>
                                                </a>

                                                <span class="text-muted">But that would be...</span>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">
                                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                            </div>

                                            <div class="media-body">
                                                <a href="#" class="media-heading">
                                                    <span class="text-semibold">Beatrix Diaz</span>
                                                </a>

                                                <span class="text-muted">What a strenuous career...</span>
                                            </div>
                                        </li>

                                        <li class="media">
                                            <div class="media-left">
                                                <img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt="">
                                            </div>

                                            <div class="media-body">
                                                <a href="#" class="media-heading">
                                                    <span class="text-semibold">Richard Vango</span>
                                                </a>

                                                <span class="text-muted">Other travelling salesmen...</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /recent comments -->


                            <!-- Tags -->
                            <div class="sidebar-category">
                                <div class="category-title">
                                    <span>Tags</span>
                                    <ul class="icons-list">
                                        <li><a href="#" data-action="collapse"></a></li>
                                    </ul>
                                </div>

                                <div class="category-content no-padding-bottom">
                                    <ul class="list-inline list-inline-condensed no-margin-bottom">
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-success label-striped content-group">Audio</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-warning label-striped content-group">Gallery</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-indigo label-striped content-group">Image</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-teal label-striped content-group">Music</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-pink label-striped content-group">Blog</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-purple label-striped content-group">Learn</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-blue label-striped content-group">Youtube</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-slate label-striped content-group">Twitter</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-orange label-striped content-group">Eugene</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="label border-left-brown label-striped content-group">Limitless</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /tags -->


                            <!-- Thumbnails -->
                            <div class="sidebar-category">
                                <div class="category-title">
                                    <span>Photos from Flickr</span>
                                    <ul class="icons-list">
                                        <li><a href="#" data-action="collapse"></a></li>
                                    </ul>
                                </div>

                                <div class="sidebar-category-wrapper">
                                    <div class="category-content">
                                        <div class="row">
                                            @foreach($blog as $row)
                                                <div class="col-xs-6 mb-10">
                                                    <div class="thumbnail no-padding no-border">
                                                        <div class="thumb">
                                                            <img src="{{asset('public/image/information/iseries/'.$row->imgName)}}" alt="">
                                                            <span class="zoom-image"><i class="icon-plus22"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /thumbnails -->

                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection


@section('style')
    <style>
        .my-sidebar{

        }
    </style>
@endsection





@section('script')
    <script type="text/javascript" src="{{asset('public/js/dateformate.js')}}"></script>

    <script type="text/javascript">

        $(function () {
            contents("{{action('User\BlogController@allBlog')}}");
            $('#blogCatClick li a').click(function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                contents(url);
            });

            $('#search').keyup(function (e) {
                e.preventDefault();
                var search = $(this).val();
                var url = $(this).data('url')+'?search='+search;

                if (search.length>0){
                    contents(url);
                }
                else {
                    contents("{{action('User\BlogController@allBlog')}}");
                }

            });

            $('#search1').keyup(function (e) {
                e.preventDefault();
                var search = $(this).val();
                var url = $(this).data('url')+'?search='+search;

                if (search.length>0){
                    contents(url);
                }
                else {
                    contents("{{action('User\BlogController@allBlog')}}");
                }

            })
        });



        function contents(url) {
            $.get(url, function(result){
                var show_data = '';
                $.each(result, function( i, row ) {
                    show_data += '<div class="col-md-4">'+
                        '                        <div class="panel panel-flat my-panel">\n' +
                        '                            <div class="panel-body">\n' +
                        '                                <div class="thumb content-group">\n' +
                        '                                    <img src="public/image/information/iseries/'+row.imgName+'" value="'+row.blogID+'" alt="" class="img-responsive">\n' +
                        '                                    <div class="caption-overflow">\n' +
                        '                                       <span>' +
                        '                                           <a href="{{action('User\BlogController@blogDetails')}}?id='+row.blogID+'" class="btn btn-flat border-white text-white btn-rounded btn-icon"><i class="icon-arrow-right8"></i></a>\n' +
                        '                                       </span>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '\n' +
                        '                                <h5 class="text-semibold mb-5">\n' +
                        '                                    <a href="{{action('User\BlogController@blogDetails')}}?id='+row.blogID+'" class="text-default" value="'+row.blogID+'">'+row.title+'</a>\n' +
                        '                                </h5>\n' +
                        '\n' +
                        '                                <ul class="list-inline list-inline-separate text-muted content-group">\n' +
                        '                                    <li>By <a href="#" class="text-muted" value="'+row.blogID+'">'+row.userID+'</a></li>\n' +
                        '                                    <li value="'+row.blogID+'">'+row.created_at+'</li>\n' +
                        '                                </ul>\n' +
                        '\n' +
                        '                                <p value="'+row.blogID+'">'+row.description.substr(0, 200)+'...'+'</p>' +
                        '                            </div>\n' +
                        '\n' +
                        '                            <div class="panel-footer panel-footer-condensed">\n' +
                        '                                <div class="heading-elements not-collapsible">\n' +
                        '                                    <ul class="list-inline list-inline-separate heading-text text-muted">\n' +
                        '                                        <li><a href="#" class="text-muted" value="'+row.blogID+'"><i class=" icon-bubbles9 text-size-base text-grey position-left"></i> '+row.totalCmd+'</a></li>\n' +
                        '                                    </ul>\n' +
                        '\n' +
                        '                                    <a href="{{action('User\BlogController@blogDetails')}}?id='+row.blogID+'" value="'+row.blogID+'" class="heading-text pull-right">Read more <i class="icon-arrow-right14 position-right"></i></a>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>'
                });

                $('#blog').html(show_data);
            });
        }

    </script>

@endsection


