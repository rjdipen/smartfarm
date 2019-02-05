@extends('layouts.index')
@section('title')
    Training Details
@endsection
@section('content')
    <div class="visible-xs-block my-sidebar position-absolute">
        <a class="sidebar-mobile-detached-toggle"><i class="icon-grid7"></i></a>
    </div>
    <div class="container-detached mb-20">
        <div class="row mb-20">
            <div class="col-md-10  col-md-offset-1 ">
                <div class="content-group border-top-lg border-top-teal-300">
                    <div class="page-header page-header-default" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                        <div class="breadcrumb-line">
                            {{--<a class="sidebar-mobile-detached-toggle visible-xs-block text-right"><i class="icon-grid7"></i></a>--}}
                            <ul class="breadcrumb">
                                <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="#">Training</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <a href="#" class="display-inline-block">
                    <img src="{{asset('public/image/information/iseries/'.$table->imgName)}}" class="img-responsive" alt="">
                </a>
                <div class="page-header ">
                    <div class="panel panel-title bg-teal-400">
                        <h5 class="pl-20">{{$table->title}}</h5>
                    </div>
                </div>
                @php
                    $i =0;

                @endphp
            @foreach($titems as $rows)
                    @php
                        $i ++;

                    @endphp
                <div class="content-detached">
                    <div class="panel panel-flat blog-horizontal blog-horizontal-2">
                        <div class="panel-body">
                            <div class="thumb" >
                                <a class="ediBtn" href="#course_preview{{$rows->titemID}}"
                                   data-id="{{$rows->titemID}}"
                                   data-tserieid="{{$rows->tserieID}}"
                                   data-title="{{$rows->title}}"
                                   data-img="{{asset('public/image/information/iseries/'.$rows->imgName)}}"
                                   data-video="{{asset('public/video/episode/'.$rows->videoName)}}"
                                   data-toggle="modal">
                                    <img src="{{asset('public/image/information/iseries/'.$rows->imgName)}}" class="img-responsive img-rounded" alt="">
                                    <span class="zoom-image"><i class="icon-play3"></i></span>
                                </a>
                            </div>

                            <div class="blog-preview">
                                <h5 class="blog-title text-semibold">
                                    <a href="#"><span class="pr-10">Episode {{$i}} :</span>{{$rows->title}}</a>
                                </h5>
                                <p>{{$rows->description}}</p>
                            </div>

                        </div>

                        <div class="panel-footer panel-footer-condensed">
                            <div class="pl-20">
                                <ul class="list-inline list-inline-separate heading-text text-muted">
                                    <li>{{$rows->created_at->diffForHumans()}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!--THIS IS FOR VIDEO MODEL-->
                    <!-- Course preview modal -->
                    <div class="modal fade" id="course_preview{{$rows->titemID}}" tabindex="-1">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header bg-teal">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h6 class="modal-title">{{$rows->title}}</h6>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" id="ediID" name="id">
                                    <input type="hidden" id="ediID2" name="tserieid">

                                    <div class="modal-body">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <video class="embed-responsive-item" width="500" controls>
                                                <source src="{{asset('public/video/episode/'.$rows->videoName)}}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </form>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /course preview modal -->
                <!--THIS IS FOR VIDEO MODEL-->
            @endforeach
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


    </script>

@endsection


