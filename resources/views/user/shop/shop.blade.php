@extends('layouts.index')
@section('title')
    Product
@endsection
@section('content')
    <div class="container-detached">
        {{--this is for cart--}}
        <div class="cart_mini bg-teal">
            <div class="item_cart">
                <div class="text-center text-white"><strong>Total Item</strong></div>
                <h2 class="text-center text-white no-margin" id="cart_mimi_item">0</h2>
            </div>
            <p class="cart_amount no-margin text-white" id="cart_mimi_amount">TK 00.00</p>
        </div>

        <div class="cart_big" style="display: none;">
            <div class="head panel-heading p-5">
                <p class="text-white pl-10"><i class="icon icon-bag"></i> <span id="cart_big_item">1</span> Item</p>
                <a href="#" class="cross"><i class="icon icon-minus2"></i></a>
            </div>

            <div class="body">

                <table class="table table-hover">
                    <tbody id="cart_list">
                    </tbody>
                </table>

            </div>
            <div class="foot">
                <div class="row">
                    <div class="col-xs-6 pt-10 text-center"><span class="text-black" id="cart_big_amount">tk 00.00</span></div>
                    <div class="col-xs-6 text-right place_order">
                        <a href="{{action('DeliveryController@index')}}" data-id="" class="btn btn-success">Place Order *</a>

                    </div>
                </div>
            </div>
        </div>
        {{--this is for cart--}}
        <div class="row">
            <div class="col-md-3 col-sm-3">
                <div class="sidebar-detached sidebar-fixed">
                    <div class="sidebar sidebar-default sidebar-separate" style="width: 306px;">
                        <div class="sidebar-content " style="top: 70px;">
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
                                        <li class=""><a href="{{action('User\StoreController@product',[$row->scatID])}}" class="has-ul"><i class="{{$row->icon}}"></i> <span>{{$row->name}}</span></a>
                                            @php
                                                $subcat = $row->s_subcat()->get();
                                            @endphp
                                            @if($subcat != null)
                                            <ul style="display: none;">
                                                @foreach( $subcat as $rows)
                                                <li><a href="{{action('User\StoreController@product_subcat',[$rows->ssubcatID])}}"><i class="{{$rows->icon}}"></i> <span>{{$rows->name}}</span></a></li>
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
            <div class="col-md-9 col-sm-9">

                <div class="content-group border-top-lg border-top-teal-300">
                    <div class="page-header page-header-default" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                        <div class="breadcrumb-line"><a class="breadcrumb-elements-toggle"><i class="icon-menu-open"></i></a>
                            <ul class="breadcrumb">
                                <li><a href="{{action('HomeController@index')}}"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="components_breadcrumbs.html">Components</a></li>
                                <li class="active">Location</li>
                            </ul>
                        </div>

                        <div class="page-header-content">
                            <div class="page-title pt-15 pb-15">
                                <h5 class="text-semibold">All Product List</h5>
                                <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                            </div>

                            <div class="heading-elements">

                                    <div class="form-group">
                                        <div class="has-feedback">
                                            <input type="search" data-url="{{action('User\StoreController@product_search')}}" class="form-control" placeholder="Search" name="search"  id="search">
                                            <div class="form-control-feedback">
                                                <i class="icon-search4 text-size-small text-muted"></i>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-detached">
                    <div class="col-md-12" id="product" style="padding: 0 0px 15px 0px;">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <style>
        .cart_mini {
            position: fixed;
            z-index: 100;
            height: 100px;
            width: 100px;
            margin: 0px;
            box-shadow: -2px 0px 15px 5px rgba(0,0,0,0.3);
            /*background-color: rgb(0, 137, 123);*/
            right: 0px;
            top: 250px;
            cursor: pointer;
            border-bottom-left-radius: 5px;
            border-top-left-radius: 5px;
        }
        .cart_mini .item_cart {

            background-color: rgba(255,255,255,0.2);
            padding: 5px 10px;

        }

        .cart_mini .cart_amount {

            padding: 8px;
            text-align: center;
            text-shadow: 1px 1px 2px rgba(255,255,255,0.5);

        }

        .cart_big {

            position: fixed;
            z-index: 1000;
            background-color: rgba(255, 255, 255, 0.5);
            top: 80px;
            bottom: 50px;
            right: 0px;
            width: 300px;
            box-shadow: -1px 1px 5px 1px rgba(0,0,0,0.3);

        }

        .cart_big .head {

            position: relative;
            width: 100%;
            background-color: #009688;

        }

        .cart_big .head p {

            font-size: 15px;
            margin: -3px;

        }

        .cart_big .cross {

            position: absolute;
            color: white;
            text-align: center;
            width: 50px;
            right: 0px;
            background-color: #ff4641;
            top: 0px;
            bottom: 0px;

        }

        .cart_big .body {

            background-color: rgba(227, 189, 142, 0.3);
            background-color: #FFFFFF;
            position: absolute;
            padding: 10px 0px;
            top: 25px;
            bottom: 40px;
            overflow-x: hidden;
            overflow-y: auto;
            width: 100%;

        }


        .cart_big .foot {

            position: absolute;
            bottom: 0px;
            width: 100%;
            background-color: #277FBF;;
            color: #ffffff;
            line-height: normal;

        }
    </style>
@endsection



@section('script')

    <script type="text/javascript">

        //############################# St.Cart show hide #############################
        $('.cart_mini').click(function () {
            var qty = $('#cart_mimi_item').html();
            if(Number(qty) > 0)
                $('.cart_big').css('display', 'block');
        });

        $('.cross').click(function (e) {
            e.preventDefault();
            $('.cart_big').css('display', 'none');
        });
        //############################# End.Cart show hide #############################




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

        $(function () {
            contents("{{action('User\StoreController@all_product')}}");
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
                    contents("{{action('User\StoreController@all_product')}}");
                }

            })
        });



        function contents(url) {
            $.get(url, function(result){
                var show_data = '';
                $.each(result, function( i, row ) {
                    show_data += '<div class="col-md-4 col-sm-4">\n' +
                        '                            <div class="panel my-panel">\n' +
                        '                                <div class="panel-body p-15">\n' +
                        '                                       <div class="thumb">\n' +
                        '                                        <img src="public/image/information/iseries/'+row.imgName+'" value="'+row.productID+'" alt="">\n' +
                        '                                       <div class="caption-overflow">\n' +
                        '                                        <span>\n' +
                        '                                       <a href="{{action('User\StoreController@product_details')}}?id='+row.productID+'" value="'+row.productID+'" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>\n' +

                        '                                    </span>\n' +
                        '                                    </div>\n' +
                        '                                   </div>\n' +
                        '                                </div>\n' +
                        '\n' +
                        '                                <div class="panel-body panel-body-accent text-center p-15">\n' +
                        '                                    <h6 class="text-semibold no-margin"><a href="#" class="text-default" value="'+row.productID+'">'+row.name+'</a></h6>\n' +
                        '                                    <ul class="list-inline list-inline-separate mb-10">\n' +
                        '                                        <li><a href="#" class="text-muted" value="'+row.productID+'">'+row.scatID+'->'+row.ssubcatID+'</a></li>\n' +
                        '                                    </ul>\n' +
                        '                                    <h5 class="no-margin text-semibold" value="'+row.productID+'">'+row.price+'TK/'+row.unit+'</h5>\n' +

                        '                                </div>\n' +
                        '                                <div class="panel-footer text-center">\n' +
                        '                                    <button type="button" class="btn btn-primary addTocard" data-unit="'+row.unit+'"  data-price="'+row.price+'" data-id="'+row.productID+'"><b><i class="icon-cart-add2"></i></b> ADD</button>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>';
                });

                $('#product').html(show_data);

                $('.addTocard').click(function () {
                    //alert('take');
                    var id = $(this).data('id');
                    var unit = $(this).data('unit');
                    var price = $(this).data('price');
                    temp_save(id, unit, price);
                });
            });



        }


        function temp_save(id, unit, price) {
            $.ajax({
                url: "{{action('User\StoreController@tempsave')}}",
                type: 'GET',
                data: {productID:id, unit:unit, price:price},
                success:function(result){
                    temp_list();
                },
                error: function (jXHR, textStatus, errorThrown) {html("")}
            });
        }

        function temp_list(){
            var tables = '';
            $.ajax({
                url: "{{action('User\StoreController@temp_list')}}",
                type: 'GET',
                dataType: 'JSON',
                success:function(result){

                    $.each(result.table, function( i, row ) {
                        tables += row.product;
                    });

                    $('#cart_mimi_item, #cart_big_item').html(result.item);
                    $('#cart_mimi_amount, #cart_big_amount').html(result.amount);
                    $('#cart_list').html(tables);
                },
                error: function (jXHR, textStatus, errorThrown) {html("")}
            });
        }


    </script>

@endsection


