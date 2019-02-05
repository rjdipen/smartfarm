@extends('layouts.index')
@extends('user.shop.paymentBox')
@section('title')
    Product Payment
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="breadcrumb-line breadcrumb-line-component mb-20">
                <ul class="breadcrumb">
                    <li><a href=""><i class="icon-home2 position-left"></i>Home</a></li>
                    <li><a href="">Product</a></li>
                    <li >Checkout</li>
                    <li class="active">Payment</li>
                </ul>
            </div>

            <div class="page-header bg-teal-400">
                <div class="page-header-content">
                    <div class="page-title" style="padding: 13px 35px;">
                        <h4 class="text-center">Payment</h4>
                    </div>
                </div>
            </div>
            <div class="panel p-20">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-black text-brown no-margin text-center">Your order is on its way</h1>
                        <h1 class="text-black text-center no-margin">please pay with <span class="text-success">cash on delivery</span></h1>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center no-margin mb-10">Do you want to <span class="text-success text-black">Pay Now?</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <button class="btn btn-default" data-toggle="modal" data-target="#bikashModal"><img src="{{asset('public/bekash.png')}}"></button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <h3 class="text-center no-margin text-black text-muted"><u>Order Summary</u></h3>
                    </div>
                </div>
                <!--Invoice Over view-->
                <div class="row">
                    <div class="col-sm-6 content-group">
                        {{--<img src="http://new.infinityflamesoft.com/sodai/public/logo.png" class="content-group mt-10" alt="Logo" style="height: 50px;">--}}
                        <ul class="list-condensed list-unstyled">
                            <li><strong class="text-uppercase">Smartfarm</strong></li>
                            <li>Somrat Tower, Subhanighat, Sylhet, 3100.</li>
                            <li>+8801747270531, <span class="text-italic">info@smartfarm.live</span></li>
                            <li class="text-italic text-blue">www.smartfarm.live</li>
                        </ul>
                    </div>

                    <div class="col-sm-6 content-group">
                        <div class="invoice-details">
                            <span class="text-muted">Invoice From:</span>

                            <ul class="list-condensed list-unstyled">
                                @foreach($delivery as $rows)
                                <li><h5>{{$rows->user['name']}}</h5></li>
                                <li>{{$rows->address}}</li>
                                <li>{{$rows->user['mobile']}}</li>
                                <li>{{$rows->user['email']}}</li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-lg-9 content-group"></div>

                    <div class="col-md-6 col-lg-3 content-group">
                        <div class="invoice-details">
                            <h5 class="text-uppercase text-semibold">Invoice #00021</h5>
                            <ul class="list-condensed list-unstyled">
                                @foreach($delivery as $rows)
                                <li>Date: <span class="text-semibold">{{pub_date($rows->created_at)}}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-lg table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="no-padding"></th>
                            <th>Description</th>
                            <th>Rate</th>
                            <th>Qty</th>
                            <th class="text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $grandTotal = 0;
                            $i=0;
                        @endphp

                    @foreach($table as $row)
                        @php
                            $singlePrice = $row->price;
                            $pqty = $row->qty;
                            $myunit = $row->unit;
                            $myproduct = $row->productID;
                            $total = ($singlePrice * $pqty);
                            $grandTotal += $total;
                            $i++;
                            @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td class="no-padding"><img src="{{asset('public/image/information/iseries/'.$row->product['imgName'])}}" style="height:42px; width:42px;" alt="Odonil Natural Air Freshner Lavender Meadows"></td>
                                <td>
                                    <h6 class="no-margin">{{$row->product['name']}}</h6>
                                    {{--<span class="text-muted">Foraigin Brand Home &amp; Cleaning, Air Fresheners</span>--}}
                                </td>
                                <td>{{money($row->price)}}</td>
                                <td>{{$row->qty}}/{{$row->unit}}</td>
                                <td class="text-right">{{money($total)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="panel-body">
                    <div class="row invoice-payment">
                        <div class="col-sm-6">

                        </div>

                        <div class="col-sm-6">
                            <div class="content-group">

                                <div class="row">
                                    @foreach($delivery as $rowt)
                                    <div class="col-xs-6"><h6 class="text-success"><strong class="text-success">Delivery Date: </strong>{{pub_date($rowt->ddate)}}</h6></div>
                                    <div class="col-xs-6"><h6 class="text-purple text-right"><strong class="text-purple">Delivery Time: </strong>{{remain_time($rowt->dtime)}}</h6></div>
                                    @endforeach
                                </div>
                                <div class="table-responsive no-border">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>Subtotal:</th>
                                            <td class="text-right">{{money($grandTotal)}}</td>
                                        </tr>
                                        <tr>
                                            <th>Delivery Charge:</th>
                                            <td class="text-right">tk 0.00</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td class="text-right"><h5 class="text-semibold text-teal">{{money($grandTotal)}}</h5></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <h6><i class="icon-pushpin"></i> Order Instructions</h6>
                    <p class="text-muted"></p>
                </div>

                <div class="row">
                    <div class="col-md-8 text-left">
                        <a href="{{action('DeliveryController@index')}}" class="btn btn-primary btn-labeled btn-xlg"><b><i class="icon-arrow-left15"></i></b> Back to</a>
                        <a href="{{action('PaymentController@printOrder')}}" class="btn bg-slate btn-labeled btn-xlg"><b><i class="icon-printer"></i></b> Print Order</a>
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{action('PaymentController@confirmOrder')}}" class="btn btn-success btn-labeled btn-xlg" onclick="return confirm('Are you sure to Confirm this order?')"><b><i class="icon-checkmark"></i></b> Confirm Order</a>
                        {{--</form>--}}
                            <a href="" class="btn btn-danger btn-labeled btn-xlg" onclick="return confirm('Are you sure to cancel this order?')"><b><i class="icon-cart-remove"></i></b> Cancel Order</a>
                    </div>
                </div>
            </div>
            <!--/Invoice Over view-->
        </div>
    </div>
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


