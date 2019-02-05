@extends('layouts.index')
@section('title')
    Information Details
@endsection
@section('content')
    <div class="visible-xs-block my-sidebar position-absolute">
        <a class="sidebar-mobile-detached-toggle"><i class="icon-grid7"></i></a>
    </div>
    <div class="container-detached mb-20">
        <div class="row mb-20">
            <div class="col-md-10 col-md-offset-1">
                <div class="content-group border-top-lg border-top-teal-300">
                    <div class="page-header page-header-default" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                        <div class="breadcrumb-line">
                            {{--<a class="sidebar-mobile-detached-toggle visible-xs-block text-right"><i class="icon-grid7"></i></a>--}}
                            <ul class="breadcrumb">
                                <li><a href="{{action('HomeController@index')}}"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="{{action('User\InformationController@index')}}">Information</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div  class="display-inline-block">
                    <img src="{{asset('public/image/information/iseries/'.$table->imgName)}}" class="img-responsive" alt="">
                    <div class="panel" style="border-radius: 0px;">
                        <div class="panel-heading bg-teal-300" style="border-radius: 0px; padding: 1px 20px;">
                            <h5 class="mt-0 ">{{$table->name}}</h5>
                        </div>
                        <div class="panel-body pt-10 pb-10" style="border-radius: 0px;">
                            <p>{{$table->description}}</p>
                        </div>

                    </div>
                </div>

                <div class="content-detached mb-20">
                    @php
                        $i =0;

                    @endphp
                    @foreach($istep as $isteps)
                        @php
                        $i++;
                        @endphp
                    <div class="mb-20 my-panel panel-group panel-group-control panel-group-control-right content-group-lg">
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <h6 class="panel-title">
                                    <a data-toggle="collapse" href="#steps{{$isteps->istepID}}" aria-expanded="false" class="collapsed"><strong class="pr-5">Step {{$i}}:</strong>{{$isteps->title}}</a>
                                </h6>
                            </div>
                            <div id="steps{{$isteps->istepID}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{asset('public/image/information/iseries/'.$table->imgName)}}" alt="" class="img-responsive">
                                        </div>

                                        <div class="col-md-9">
                                            <div class="blog-preview">
                                                <p>{!! $isteps->description !!}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection


@section('style')
    <style>
        /*.info-details{*/
            /*position: relative;*/
        /*}*/

        /*.info-details .info-caption {*/
            /*position: absolute;*/
            /*top: 48%;*/
            /*z-index: 1;*/
            /*!*bottom: 50%;*!*/
            /*left: 50%;*/
            /*transform: translate(-50%,-50%);*/

        /*}*/
    </style>
@endsection





@section('script')

    <script type="text/javascript">

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var istate = $(this).data('istate');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=stateID]').val(istate);

            });
        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                iDisplayLength: 25,
                columnDefs: [
                    { orderable: false, "targets": [3] }//For Column Order
                ]
            });

        });

    </script>

@endsection


