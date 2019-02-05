@extends('layouts.admin')
@extends('admin.box.information.istepsBox')
@section('title')
    Detail
@endsection
@section('content')
    <div class="row mb-10">
        <div class="col-md-6">
            <a class="btn bg-teal-400" href="{{action('Information\IseriesController@index')}}" title="Details"><i class="icon-arrow-left16"></i> Back</a>
        </div>
        <div class="col-md-6 text-right">

        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">

                <div class="panel-heading text-center border-top-grey-300">
                    <div class="content-group text-center">
                        <a href="#" class="display-inline-block">
                            <img src="{{asset('public/image/information/iseries/'.$table->imgName)}}" class="img-responsive" alt="">
                        </a>
                    </div>
                    <h6 class="panel-title font-weight-bold"><strong>{{$table->name}}</strong></h6>
                </div>
            @foreach($istep as $row)
            <div class="content-detached">
                <ul class="media-list content-group mt-20">
                    <li class="media panel panel-body stack-media-on-mobile">


                        <div class="media-left">
                            <a href="#">
                                <img src="{{asset('public/image/information/iseries/'.$row->imgName)}}" class="img-rounded img-lg" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-heading text-semibold">
                                <a href="#">{{$row->title}}</a>
                            </h6>
                            {!!$row->description!!}
                        </div>

                        <div class="media-right text-nowrap">
                            <span class="text-muted">{{$row->created_at->diffForHumans()}}</span>
                        </div>
                        <div class="media-footer text-right">
                            <a class="btn bg-teal-400" href="{{action('Information\IstepController@update', ['id' => $row->istepID])}}" title="Details"><i class="icon-pencil6 pr-10"></i> Edit</a>
                            <a class="btn bg-danger-400" href="" title="Delete"><i class="icon-bin pr-10"></i> Delete</a>

                        </div>
                    </li>
                </ul>
            </div>
                @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <form action="{{action('Information\IstepController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden"  name="iserieID" value="{{$table->iserieID}}">
                    <div class="panel-heading bg-teal-400 pb-5 pt-5">
                        <h6 class="no-margin-top">Add New Steps</h6>
                    </div>
                    <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon">Title</span>
                            <input class="form-control" name="title" placeholder="Series Name" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Upload Image</span>
                            <input type="file"  name="imgName" class="file-styled-primary" placeholder="Upload image...." accept="image/*">
                        </div><br>
                        <div class="content-group">
                            <h6 class="no-margin-top content-group">Description:</h6>
                            <textarea class="form-control cke_editable" id="add-comment" name="description" placeholder="Series description.." type="text" required></textarea>
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


