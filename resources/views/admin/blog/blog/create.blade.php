@extends('layouts.admin')
@section('title')
    Create Blog
@endsection

@section('content')

    <div class="row mb-10">
        <div class="col-md-6">
            <a class="btn bg-teal-400" type="button" href="{{action('Blog\BlogController@index')}}"><i class="icon-arrow-left16"></i> Back</a>
        </div>
        <div class="col-md-6"></div>
    </div>
    <!--This is for create blog-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <form action="{{action('Blog\BlogController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden"  name="blogID" value="">

                    <div class="panel-body">
                        <h6 class="no-margin-top content-group">Create New Blog</h6>
                        <div class="input-group">
                            <span class="input-group-addon">Title</span>
                            <input class="form-control" name="title" placeholder="title" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Category</span>
                            <select class="form-control m-input" name="bcatID" id="icat">
                                <option value="">Select State </option>
                                @foreach($bcat as $row)
                                    <option value="{{$row->bcatID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Photo</span>
                            <input type="file" name="imgName" class="file-input-extensions form-control " data-browse-class="btn btn-primary" data-remove-class="btn btn-default" accept="image/*">
                        </div>



                        <div class="content-group">
                            <h6 class="no-margin-top content-group">Description:</h6>
                            <textarea class="form-control cke_editable" id="add-comment" name="description" placeholder="Series description.." type="text" required></textarea>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon">Tag</span>
                            <input class="form-control" name="tag" placeholder="Enter tag ...." type="text" required>
                        </div><br>

                        <div class="text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="icon-plus22"></i> Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



@section('script')
    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/pages/uploader_bootstrap.js')}}"></script>

    <script type="text/javascript">

        $(function(){
            $(".file-styled-primary").uniform({
                fileButtonClass: 'action btn btn-default'
            });
        });

        //CRICKEDOTOR
        $(function() {
            CKEDITOR.replace( 'add-comment', {
                height: '200px',
                removeButtons: 'Subscript,Superscript',
                toolbarGroups: [
                    { name: 'styles' },
                    { name: 'editing',     groups: [ 'find', 'selection' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles' ] },
                    { name: 'paragraph',   groups: [ 'list', 'blocks', 'align' ] },
                    { name: 'links' },
                    { name: 'insert' },
                    { name: 'colors' },
                    { name: 'tools' },
                    { name: 'others' },
                    { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] }
                ]
            });
        });




    </script>

@endsection

