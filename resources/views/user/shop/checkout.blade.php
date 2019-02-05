@extends('layouts.index')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="container-detached">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 ">
                <div class="breadcrumb-line breadcrumb-line-component ">
                    <ul class="breadcrumb">
                        <li><a href=""><i class="icon-home2 position-left"></i>Home</a></li>
                        <li><a href="">Product</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>

                <div class="panel panel-flat border-top-teal  mt-20">
                    <div class="page-header bg-teal-400">
                        <div class="page-header-content">
                            <div class="page-title" style="padding: 13px 35px;">
                                <h4 class="text-center">Checkout</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <!--Product Grid-->
                            <div class="col-xs-12 grid-container product_loader">

                                <form method="POST" action="{{action('DeliveryController@save')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="icon-pin-alt"></i> Delivery Address:</label>
                                                <textarea rows="3" cols="5" name="address" class="form-control" placeholder="Enter Delivery Address Here ...">Main Highway Otaki; 32 Wilson Street</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label><i class="icon-pushpin"></i> Order Instructions:</label>
                                                <textarea rows="3" cols="5" name="instruction" class="form-control" placeholder="Example: Before delivery please call me first."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><i class="icon-calendar"></i> Select Delivery Date:</label>
                                                <input  name="ddate" class="form-control pickadate" placeholder="Pick your delivery date">
                                            </div>

                                            <div class="form-group">
                                                <label><i class="icon-watch2"></i> Preferred Delivery Time:</label>
                                                <select name="dtime" class="form-control">
                                                    <option value="08:00:00">08:00 am - 09:00 am</option>
                                                    <option value="09:00:00">09:00 am - 10:00 am</option>
                                                    <option value="10:00:00">10:00 am - 11:00 am</option>
                                                    <option value="11:00:00">11:00 am - 12:00 pm</option>
                                                    <option value="12:00:00">12:00 pm - 01:00 pm</option>
                                                    <option value="13:00:00">01:00 pm - 02:00 pm</option>
                                                    <option value="14:00:00">02:00 pm - 03:00 pm</option>
                                                    <option value="15:00:00">03:00 pm - 04:00 pm</option>
                                                    <option value="16:00:00">04:00 pm - 05:00 pm</option>
                                                    <option value="17:00:00">05:00 pm - 06:00 pm</option>
                                                    <option value="18:00:00">06:00 pm - 07:00 pm</option>
                                                    <option value="19:00:00">07:00 pm - 08:00 pm</option>
                                                    <option value="20:00:00">08:00 pm - 09:00 pm</option>
                                                </select>
                                            </div>

                                            <p><i class="icon-info22"></i> Delivery Charge <strong class="text-success text-black">FREE !!</strong></p>
                                            <input type="hidden" name="deliveryCharge" value="0">

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-labeled btn-xlg"><b><i class="icon-arrow-right15"></i></b> Continue</button>
                                            </div>

                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>
                        <!--/Product Grid-->

                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/pickers/pickadate/picker.date.js')}}"></script>

    <script type="text/javascript">

        $(function () {
            // Basic options
            $('.pickadate').pickadate();
            // $('.date_rang_pick').daterangepicker({
            //     opens:'right',
            //     locale: {
            //         format: 'DD/MM/YYYY'
            //     }
            // });

        });

    </script>

@endsection


