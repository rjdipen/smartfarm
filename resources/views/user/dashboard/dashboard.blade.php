@extends('layouts.index')
@extends('user.dashboard.profileUpdateBox')
@section('title')
    Product
@endsection
@section('content')
    <div class="container-detached">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar-detached">
                    <div class="sidebar sidebar-default sidebar-separate" style="width: 306px;">
                        <div class="sidebar-content">
                            <div class="content-group">
                                <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">
                                    <div class="content-group-sm">
                                        <h6 class="text-semibold no-margin-bottom">
                                            {{Auth::user()->name}}
                                        </h6>

                                        <span class="display-block">{{Auth::user()->job}}</span>
                                    </div>

                                    <a href="#" class="display-inline-block content-group-sm">
                                        <img src="{{asset('public/image/information/iseries/'.Auth::user()->imgName)}}" class="img-circle img-responsive" alt="" style="width: 110px; height: 110px;">
                                    </a>

                                    <ul class="list-inline list-inline-condensed no-margin-bottom">
                                        <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-google-drive"></i></a></li>
                                        <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#" class="btn bg-indigo btn-rounded btn-icon"><i class="icon-github"></i></a></li>
                                    </ul>
                                </div>

                                <div class="panel no-border-top no-border-radius-top">
                                    <ul class="navigation">
                                        <li class="navigation-header">Navigation</li>
                                        <li  class="active"><a href="#profile" data-toggle="tab"><i class="icon-files-empty"></i> Profile</a></li>
                                        <li ><a href="#auction" data-toggle="tab"><i class="icon-files-empty"></i> Order History</a></li>
                                        <li class="navigation-divider"></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> Log out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <div class="content-group border-top-lg border-top-teal-300">
                <div class="page-header page-header-default" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                    <div class="breadcrumb-line">
                        {{--<a class="sidebar-mobile-detached-toggle visible-xs-block text-right"><i class="icon-grid7"></i></a>--}}
                        <ul class="breadcrumb">
                            <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>

                <div class="content-detached" id="information">
                <div class="tab-content">
                    <div class="tab-pane fade in active " id="profile">
                        <div class="row">
                            <div class="col-md-6">
                                <p><button type="button" class="btn bg-teal-400 btn-labeled ediBtn"
                                           data-id="{{Auth::user()->id}}"
                                           data-name="{{Auth::user()->name}}"
                                           data-job="{{Auth::user()->job}}"
                                           data-mobile="{{Auth::user()->mobile}}"
                                           data-address="{{Auth::user()->address}}"
                                           data-email="{{Auth::user()->email}}"
                                           data-toggle="modal" data-target="#ediModal"><b><i class="icon-pencil7"></i></b> Update Profile</button>
                                </p>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Profile Information</h5>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td style="width: 25%;">Name</td>
                                                <td>{{Auth::user()->name}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Email</td>
                                                <td>{{Auth::user()->email}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Job Title</td>
                                                <td>{{Auth::user()->job}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Mobile</td>
                                                <td>{{Auth::user()->mobile}}</td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">Address</td>
                                                <td>{{Auth::user()->address}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="auction">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Product Order Information</h5>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive1 table-bordered" id="datatable-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>S/N</td>
                                                <td class="no-padding"></td>
                                                <td>Description</td>
                                                <td>Status</td>
                                                <td>Qty</td>
                                                <td>Price</td>
                                                <td class="text-center">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                        $i = 0;
                                        @endphp
                                        @foreach($order as $row)
                                            @php
                                                $i ++;
                                            @endphp
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td class="no-padding hidden-print">
                                                    <img src="{{asset('public/image/information/iseries/'.$row->product['imgName'])}}" style="height:42px; width:42px;" alt="">
                                                </td>
                                                <td>
                                                    <h6 class="no-margin">{{$row->product['name']}}</h6>
                                                </td>
                                                <td>{{$row->status}}</td>
                                                <td>{{$row->qty}}</td>
                                                <td >{{money($row->price)}}</td>
                                                <td class="text-center">
                                                    <ul class="icons-list">
                                                        <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                <li ><a href="{{action('PaymentController@printOrder')}}"><i class="icon-eye"></i> View</a></li>
                                                                <li class="divider"></li>
                                                                <li ><a href=""><i class="icon-bin2"></i> Delete</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="content-detached">

        </div>
    </div>
@endsection




@section('script')
    <script type="text/javascript">

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var job = $(this).data('job');
                var mobile = $(this).data('mobile');
                var address = $(this).data('address');
                var email = $(this).data('email');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=job]').val(job);
                $('#ediModal [name=mobile]').val(mobile);
                $('#ediModal [name=address]').val(address);
                $('#ediModal [name=email]').val(email);

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

        $(function(){
            $(".file-styled-primary").uniform({
                fileButtonClass: 'action btn btn-default'
            });
        });

        // this is for responsive table
        $(function() {


            // Table setup
            // ------------------------------

            // Setting datatable defaults
            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    width: '100px',
                    targets: [ 5 ]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                },
                drawCallback: function () {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
                },
                preDrawCallback: function() {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
                }
            });


            // Basic responsive configuration
            $('.datatable-responsive1').DataTable();
        });


    </script>

@endsection


