@extends('layouts.admin')
@section('title')
    Steps Edit
@endsection
@section('content')
    <div class="row mb-10">
        <div class="col-md-6">
            <a class="btn btn-labeled bg-teal-400" href="{{action('Information\IstepController@index')}}" title="Details"><i class="icon-arrow-left16"></i> Back</a>
        </div>
        <div class="col-md-6 text-right">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <form action="{{action('Information\IstepController@edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden"  name="iserieID" value="{{$table->iserieID}}">
                    <input type="hidden"  name="id" value="{{$table->istepID}}">

                    <div class="panel-body">
                        <h6 class="no-margin-top content-group">Add New Steps</h6>
                        <div class="input-group">
                            <span class="input-group-addon">Title</span>
                            <input class="form-control" name="title" value="{{$table->title}}" placeholder="Title" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Upload Image</span>
                            <input type="file"  name="imgName" class="file-styled-primary" placeholder="Upload image...." accept="image/*">
                        </div><br>
                        <div class="content-group">
                            <h6 class="no-margin-top content-group">Description:</h6>
                            <textarea class="form-control cke_editable" id="add-comment"  name="description" placeholder="Series description.." type="text" required>{{$table->description}}</textarea>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                            <button type="submit" class="btn btn-primary"><i class="icon-plus22"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@section('script')

    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

    <script type="text/javascript">

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var des = $(this).data('des');
                var tag = $(this).data('tag');
                var icat = $(this).data('icat');
                var isucat = $(this).data('isucat');
                var state = $(this).data('state');
                var city = $(this).data('city');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=description]').val(des);
                $('#ediModal [name=tag]').val(tag);
                $('#ediModal [name=icatID]').val(icat);
                $('#ediModal [name=isubcatID]').val(isucat);
                $('#ediModal [name=state]').val(state);
                $('#ediModal [name=city]').val(city);

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
                    // { name: 'links' },
                    // { name: 'insert' },
                    { name: 'colors' },
                    { name: 'tools' },
                    { name: 'others' },
                    { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] }
                ]
            });
        });

    </script>

@endsection


