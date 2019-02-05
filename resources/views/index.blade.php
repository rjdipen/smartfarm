@extends('layouts.index')
@section('style')
    <link href="{{asset('public/assets/css/tcf-slider.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="bs-example">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Carousel indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
            </ol>
            <!-- Wrapper for carousel items -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{asset('public/image/caresoul/dipen.jpg')}}" alt="First Slide">
                </div>
                <div class="item">
                    <img src="{{asset('public/image/caresoul/dipen1.jpg')}}" alt="Second Slide">
                </div>
                <div class="item">
                    <img src="{{asset('public/image/caresoul/dipen2.jpg')}}" alt="Third Slide">
                </div>
                <div class="item">
                    <img src="{{asset('public/image/caresoul/dipen3.jpg')}}" alt="Fourth Slide">
                </div>

            </div>
            <!-- Carousel controls -->
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

    <div class="row mt-20 mb-20">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading text-center bg-teal-400 " style="border-radius: 0px; padding: 10px 20px;">
                    <h5 class="panel-title text-uppercase text-semibold">featured services</h5>
                </div>

                <div class="panel-body no-padding-bottom">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 animated fadeInLeft">
                            <a href="">
                                <div class="panel my-panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object bg-teal-400 text-success"><i class="icon-clipboard3 text-white"></i></div>
                                        <h5 class="text-semibold">Information</h5>
                                        <p class="mb-15">Ouch found swore much dear conductively hid submissively hatchet vexed far
                                            Ouch found swore much dear conductively hid submissively hatchet vexed far
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-3 animated fadeInDown">
                            <a href="">
                                <div class="panel my-panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object bg-teal-400 text-success"><i class=" icon-hammer-wrench text-white"></i></div>
                                        <h5 class="text-semibold">Training</h5>
                                        <p class="mb-15">Ouch found swore much dear conductively hid submissively hatchet vexed far
                                            Ouch found swore much dear conductively hid submissively hatchet vexed far
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-3 animated fadeInUp">
                            <a href="">
                                <div class="panel my-panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object bg-teal-400 text-success"><i class=" icon-bag text-white"></i></div>
                                        <h5 class="text-semibold">Shop</h5>
                                        <p class="mb-15">Ouch found swore much dear conductively hid submissively hatchet vexed far
                                            Ouch found swore much dear conductively hid submissively hatchet vexed far
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-3 animated fadeInRight">
                            <a href="">
                                <div class="panel my-panel">
                                    <div class="panel-body text-center">
                                        <div class="icon-object bg-teal-400 text-success"><i class="icon-history text-white"></i></div>
                                        <h5 class="text-semibold">Emergency Service</h5>
                                        <p class="mb-15">Ouch found swore much dear conductively hid submissively hatchet vexed far
                                            Ouch found swore much dear conductively hid submissively hatchet vexed far
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--THIS IS FOR success-->
    <div class="row mt-20 mb-20">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading text-center bg-teal-400 " style="border-radius: 0px; padding: 10px 20px;">
                    <h5 class="panel-title text-uppercase text-semibold">statistics success</h5>
                </div>

                <div class="panel-body animated fadeInDown">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 ">
                            <!-- Invitation stats white -->
                            <div class="panel text-center my-panel">
                                <div class="panel-body">
                                    <div class="svg-center position-relative mb-5" id="progress_percentage_one"></div>
                                    <h6 class="text-bold no-margin-bottom mt-10 text-uppercase">Information</h6>
                                </div>
                            </div>
                            <!-- /invitation stats white -->
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <!-- Invitation stats white -->
                            <div class="panel text-center my-panel">
                                <div class="panel-body">
                                    <div class="svg-center position-relative mb-5" id="progress_percentage_two"></div>
                                    <h6 class="text-bold no-margin-bottom mt-10 text-uppercase">User</h6>
                                </div>
                            </div>
                            <!-- /invitation stats white -->
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <!-- Invitation stats white -->
                            <div class="panel text-center my-panel">
                                <div class="panel-body">
                                    <div class="svg-center position-relative mb-5" id="progress_percentage_three"></div>
                                    <h6 class="text-bold no-margin-bottom mt-10 text-uppercase">watch series</h6>
                                </div>
                            </div>
                            <!-- /invitation stats white -->
                        </div>

                        <div class="col-md-3 col-sm-3">
                            <!-- Invitation stats white -->
                            <div class="panel text-center my-panel">
                                <div class="panel-body">
                                    <div class="svg-center position-relative mb-5" id="progress_percentage_four"></div>
                                    <h6 class="text-bold no-margin-bottom mt-10 text-uppercase">sale product</h6>
                                </div>
                            </div>
                            <!-- /invitation stats white -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--THIS IS FOR another-->
    <div class="row mt-20 mb-20">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body no-padding-bottom">
                    <div class="tabbable">
                        <ul class="nav nav-tabs text-center mb-10">
                            <li class="text-uppercase"><a href="#colored-justified-tab1" data-toggle="tab" aria-expanded="false">Information</a></li>
                            <li class="active text-uppercase"><a href="#colored-justified-tab2" data-toggle="tab" aria-expanded="true">Training</a></li>
                            <li class="text-uppercase">
                                <a href="#colored-justified-tab3" data-toggle="tab" aria-expanded="true">Shop</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane" id="colored-justified-tab1">
                                <div class="panel-heading text-center " style="border-radius: 0px; padding: 5px 20px 10px 20px;">
                                    <p class="panel-title  text-capitalize text-muted">Know Everything About Agriculture Farming</p>
                                </div>
                                <div class="row" id="informationindex">
                                    <!--information series-->
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <a href="{{action('User\InformationController@index')}}" class="btn bg-teal-600">View All <i class="icon-arrow-right14 position-left"></i></a>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane active " id="colored-justified-tab2">
                                <div class="panel-heading text-center " style="border-radius: 0px; padding: 5px 20px 10px 20px;">
                                    <p class="panel-title  text-capitalize text-muted">Watch 1000 of Video Training Series </p>
                                </div>
                                <div class="row" id="training">
                                    <!---THIS IS FOR TRAINING-->
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <a href="{{action('User\TrainingController@index')}}" class="btn bg-teal-600">View All <i class="icon-arrow-right14 position-left"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane " id="colored-justified-tab3">
                                <div class="panel-heading text-center " style="border-radius: 0px; padding: 5px 20px 10px 20px;">
                                    <p class="panel-title  text-capitalize text-muted">Find Anything What you Need To Buy </p>
                                </div>
                                <div class="row" id="product">
                                    <!THIS IS FOR SHOP-->
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <a href="{{action('User\StoreController@index')}}" class="btn bg-teal-600">View All <i class="icon-arrow-right14 position-left"></i></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--THIS IS FOR BLOG-->
    <div class="row mt-20 mb-20">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading text-center bg-teal-400 " style="border-radius: 0px; padding: 10px 20px;">
                    <h5 class="panel-title text-uppercase text-semibold">Blog</h5>
                </div>
                <div class="panel-body no-padding-bottom">
                    <h6 class="text-size-large text-center text-semibold no-margin-top">Share Your Experience With Other</h6>
                    <div class="row" id="indexblog">

                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <a href="{{action('User\BlogController@index')}}" class="btn bg-teal-600">View All <i class="icon-arrow-right14 position-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{asset('public/assets/custom.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/charts/echarts/timeline_option.js')}}"></script>

    <script type="text/javascript">
        $(function () {
            // Initialize charts
            progressPercentage('#progress_percentage_one', 46, 3, "#eee", "#29B6F6", 0.69);
            progressPercentage('#progress_percentage_two', 46, 3, "#eee", "#EF5350", 0.72);
            progressPercentage('#progress_percentage_three', 46, 3, "#eee", "#26A69A", 0.56);
            progressPercentage('#progress_percentage_four', 46, 3, "#eee", "#7E57C2", 0.83);

            // Chart setup
            function progressPercentage(element, radius, border, backgroundColor, foregroundColor, end) {


                // Basic setup
                // ------------------------------

                // Main variables
                var d3Container = d3.select(element),
                    startPercent = 0,
                    fontSize = 22,
                    endPercent = end,
                    twoPi = Math.PI * 2,
                    formatPercent = d3.format('.0%'),
                    boxSize = radius * 2;

                // Values count
                var count = Math.abs((endPercent - startPercent) / 0.01);

                // Values step
                var step = endPercent < startPercent ? -0.01 : 0.01;


                // Create chart
                // ------------------------------

                // Add SVG element
                var container = d3Container.append('svg');

                // Add SVG group
                var svg = container
                    .attr('width', boxSize)
                    .attr('height', boxSize)
                    .append('g')
                    .attr('transform', 'translate(' + radius + ',' + radius + ')');


                // Construct chart layout
                // ------------------------------

                // Arc
                var arc = d3.svg.arc()
                    .startAngle(0)
                    .innerRadius(radius)
                    .outerRadius(radius - border)
                    .cornerRadius(20);


                //
                // Append chart elements
                //

                // Paths
                // ------------------------------

                // Background path
                svg.append('path')
                    .attr('class', 'd3-progress-background')
                    .attr('d', arc.endAngle(twoPi))
                    .style('fill', backgroundColor);

                // Foreground path
                var foreground = svg.append('path')
                    .attr('class', 'd3-progress-foreground')
                    .attr('filter', 'url(#blur)')
                    .style({
                        'fill': foregroundColor,
                        'stroke': foregroundColor
                    });

                // Front path
                var front = svg.append('path')
                    .attr('class', 'd3-progress-front')
                    .style({
                        'fill': foregroundColor,
                        'fill-opacity': 1
                    });


                // Text
                // ------------------------------

                // Percentage text value
                var numberText = svg
                    .append('text')
                    .attr('dx', 0)
                    .attr('dy', (fontSize / 2) - border)
                    .style({
                        'font-size': fontSize + 'px',
                        'line-height': 1,
                        'fill': foregroundColor,
                        'text-anchor': 'middle'
                    });


                // Animation
                // ------------------------------

                // Animate path
                function updateProgress(progress) {
                    foreground.attr('d', arc.endAngle(twoPi * progress));
                    front.attr('d', arc.endAngle(twoPi * progress));
                    numberText.text(formatPercent(progress));
                }

                // Animate text
                var progress = startPercent;
                (function loops() {
                    updateProgress(progress);
                    if (count > 0) {
                        count--;
                        progress += step;
                        setTimeout(loops, 10);
                    }
                })();
            }
        })

        //this is for blog
        $(function () {
            contents("{{action('User\BlogController@allBlogIndex')}}");
        });

        function contents(url) {
            $.get(url, function(result){
                var show_data = '';
                $.each(result, function( i, row ) {
                    show_data += '<div class="col-md-3  ">\n' +
                        '                        <div class="panel panel-flat my-panel">\n' +
                        '                            <div class="panel-body">\n' +
                        '                                <div class="thumb content-group">\n' +
                        '                                    <img src="public/image/information/iseries/'+row.imgName+'" value="'+row.blogID+'" alt="" class="img-responsive">\n' +
                        '                                    <div class="caption-overflow">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t<span>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t<a href="{{action('User\BlogController@blogDetails')}}?id='+row.blogID+'" class="btn btn-flat border-white text-white btn-rounded btn-icon"><i class="icon-arrow-right8"></i></a>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t</span>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '\n' +
                        '                                <h5 class="text-semibold mb-5">\n' +
                        '                                    <a href="{{action('User\BlogController@blogDetails')}}?id='+row.blogID+'" class="text-default" value="'+row.blogID+'">'+row.title+'</a>\n' +
                        '                                </h5>\n' +
                        '\n' +
                        '                                <ul class="list-inline list-inline-separate text-muted content-group">\n' +
                        '                                    <li>By <a href="#" class="text-muted" value="'+row.blogID+'">'+row.userID+'</a></li>\n' +
                        '                                    <li value="'+row.blogID+'">'+row.created_at+'</li>\n' +
                        '                                </ul>\n' +
                        '\n' +
                        '                                <p value="'+row.blogID+'">'+row.description.substr(0, 200)+'...'+'</p>' +
                        '                            </div>\n' +
                        '\n' +
                        '                            <div class="panel-footer panel-footer-condensed">\n' +
                        '                                <div class="heading-elements not-collapsible">\n' +
                        '                                    <ul class="list-inline list-inline-separate heading-text text-muted">\n' +
                        '                                        <li><a href="#" class="text-muted" value="'+row.blogID+'"><i class=" icon-bubbles9 text-size-base text-grey position-left"></i> '+row.totalCmd+'</a></li>\n' +
                        '                                    </ul>\n' +
                        '\n' +
                        '                                    <a href="{{action('User\BlogController@blogDetails')}}?id='+row.blogID+'" value="'+row.blogID+'" class="heading-text pull-right">Read more <i class="icon-arrow-right14 position-right"></i></a>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>'
                });

                $('#indexblog').html(show_data);
            });
        }

        {{--//END BLOG--}}
        //START INFORMATION
        $(function () {
            information("{{action('User\InformationController@indexInformation')}}");
        });

        function information(url) {
            $.get(url, function(result){
                var show_data = '';
                $.each(result, function( i, row ) {
                    show_data += '<div class="col-md-6">' +
                    '    <div class="panel my-panel panel-flat blog-horizontal blog-horizontal-2 mb-10">\n' +
                    '                        <div class="panel-body">\n' +
                    '                            <div class="row">\n' +
                    '                                <div class="col-md-3 pb-10">\n' +
                    '                                    <img src="public/image/information/iseries/'+row.imgName+'" value="'+row.iserieID+'" alt="" class="img-responsive">\n' +
                    '                                </div>\n' +
                    '\n' +
                    '                                <div class="col-md-9">\n' +
                    '                                    <div class="blog-preview">\n' +
                    '                                        <h5 class="blog-title text-semibold mb-10">\n' +
                    '                                            <a href="{{action('User\InformationController@informationDetails')}}?id='+row.iserieID+'" value="'+row.iserieID+'">'+row.name+'</a>\n' +
                    '                                        </h5>\n' +
                    '\n' +
                    '                                        <p value="'+row.iserieID+'">'+row.description.substr(0, 200)+'...'+'</p>\n' +
                    '\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                            </div>\n' +
                    '\n' +
                    '                        </div>\n' +
                    '\n' +
                    '                        <div class="panel-footer">\n' +
                    '                            <ul class="list-inline list-inline-separate heading-text text-muted pl-10 pr-10" style="margin-bottom: 0px;">\n' +
                    '                                <li  value="'+row.iserieID+'"><i class="icon-calendar2 pr-10"></i>'+row.created_at+'</li>\n' +
                    '                                <li class="pull-right"><a href="{{action('User\InformationController@informationDetails')}}?id='+row.iserieID+'" class="heading-text ">Read more <i class="icon-arrow-right14 position-right"></i></a></li>\n' +
                    '                            </ul>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                        '</div>'
                });

                $('#informationindex').html(show_data);
            });
        }
        //END INFORMATION

        //START TRAINING
        $(function () {
            training("{{action('User\TrainingController@allindexTseries')}}");
        });

        function training(url) {
            $.get(url, function(result){
                var show_data = '';
                $.each(result, function( i, row ) {
                    show_data += '<div class="col-md-6">' +
                        '<div class="panel my-panel panel-flat blog-horizontal blog-horizontal-2 mb-10">\n' +
                        '                        <div class="panel-body">\n' +
                        '                            <div class="row">\n' +
                        '                                <div class="col-md-3 pb-10">\n' +
                        '                                    <img src="public/image/information/iseries/'+row.imgName+'" value="'+row.tserieID+'" alt="" class="img-responsive">\n' +
                        '                                </div>\n' +
                        '\n' +
                        '                                <div class="col-md-9">\n' +
                        '                                    <div class="blog-preview">\n' +
                        '                                        <h5 class="blog-title text-semibold mb-10">\n' +
                        '                                            <a href="{{action('User\TrainingController@trainingDetails')}}?id='+row.tserieID+'" value="'+row.tserieID+'">'+row.title+'</a>\n' +
                        '                                        </h5>\n' +
                        '\n' +
                        '                                        <p value="'+row.tserieID+'">'+row.description+'</p>\n' +
                        '\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '\n' +
                        '                        </div>\n' +
                        '\n' +
                        '                        <div class="panel-footer">\n' +
                        '                            <ul class="list-inline list-inline-separate heading-text text-muted pl-10 pr-10" style="margin-bottom: 0px;">\n' +
                        '                                <li  value="'+row.tserieID+'"><i class="icon-user pr-10"></i>'+row.authorName+'</li>\n' +
                        '                                <li  value="'+row.tserieID+'"><i class="con-calendar pr-10"></i>'+row.created_at+'</li>\n' +
                        '                                <li class="pull-right"><a href="{{action('User\TrainingController@trainingDetails')}}?id='+row.tserieID+'" class="heading-text ">Explore <i class="icon-arrow-right14 position-right"></i></a></li>\n' +
                        '                            </ul>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '</div>'
                });

                $('#training').html(show_data);
            });
        }

        //END TRAINING


        //START SHOP

        $(function () {
            product("{{action('User\StoreController@indexproduct')}}");
        });



        function product(url) {
            $.get(url, function (result) {
                var show_data = '';
                $.each(result, function (i, row) {
                    show_data += '<div class="col-md-3 col-sm-4">\n' +
                        '                            <div class="panel my-panel">\n' +
                        '                                <div class="panel-body p-15">\n' +
                        '                                       <div class="thumb">\n' +
                        '                                        <img src="public/image/information/iseries/' + row.imgName + '" value="' + row.productID + '" alt="">\n' +
                        '                                       <div class="caption-overflow">\n' +
                        '                                        <span>\n' +
                        '                                       <a href="{{action('User\StoreController@product_details')}}?id=' + row.productID + '" value="' + row.productID + '" data-popup="lightbox" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>\n' +

                        '                                    </span>\n' +
                        '                                    </div>\n' +
                        '                                   </div>\n' +
                        '                                </div>\n' +
                        '\n' +
                        '                                <div class="panel-body panel-body-accent text-center p-15">\n' +
                        '                                    <h6 class="text-semibold no-margin"><a href="#" class="text-default" value="' + row.productID + '">' + row.name + '</a></h6>\n' +
                        '                                    <ul class="list-inline list-inline-separate mb-10">\n' +
                        '                                        <li><a href="#" class="text-muted">Men\'s Accessories</a></li>\n' +
                        '                                    </ul>\n' +
                        '                                    <h5 class="no-margin text-semibold" value="' + row.productID + '">' + row.price + 'TK/' + row.unit + '</h5>\n' +

                        '                                </div>\n' +
                        '                                <div class="panel-footer text-center">\n' +
                        '                                    <button type="button" class="btn btn-primary addTocard" data-unit="' + row.unit + '"  data-price="' + row.price + '" data-id="' + row.productID + '"><b><i class="icon-cart-add2"></i></b> ADD</button>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>';
                });

                $('#product').html(show_data);

            });
        }
        //END SHOP
    </script>
@endsection
