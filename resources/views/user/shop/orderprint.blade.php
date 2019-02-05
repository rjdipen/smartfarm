@extends('layouts.index')
@section('title')
    order Print
@endsection
@section('content')
    <div class="container-detached">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <!-- invoice template -->
                <div class="panel panel-white">
                    <div class="panel-heading hidden-print">
                        <h6 class="panel-title">Order History</h6>
                        <div class="heading-elements">
                            <button type="button" class="btn bg-teal-400 btn-xs heading-btn" onclick="history.go(-1)"><i class="icon-arrow-left16 position-left"></i> Go Back</button>
                            <button type="button" class="btn bg-slate-400 btn-xs heading-btn" onclick="window.print()"><i class="icon-printer position-left"></i> Print</button>
                        </div>
                    </div>
                    <div class="panel-body no-padding-bottom">
                        <div class="row">
                            <div class="col-sm-6 content-group">
                                <ul class="list-condensed list-unstyled">
                                    <li><strong class="text-uppercase">Smartfarm</strong></li>
                                    <li>Somrat Tower, Subhanighat, Sylhet, 3100.</li>
                                    <li>+8801747270531, <span class="text-italic">info@smartfarm.live</span></li>
                                    <li class="text-italic text-blue">www.smartfarm.live</li>
                                </ul>
                            </div>

                            <div class="col-sm-6 content-group">
                                <div class="invoice-details">
                                    <span class="text-muted">Order From:</span>

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
                                    <h5 class="text-uppercase text-semibold">Order #00002</h5>
                                    <ul class="list-condensed list-unstyled">
                                        @foreach($delivery as $rowd)
                                            <li>Date: <span class="text-semibold">{{pub_date($rowd->created_at)}}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-lg table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="hidden-print no-padding"></th>
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
                        </table>
                    </div>

                    <div class="panel-body">
                        <div class="row invoice-payment">

                            <div class="col-md-8 col-md-offset-2 pull-right">
                                <div class="content-group">

                                    <div class="row">
                                        @foreach($delivery as $rowt)
                                            <div class="col-xs-6"><h6 class="text-success"><strong class="text-success">Delivery Date: </strong>{{pub_date($rowt->ddate)}}</h6></div>
                                            <div class="col-xs-6"><h6 class="text-purple text-right"><strong class="text-purple">Delivery Time: </strong>{{remain_time($rowt->dtime)}}</h6></div>
                                        @endforeach
                                        <!--<div class="col-xs-6"><h6 class="text-success"><strong class="text-success">Paid: </strong></h6></div>
                                        <div class="col-xs-6"><h6 class="text-purple text-right"><strong class="text-purple">Due: </strong></h6></div>-->
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
                                            <tr>
                                                <td colspan="2" class="text-center text-brown">[ <strong>In word:</strong>  {{in_word($grandTotal)}} ]</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6>Other information</h6>
                        <p class="text-muted">Thank you for using choosing us. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    </div>
                </div>
                <!-- /invoice template -->
            </div>
        </div>

    </div>
@endsection




@section('script')

    <script type="text/javascript">


        $(document).on('ready', function(){
            $('#input-2').rating({
                step: 1,
                starCaptions: {1: 'Very Bad', 2: 'Bad', 3: 'Ok', 4: 'Good', 5: 'Very Good'},
                starCaptionClasses: {1: 'text-danger', 2: 'text-warning', 3: 'text-info', 4: 'text-primary', 5: 'text-success'}
            });

        });

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


