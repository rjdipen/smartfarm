@extends('layouts.admin')
@section('title')
    Training Episode
@endsection
@section('content')
    <div class="row ">
        <div class="col-md-6 col-xs-6">
            <a class="btn bg-teal-400" href="{{action('Traning\TseriesController@index')}}" title="Details"><i class="icon-arrow-left16"></i> Back</a>
        </div>
        <div class="col-md-6 col-xs-6 text-right">
            <a class="btn bg-teal-400"  id="episodeClick"><i class="icon-pencil5"></i> Create New Episode</a>
        </div>
    </div>
<!--this is for create-->
    <div class="row mt-10 createEpisode" style="display: none;">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <form action="{{action('Traning\TitemsController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden"  name="tserieID" value="{{$table->tserieID}}">

                    <div class="panel-body">
                        <h6 class="no-margin-top content-group">Add New Episode</h6>
                        <div class="input-group">
                            <span class="input-group-addon">Title</span>
                            <input class="form-control" name="title" placeholder="Series Name" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Upload Thumb</span>
                            <input type="file" name="imgName" class="file-input-extensions form-control " data-browse-class="btn btn-primary" data-remove-class="btn btn-default" accept="image/*">
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Upload Video</span>
                            <input type="file" name="videoName" class="file-input-extensions2 form-control " data-browse-class="btn btn-primary" data-remove-class="btn btn-default" accept="video/*">
                        </div><br>

                        <div class="content-group">
                            <h6 class="no-margin-top content-group">Description:</h6>
                            <textarea class="form-control" name="description" placeholder="Episode description.." type="text" required></textarea>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="icon-plus22"></i> Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row mt-10">
        <div class="col-md-12 col-sm-12">

                <div class="panel panel-heading text-center">
                    <div class="content-group text-center">
                        <a href="#" class="display-inline-block">
                            <img src="{{asset('public/image/information/iseries/'.$table->imgName)}}" class="img-responsive" alt="">
                        </a>
                    </div>
                    <h6 class="panel-title font-weight-bold "><strong>{{$table->title}}</strong></h6>
                </div>
            @php
                $i=0;
            @endphp
            @foreach($episode as $rows)
                @php
                    $i++;
                @endphp
            <div class="content-detached">
                <div class="panel panel-flat blog-horizontal blog-horizontal-2">
                    <div class="panel-body">
                        <div class="thumb" >
                            <a class="ediBtn" href="#course_preview{{$rows->titemID}}"
                               data-id="{{$rows->titemID}}"
                               data-tserieid="{{$rows->tserieID}}"
                               data-title="{{$rows->title}}"
                               data-img="{{asset('public/image/information/iseries/'.$rows->imgName)}}"
                               data-video="{{asset('public/video/episode/'.$rows->videoName)}}"
                               data-toggle="modal">
                                <img src="{{asset('public/image/information/iseries/'.$rows->imgName)}}" class="img-responsive img-rounded" alt="">
                                <span class="zoom-image"><i class="icon-play3"></i></span>
                            </a>
                        </div>

                        <div class="blog-preview">
                            <h5 class="blog-title text-semibold">
                                <a href="#">Episode:<span class="pr-10">{{$i}}</span> {{$rows->title}}</a>
                            </h5>
                            <p>{{$rows->description}}</p>
                        </div>

                    </div>

                    <div class="panel-footer panel-footer-condensed">
                        <div class="pl-20">
                            <ul class="list-inline list-inline-separate heading-text text-muted p-10">
                                <li>{{$rows->created_at->diffForHumans()}}</li>
                                <li class="replyClick pull-right" data-reid="{{$rows->titemID}}">
                                    <a class="btn btn-xs bg-success-400 "  href="#"><span class="label "><i class="icon-pencil5"></i>  Edit</span></a>
                                </li>
                                <li class="pull-right mr-20">
                                    <a class="btn btn-xs bg-danger-400 "  href="{{action('Traning\TitemsController@del', ['id' => $rows->titemID])}}" onclick="alert('Are you sure To Delete')" title="Delete"><span class="label "><i class="icon-bin"></i>  Delete</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

                <!-- Edit episode -->
                <div class="row mt-10" id="re{{$rows->titemID}}" style="display: none;">
                    <div class="col-md-12">
                        <div class="panel panel-flat">
                            <form action="{{action('Traning\TitemsController@edit')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden"  name="tserieID" value="{{$table->tserieID}}">
                                <input type="hidden"  name="id" value="{{$rows->titemID}}">

                                <div class="panel-body">
                                    <h6 class="no-margin-top content-group">Edit {{$rows->title}}</h6>
                                    <div class="input-group">
                                        <span class="input-group-addon">Title</span>
                                        <input class="form-control" name="title" placeholder="Series Name" type="text" value="{{$rows->title}}" required>
                                    </div><br>

                                    <div class="input-group">
                                        <span class="input-group-addon">Upload Thumb</span>
                                        <input type="file" name="imgName" class="file-input-extensions form-control " value="{{$rows->imgName}}" data-browse-class="btn btn-primary" data-remove-class="btn btn-default" accept="image/*">
                                    </div><br>

                                    <div class="input-group">
                                        <span class="input-group-addon">Upload Video</span>
                                        <input type="file" name="videoName" class="file-input-extensions2 form-control " data-browse-class="btn btn-primary" data-remove-class="btn btn-default" accept="video/*">
                                    </div><br>

                                    <div class="content-group">
                                        <h6 class="no-margin-top content-group">Description:</h6>
                                        <textarea class="form-control" name="description" placeholder="Episode description.." type="text" required>{{$rows->description}}</textarea>
                                    </div>

                                    <div class="text-right">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save change</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit episode -->

                <!-- Course preview modal -->
                <div class="modal fade" id="course_preview{{$rows->titemID}}" tabindex="-1">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h6 class="modal-title">{{$rows->title}}</h6>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" id="ediID" name="id">
                                <input type="hidden" id="ediID2" name="tserieid">

                            <div class="modal-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                <video class="embed-responsive-item" width="500" controls>
                                    <source src="{{asset('public/video/episode/'.$rows->videoName)}}" type="video/mp4">
                                </video>
                                </div>
                            </div>
                            </form>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /course preview modal -->
            @endforeach
        </div>
    </div>



@endsection


@section('script')

    {{--<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/pages/uploader_bootstrap.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            //this is for create
            $('#episodeClick').click(function() {
                $('.createEpisode').toggle("slide");
            });

            //this is for edit

            // $('#editClick').click(function() {
            //     $('.editEpisode').toggle("slide");
            //     // alert('dkjkehu');
            // });

            $('.replyClick').click(function() {
                var reid = $(this).data('reid');

                //alert(reid);

                $('#re'+reid).toggle("slide");
            });
        });




        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var tserieid = $(this).data('tserieid');
                var title = $(this).data('title');
                var img = $(this).data('img');
                var video = $(this).data('video');

                $('#ediID').val(id);
                $('#ediID2').val(tserieid);
                $('#ediModal [name=title]').val(title);
                $('#ediModal img').attr('src',img);
                $('#ediModal source').attr('src',video);

            });
        });

        $(function () {
            $("#inputFile").change(function () {
                imgPrev(this , '.preview');
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


        //this is for video


    </script>

@endsection


