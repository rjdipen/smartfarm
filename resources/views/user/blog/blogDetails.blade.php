@extends('layouts.index')
@extends('user.blog.box.commentEditBox')
@section('title')
    Blog Details
@endsection
@section('content')
    <div class="visible-xs-block my-sidebar position-absolute">
        <a class="sidebar-mobile-detached-toggle"><i class="icon-grid7"></i></a>
    </div>
    <div class="container-detached mb-20">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="content-group border-top-lg border-top-teal-300">
                    <div class="page-header page-header-default" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                        <div class="breadcrumb-line">
                            {{--<a class="sidebar-mobile-detached-toggle visible-xs-block text-right"><i class="icon-grid7"></i></a>--}}
                            <ul class="breadcrumb">
                                <li><a href="{{action('HomeController@index')}}"><i class="icon-home2 position-left"></i> Home</a></li>
                                <li><a href="{{action('User\BlogController@index')}}">Blog</a></li>
                                <li><a href="">Details</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="content-detached">


                    <!-- Post -->
                    <div class="panel">
                        <div class="panel-body">
                            <div class="content-group-lg">
                                <div class="content-group text-center">
                                    <a href="#" class="display-inline-block">
                                        <img src="{{asset('public/image/information/iseries/'.$table->imgName)}}" class="img-responsive" alt="">
                                    </a>
                                </div>

                                <h3 class="text-semibold mb-5">
                                    <a href="#" class="text-default">{{$table->title}}</a>
                                </h3>

                                <ul class="list-inline list-inline-separate text-muted content-group">
                                    <li>By <a href="#" class="text-muted">{{$table->user['name']}}</a></li>
                                    <li>{{$table->created_at->diffForHumans()}}</li>
                                    <li><a href="#" class="text-muted">{{$table->totalCmd($table->blogID)}} comments</a></li>
                                </ul>

                                <div class="content-group">
                                    <p>{!!$table->description!!}</p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /post -->

                    <!-- Comments -->
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title text-semiold">Discussion<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                            <div class="heading-elements">
                                <ul class="list-inline list-inline-separate heading-text text-muted">
                                    <li>{{$table->totalCmd($table->blogID)}} comments</li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body">
                            <ul class="media-list ">
                                @foreach($bcomment as $bcomments)
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="#"><img src="{{asset('public/image/information/iseries/'.$bcomments->user['imgName'])}}" class="img-circle img-sm" alt=""></a>
                                        </div>

                                        <div class="media-body">
                                            <div class="media-heading">
                                                <a href="#" class="text-semibold">{{$bcomments->user['name']}}</a>
                                                <span class="media-annotation dotted">{{$bcomments->created_at->diffForHumans()}}</span>
                                            </div>

                                            <p>{!!$bcomments->comment!!}</p>

                                            <ul class="list-inline list-inline-separate text-size-small">
                                                <li>{{$bcomments->totalReply($bcomments->bcommentID)}} <a href="#"><i class="icon-arrow-up22 text-success"></i></a><a href="#"><i class="icon-arrow-down22 text-danger"></i></a></li>
                                                <li class="replyClick" data-reid="{{$bcomments->bcommentID}}"><button class="btn btn-xs bg-info-400 btn-flat ediBtn1" style="padding: 2px 8px;"  >Reply</button></li>

                                                @if($bcomments->user['name'] == Auth::user()->name )
                                                    <li><button class="btn btn-xs bg-teal-300 btn-flat ediBtn" style="padding: 2px 13px;"
                                                                data-id="{{$bcomments->bcommentID}}"
                                                                data-comment="{{strip_tags($bcomments->comment)}}"
                                                                data-blog="{{$table->blogID}}"
                                                                data-toggle="modal" data-target="#ediModal" title="Edit"  >Edit</button></li>
                                                    <li>
                                                        <a class="btn btn-xs bg-danger-300 btn-flat" style="padding: 2px 8px;" href="{{action('User\BlogController@blogCmdDel', ['id' => $bcomments->bcommentID])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete">Delete</a>
                                                    </li>
                                                @else

                                                @endif
                                            </ul>

                                            <!-- THIS IS FOR REPLY-->
                                            <div class="row mt-10 reply" id="re{{$bcomments->bcommentID}}" style="display: none;">
                                                <div class="panel panel-flat col-md-6 no-padding" >
                                                    <form action="{{action('User\BlogController@blogReply')}}" method="post" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <input type="hidden"  name="bcommentID" value="{{$bcomments->bcommentID}}">

                                                        <div class="panel-body p-10">
                                                            <p class="no-margin-top mb-10 pl-20 content-group text-semibold">Reply</p>

                                                            <div class="form-group mb-10">
                                                                <textarea class="form-control" name="replyCmd" type="text" required> </textarea>
                                                            </div>
                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary" style="padding:2px 8px;"><i class="icon-plus22"></i> Reply</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-6"></div>
                                            </div>

                                            @php
                                                $myreply = $bcomments->breply()->get();
                                            @endphp
                                            @if($myreply != null)
                                                @foreach($myreply as $myreplys)
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <a href="#"><img src="{{asset('public/image/information/iseries/'.$myreplys->user['imgName'])}}" class="img-circle img-sm" alt=""></a>
                                                        </div>

                                                        <div class="media-body">
                                                            <div class="media-heading">
                                                                <a href="#" class="text-semibold">{{$myreplys->user['name']}}</a>
                                                                <span class="media-annotation dotted">{{$myreplys->created_at->diffForHumans()}}</span>
                                                            </div>

                                                            <p>{{$myreplys->replyCmd}}</p>

                                                            <ul class="list-inline list-inline-separate text-size-small">
                                                                @if($myreplys->user['name'] == Auth::user()->name )
                                                                    <li><button class="btn btn-xs bg-teal-300 btn-flat ediBtn1" style="padding: 2px 13px;"
                                                                                data-id="{{$myreplys->breplieID}}"
                                                                                data-replycmd="{{strip_tags($myreplys->replyCmd)}}"
                                                                                data-bcommentid="{{$myreplys->bcommentID}}"
                                                                                data-toggle="modal" data-target="#ediModal1" title="Edit"  >Edit</button></li>
                                                                    <li>
                                                                        <a class="btn btn-xs bg-danger-300 btn-flat" style="padding: 2px 8px;" href="{{action('User\BlogController@blogReplyDel', ['id' => $myreplys->breplieID])}}" onclick="return confirm('Are you sure to delete?')"  title="Delete">Delete</a>
                                                                    </li>
                                                                @else

                                                                @endif
                                                            </ul>




                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif


                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                        </div>

                        <hr class="no-margin">

                        <div class="panel panel-flat">
                            <form action="{{action('User\BlogController@blogCmd')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden"  name="blogID" value="{{$table->blogID}}">

                                <div class="panel-body">
                                    <h6 class="no-margin-top content-group"><strong>Add Comment</strong></h6>

                                    <div class="content-group">
                                        <textarea class="form-control cke_editable" id="add-comment" name="comment" placeholder="Enter your comment.." type="text" required minlength="5"></textarea>
                                    </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary"  ><i class="icon-plus22"></i> Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /comments -->




                </div>
            </div>
        </div>
    </div>
@endsection


@section('style')
    <style>
        .my-sidebar{

        }
    </style>
@endsection





@section('script')
    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

    <script type="text/javascript">
        //THIS IS FOR COMMENT EDIT
        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var comment = $(this).data('comment');
                var blog = $(this).data('blog');

                $('#ediID').val(id);
                $('#ediModal [name=comment]').val(comment);
                $('#ediModal [name=blogID]').val(blog);

            });
        });

        //THIS IS FOR REPLY EDIT
        $(function () {
            $('.ediBtn1').click(function () {
                var id = $(this).data('id');
                var replycmd = $(this).data('replycmd');
                var bcommentid = $(this).data('bcommentid');

                $('#ediID2').val(id);
                $('#ediModal1 [name=replyCmd]').val(replycmd);
                $('#ediModal1 [name=bcommentID]').val(bcommentid);


            });
        });

        //THIS IS FOR REPLY SHOW AND HIDE

        $(document).ready(function(){
            $('.replyClick').click(function() {
                var reid = $(this).data('reid');

                //alert(reid);

                $('#re'+reid).toggle("slide");
            });

        });

        //THIS IS FOR CKEDITOR
        $(function() {
            CKEDITOR.replace( 'add-comment', {
                height: '200px',
                removeButtons: 'Subscript,Superscript',
                toolbarGroups: [
                    { name: 'styles' },
                    { name: 'editing',     groups: [ 'find', 'selection' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles' ] },
                    { name: 'paragraph',   groups: [ 'list', 'blocks', 'align' ] },
                    { name: 'colors' },
                    { name: 'tools' },
                    { name: 'others' },
                    { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] }
                ]
            });
        });

        $(function () {
            contents("{{action('User\BlogController@allBlog')}}");
            // $('#categoryClick li a').click(function (e) {
            //     e.preventDefault();
            //     var url = $(this).attr('href');
            //     contents(url);
            // });

            $('#search').keyup(function (e) {
                e.preventDefault();
                var search = $(this).val();
                var url = $(this).data('url')+'?search='+search;

                if (search.length>0){
                    contents(url);
                }
                else {
                    contents("{{action('User\BlogController@allBlog')}}");
                }

            })
        });



        function contents(url) {
            $.get(url, function(result){
                var show_data = '';
                $.each(result, function( i, row ) {
                    show_data += '<div class="col-md-4">\n' +
                        '                        <div class="panel panel-flat">\n' +
                        '                            <div class="panel-body">\n' +
                        '                                <div class="thumb content-group">\n' +
                        '                                    <img src="public/image/information/iseries/'+row.imgName+'" value="'+row.blogID+'" alt="" class="img-responsive">\n' +
                        '                                    <div class="caption-overflow">\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t<span>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t\t<a href="blog_single.html" class="btn btn-flat border-white text-white btn-rounded btn-icon"><i class="icon-arrow-right8"></i></a>\n' +
                        '\t\t\t\t\t\t\t\t\t\t\t</span>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '\n' +
                        '                                <h5 class="text-semibold mb-5">\n' +
                        '                                    <a href="#" class="text-default" value="'+row.blogID+'">'+row.title+'</a>\n' +
                        '                                </h5>\n' +
                        '\n' +
                        '                                <ul class="list-inline list-inline-separate text-muted content-group">\n' +
                        '                                    <li>By <a href="#" class="text-muted" value="'+row.blogID+'">Eugene</a></li>\n' +
                        '                                    <li>July 20th, 2016</li>\n' +
                        '                                </ul>\n' +
                        '\n' +
                        '                                <p value="'+row.blogID+'">'+row.description+'</p>' +
                        '                            </div>\n' +
                        '\n' +
                        '                            <div class="panel-footer panel-footer-condensed">\n' +
                        '                                <div class="heading-elements not-collapsible">\n' +
                        '                                    <ul class="list-inline list-inline-separate heading-text text-muted">\n' +
                        '                                        <li><a href="#" class="text-muted"><i class="icon-heart6 text-size-base text-pink position-left"></i> 29</a></li>\n' +
                        '                                        <li><a href="#" class="text-muted"><i class="icon-heart6 text-size-base text-pink position-left"></i> 29</a></li>\n' +
                        '                                    </ul>\n' +
                        '\n' +
                        '                                    <a href="{{action('User\BlogController@blogDetails')}}?id='+row.blogID+'" value="'+row.blogID+'" class="heading-text pull-right">Read more <i class="icon-arrow-right14 position-right"></i></a>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>'
                });

                $('#blog').html(show_data);
            });
        }

    </script>

@endsection


