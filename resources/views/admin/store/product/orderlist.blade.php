@extends('layouts.admin')
@section('title')
    Order List
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Order List</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable datatable-responsive4"  >
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>IMG</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Status</th>
                            <th>total</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->orderID}}</td>
                                <td>
                                    <div class="media">
                                        <a href="#" class="media-left">
                                            <img src="{{asset('public/image/information/iseries/'.$row->product['imgName'])}}" class="img-rounded img-lg" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>{{$row->product['name']}}</td>
                                <td>{{$row->qty}}/{{$row->unit}}</td>
                                <td>{{money($row->price)}}</td>
                                <td>
                                    @if($row->status == 'Pending')
                                        <a  href="{{action('Store\ProductController@orderShip', ['id' => $row->orderID])}}"  onclick="return confirm('Are you sure to make Shipping?')" title="User">
                                            <span class="label bg-blue"> Pending </span></a>
                                    @else
                                        <a href=""   title="Admin">
                                            <span class="label bg-success-400">  Shipping</span> </a>
                                    @endif
                                </td>
                                <td>{{money($row->qty*$row->price)}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Store\ProductController@orderdel',['id' => $row->orderID])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')

    <script type="text/javascript">



        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                iDisplayLength: 25,
                columnDefs: [
                    { orderable: false, "targets": [6] }//For Column Order
                ]
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
            $('.datatable-responsive4').DataTable();
        });

    </script>

@endsection

