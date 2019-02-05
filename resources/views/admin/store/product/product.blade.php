@extends('layouts.admin')
@extends('admin.box.store.sProductBox')
@section('title')
    Product
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Add New Product</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Product List</h6>
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
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->productID}}</td>
                                <td>
                                    <div class="media">
                                        <a href="#" class="media-left">
                                            <img src="{{asset('public/image/information/iseries/'.$row->imgName)}}" class="img-rounded img-lg" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->qty}}/{{$row->unit}}</td>
                                <td>{{$row->status}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn"
                                            data-id="{{$row->productID}}"
                                            data-name="{{$row->name}}"
                                            data-qty="{{$row->qty}}"
                                            data-price="{{$row->price}}"
                                            data-unit="{{$row->unit}}"
                                            data-des="{{$row->description}}"
                                            data-tag="{{$row->tag}}"
                                            data-cat="{{$row->scatID}}"
                                            data-subcat="{{$row->ssubcatID}}"
                                            data-img="{{asset('public/image/information/iseries/'.$row->imgName)}}"
                                            data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Store\ProductController@del',['id' => $row->productID])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
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
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var qty = $(this).data('qty');
                var price = $(this).data('price');
                var unit = $(this).data('unit');
                var tag = $(this).data('tag');
                var des = $(this).data('des');
                var cat = $(this).data('cat');
                var subcat = $(this).data('subcat');
                var img = $(this).data('img');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=qty]').val(qty);
                $('#ediModal [name=price]').val(price);
                $('#ediModal [name=unit]').val(unit);
                $('#ediModal [name=tag]').val(tag);
                $('#ediModal [name=description]').val(des);
                $('#ediModal [name=scatID]').val(cat);
                $('#ediModal [name=ssubcatID]').val(subcat);
                $('#ediModal img').attr('src',img);

            });
        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                iDisplayLength: 25,
                columnDefs: [
                    { orderable: false, "targets": [6] }//For Column Order
                ]
            });

        });

        $(function(){
            $(".file-styled-primary").uniform({
                fileButtonClass: 'action btn btn-default'
            });
        });


        //image Preview
        $(function () {
            $("#inputFile").change(function () {
                imgPrev(this , '.preview');
            });
        });

        // upload date
        $(function () {
            $('#scat').change(function () {
                var scatID = $(this).val();
                $.get("{{action('Store\ProductController@subcat_list')}}", {scatID: scatID}, function(result){
                    var show_data = '';
                    $.each(result, function( i, value ) {
                        show_data += '<option value="'+value.ssubcatID+'">'+value.name+'</option>';
                    });

                    $('#ssubcat').html(show_data);
                });
            });

        });

        // Edit data
        $(function () {
            $('#scatEdit').change(function () {
                var scatID = $(this).val();
                $.get("{{action('Store\ProductController@subcat_list')}}", {scatID: scatID}, function(result){
                    var show_data = '';
                    $.each(result, function( i, value ) {
                        show_data += '<option value="'+value.ssubcatID+'">'+value.name+'</option>';
                    });

                    $('#ssubcatEdit').html(show_data);
                });
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

