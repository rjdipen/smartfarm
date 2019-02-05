@extends('layouts.index')
@section('title')
    Information
@endsection
@section('content')
    <div class="visible-xs-block my-sidebar position-absolute">
        <a class="sidebar-mobile-detached-toggle"><i class="icon-grid7"></i></a>
    </div>
    <div class="container-detached mb-20">
        <div class="row mb-20">
            <div class="col-md-3 col-sm-12 col-xs-12">
                <div class="sidebar-detached">
                    <div class="sidebar sidebar-default sidebar-separate" style="min-width: 306px;">
                        <div class="sidebar-content">
                            <div class="sidebar-category">
                                <div class="category-title">
                                    <span>Categories</span>
                                    <ul class="icons-list">
                                        <li><a href="#" data-action="collapse" class=""></a></li>
                                    </ul>
                                </div>


                                <div class="category-content no-padding" style="display: block;">
                                    <ul class="navigation navigation-alt navigation-accordion navigation-sm no-padding-top" id="categoryClick">
                                        @foreach($table as $row)
                                            <li class=""><a href="{{action('User\InformationController@icatList',[$row->icatID])}}" class="has-ul"><i class=""></i> <span>{{$row->name}}</span></a>
                                                @php
                                                    $isubcat = $row->infoSubcat()->get();
                                                @endphp
                                                @if($isubcat != null)
                                                    <ul style="display: none;">
                                                        @foreach( $isubcat as $rows)
                                                            <li><a href="{{action('User\InformationController@isubcatList',[$rows->isubcatID])}}"><i class=""></i> <span>{{$rows->name}}</span></a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12 mb-lg-5">
                <a href="#" class="display-inline-block">
                    <img src="{{asset('public/image/caresoul/information.jpg')}}" class="img-responsive" alt="">
                </a>
                <div class="content-group border-top-lg border-top-teal-300">
                    <div class="page-header page-header-default" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                        <div class="breadcrumb-line">
                            {{--<a class="sidebar-mobile-detached-toggle visible-xs-block text-right"><i class="icon-grid7"></i></a>--}}
                            <ul class="breadcrumb">
                                <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="#">Information</a></li>
                            </ul>

                            <div class="form-group">
                                <div class="has-feedback">
                                    <input type="search" data-url="{{action('User\InformationController@informationSearch')}}" class="form-control" placeholder="Search" name="search"  id="search">
                                    <div class="form-control-feedback">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-detached" id="information">

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

    <script type="text/javascript">


        $(function () {
            contents("{{action('User\InformationController@allInformation')}}");
            $('#categoryClick li a').click(function (e) {
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
                    contents("{{action('User\InformationController@allInformation')}}");
                }

            })
        });



        function contents(url) {
            $.get(url, function(result){
                var show_data = '';
                $.each(result, function( i, row ) {
                    show_data += '<div class="panel my-panel panel-flat blog-horizontal blog-horizontal-2 mb-10">\n' +
                        '                        <div class="panel-body">\n' +
                        '                            <div class="row">\n' +
                        '                                <div class="col-md-3 pb-10">\n' +
                        '                                    <img src="public/image/information/iseries/'+row.imgName+'" value="'+row.iserieID+'" alt="" class="img-responsive">\n' +
                        '                                </div>\n' +
                        '\n' +
                        '                                <div class="col-md-9">\n' +
                        '                                    <div class="blog-preview">\n' +
                        '                                        <h5 class="blog-title text-semibold mb-10">\n' +
                        '                                            <a href="{{action('User\InformationController@informationDetails')}}?id='+row.iserieID+'" value="'+row.iserieID+'">'+row.name+'</a>\n' +
                        '                                        </h5>\n' +
                        '\n' +
                        '                                        <p value="'+row.iserieID+'">'+row.description+'</p>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '\n' +
                        '                        </div>\n' +
                        '\n' +
                        '                        <div class="panel-footer">\n' +
                        '                            <ul class="list-inline list-inline-separate heading-text text-muted pl-10 pr-10" style="margin-bottom: 0px;">\n' +
                        '                                <li  value="'+row.iserieID+'"><i class="icon-calendar2 pr-10"></i>'+row.created_at+'</li>\n' +
                        '                                <li class="pull-right"><a href="{{action('User\InformationController@informationDetails')}}?id='+row.iserieID+'" class="heading-text ">Read more <i class="icon-arrow-right14 position-right"></i></a></li>\n' +
                        '                            </ul>\n' +
                        '                        </div>\n' +
                        '                    </div>'
                });

                $('#information').html(show_data);
            });
        }

    </script>

@endsection


