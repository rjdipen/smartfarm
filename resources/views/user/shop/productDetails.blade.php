@extends('layouts.index')
@section('title')
    Product
@endsection
@section('content')
    <div class="container-detached">
        <div class="content-detached">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-flat blog-horizontal blog-horizontal-2">
                        <div class="panel-body">
                            <div class="thumb">
                                <a href="#course_preview" data-toggle="modal">
                                    <img src="{{asset('public/image/information/iseries/'.$table->imgName)}}" class="img-responsive img-rounded" alt="">
                                </a>
                            </div>

                            <div class="blog-preview">
                                <div class="content-group-sm media blog-title stack-media-on-mobile text-left">
                                    <div class="media-body">
                                        <h5 class="text-semibold no-margin"><a href="#" class="text-default">{{$table->name}}</a></h5>

                                        <ul class="list-inline list-inline-separate no-margin text-muted">
                                            <li>by <a href="#">{{$table->user['name']}}</a></li>
                                        </ul>
                                        <ul class="list-inline list-inline-separate heading-text mt-5">
                                            <li>
                                                <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                @php
                                                    $totalRating = $table->ratingTotal($table->productID);
                                                    $totalUser = $table->totalUser($table->productID);
                                                    if ($totalRating > '0' ){
                                                        $grandRating = $totalRating/$totalUser;
                                                    }
                                                    else{
                                                     $grandRating = 0;
                                                    }
                                                @endphp
                                                <span class="text-muted position-right">({{$grandRating}})</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <h5 class="no-margin-bottom text-size-base">Quantity: {{$table->qty}}</h5>
                                    <h5 class="no-margin-bottom text-size-base">Price: {{$table->price}}/{{$table->unit}}</h5>
                                    <button type="button" class="btn bg-teal-400 text-right mt-15">
                                        <i class="icon-cart-add position-left"></i>
                                        Add to cart
                                    </button>
                                </div>
                                <h5>Description:</h5>
                                <p>{{str_limit($table->description, 200, '...')}}</p>
                            </div>
                        </div>
                        <div class="content-group border-top-lg border-top-teal-300">
                            <div class="page-header page-header-default" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                                <div class="breadcrumb-line">
                                    {{--<a class="sidebar-mobile-detached-toggle visible-xs-block text-right"><i class="icon-grid7"></i></a>--}}
                                    <ul class="breadcrumb">
                                        <li><a href="#"><i class="icon-home2 position-left"></i> Home</a></li>
                                        <li><a href="#">Product</a></li>
                                        <li><a href="#">Deatils</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="panel-footer panel-footer-condensed">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li class="active"><a href="#highlighted-justified-tab1" data-toggle="tab" aria-expanded="true">Review</a></li>
                                    <li class=""><a href="#highlighted-justified-tab2" data-toggle="tab" aria-expanded="false">Specification</a></li>
                                </ul>

                                <div class="tab-content p-10">
                                    <div class="tab-pane active" id="highlighted-justified-tab1">
                                        <div class="">
                                            <ul class="list-inline list-inline-separate heading-text mt-5">
                                                <li>
                                                    <strong class="pr-5">Rating:</strong>
                                                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                    @php
                                                        $totalRating = $table->ratingTotal($table->productID);
                                                        $totalUser = $table->totalUser($table->productID);
                                                        if ($totalRating > '0' ){
                                                            $grandRating = $totalRating/$totalUser;
                                                        }
                                                        else{
                                                         $grandRating = 0;
                                                        }
                                                    @endphp
                                                    <span class="text-muted position-right">({{$grandRating}})</span>
                                                </li>
                                            </ul>
                                            <div class=" panel panel-flat row">
                                                <form action="{{action('User\StoreController@review')}}" method="post" enctype="multipart/form-data" class="col-md-6 col-sm-12 mb-10">
                                                    {{csrf_field()}}
                                                    <input type="hidden"  name="productID" value="{{$table->productID}}">
                                                    <input id="input-2" name="rating" value="0" class="rating-loading"
                                                           required title="">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Comment</span>
                                                        <textarea class="form-control" name="comment" placeholder="give your review" type="text" required></textarea>
                                                    </div><br>
                                                    <button type="submit" class="btn bg-success-300 text-right">
                                                        <i class="icon-arrow-right6 position-left"></i>
                                                        Submit
                                                    </button>
                                                </form>
                                                <div class="col-md-6  mb-10"></div>
                                            </div>
                                            <div class="panel panel-flat mt-10">
                                                <div class="panel-heading border-bottom-green-300">
                                                    <h6 class="panel-title text-semiold">Reviews</h6>
                                                </div>
                                                <div class="divider"></div>
                                                <div class="panel-body">
                                                    @php
                                                        $d = 1;
                                                    @endphp

                                                    @foreach($preview as $rows)
                                                        <ul class="media-list stack-media-on-mobile">
                                                            <li class="media">
                                                                <div class="media-left">
                                                                    <a href="#"><img src="{{asset('public/image/information/iseries/'.$rows->user['imgName'])}}" class="img-circle img-sm" alt=""></a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <div class="media-heading">
                                                                        <a href="#" class="text-semibold">{{$rows->user['name']}}</a>
                                                                        <span class="media-annotation dotted">{{$rows->created_at->diffForHumans()}}</span>
                                                                        <ul style="list-style: none;" >
                                                                            <li>
                                                                                @for ($i = $d; $i <= $rows->rating; $i++)
                                                                                    <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                                                @endfor
                                                                                {{--<span class="text-muted position-right">{{$av_rating}}</span>--}}
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <p>{{$rows->comment}}</p>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="highlighted-justified-tab2">
                                        {{$table->description}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <link href="{{asset('public/css/star-rating.min.css')}}" rel="stylesheet" type="text/css">
@endsection



@section('script')
    <script type="text/javascript" src="{{asset('public/js/star-rating.min.js')}}"></script>

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


