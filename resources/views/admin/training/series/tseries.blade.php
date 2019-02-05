@extends('layouts.admin')
@extends('admin.box.training.editseriesBox')
@section('title')
    Series
@endsection
@section('content')
    <div class="row mb-10">
        <div class="col-md-6">
            <a class="btn bg-teal-400" type="button" id="addSeriesClick"><i class="icon-pencil5"></i> Create New Training Series</a>
        </div>
        <div class="col-md-6"></div>
    </div>

    <!--This is for create Training-->
    <div class="row createSeries" style="display: none;">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <form action="{{action('Traning\TseriesController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden"  name="blogID" value="">

                    <div class="panel-body">
                        <h6 class="no-margin-top content-group">Create New Training Series</h6>
                        <div class="input-group">
                            <span class="input-group-addon">Title</span>
                            <input class="form-control" name="title" placeholder="title" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Author Name</span>
                            <input class="form-control" name="authorName" placeholder="author name" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Category</span>
                            <select class="form-control m-input" name="icatID" id="icat" required >
                                <option value="">Select Category </option>
                                @foreach($icat as $row)
                                    <option value="{{$row->icatID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Sub Category</span>
                            <select class="form-control m-input" name="isubcatID" id="isubcat" required>
                            </select>
                        </div><br>

                        <div class="input-group mb-5">
                            <span class="input-group-addon">Photo</span>
                            <input type="file" name="imgName" class="file-input-extensions form-control " data-browse-class="btn btn-primary" data-remove-class="btn btn-default" accept="image/*">
                        </div>

                        <div class="content-group">
                            <h6 class="no-margin-top content-group">Description:</h6>
                            <textarea style="height:100px;" class="form-control cke_editable" id="add-comment" name="description" placeholder="Series description.." type="text" required>
                            </textarea>
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

    <!--This is for blog list-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Training Series</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable datatable-responsive1" id="datatable-responsive">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)

                            <tr>
                                <td>{{$row->tserieID}}</td>
                                <td>
                                    <div class="media">
                                        <div class="thumb">
                                            <img src="{{asset('public/image/information/iseries/'.$row->imgName)}}" class="img-md" alt="" height="60" >
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="media-body media-middle">
                                        <h5  class="text-size-base"> {{$row->title}}</h5>
                                        <div class="text-muted text-size-small">
                                            {!!str_limit($row->description, 80, '...')!!}
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a type="button text-left" class="btn no-padding pl-20 ediBtn"
                                                            data-id="{{$row->tserieID}}"
                                                            data-title="{{$row->title}}"
                                                            data-authorname="{{$row->authorName}}"
                                                            data-des="{{strip_tags($row->description)}}"
                                                            data-tag="{{$row->tag}}"
                                                            data-cat="{{$row->icatID}}"
                                                            data-subcat="{{$row->isubcatID}}"
                                                            data-img="{{asset('public/image/information/iseries/'.$row->imgName)}}"
                                                            data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"> Edit</i> </a></li>
                                                <li class="divider"></li>
                                                <li><a href="{{action('Traning\TseriesController@del', ['id' => $row->tserieID])}}"><i class="icon-bin2"></i> Delete</a></li>
                                                <li><a href="{{action('Traning\TseriesController@steps_list', ['id' => $row->tserieID])}}">View <i class="icon-arrow-right16"></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/assets/js/pages/uploader_bootstrap.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function(){
            $('#addSeriesClick').click(function() {
                $('.createSeries').toggle("slide");
            });

        });

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var authorname = $(this).data('authorname');
                var tag = $(this).data('tag');
                var des = $(this).data('des');
                var cat = $(this).data('cat');
                var subcat = $(this).data('subcat');
                var img = $(this).data('img');

                $('#ediID').val(id);
                $('#ediModal [name=title]').val(title);
                $('#ediModal [name=authorName]').val(authorname);
                $('#ediModal [name=tag]').val(tag);
                $('#ediModal [name=description]').val(des);
                $('#ediModal [name=scatID]').val(cat);
                $('#ediModal [name=ssubcatID]').val(subcat);
                $('#ediModal img').attr('src',img);

            });
        });

        //image Preview
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

        //CRICKEDOTOR
        $(function() {
            CKEDITOR.replace( 'add-comment', {
                height: '80px',
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

        // upload date
        $(function () {
            $('#icat').change(function () {
                var icatID = $(this).val();
                $.get("{{action('Traning\TseriesController@subcategory_list')}}", {icatID: icatID}, function(result){
                    var show_data = '';
                    $.each(result, function( i, value ) {
                        show_data += '<option value="'+value.isubcatID+'">'+value.name+'</option>';
                    });

                    $('#isubcat').html(show_data);
                });
            });

        });

        // Edit data
        $(function () {
            $('#icatEdit').change(function () {
                var icatID = $(this).val();
                $.get("{{action('Traning\TseriesController@subcategory_list')}}", {icatID: icatID}, function(result){
                    var show_data = '';
                    $.each(result, function( i, value ) {
                        show_data += '<option value="'+value.isubcatID+'">'+value.name+'</option>';
                    });

                    $('#isubcatEdit').html(show_data);
                });
            });

        });


        // this is for responsive table
        $(function() {


            // Table setup
            // ------------------------------

            // Setting datatable defaults
            $.extend( $.fn.dataTable.defaults, {
                autoWidth: false,
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    width: '100px',
                    targets: [ 5 ]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
                },
                drawCallback: function () {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
                },
                preDrawCallback: function() {
                    $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
                }
            });


            // Basic responsive configuration
            $('.datatable-responsive1').DataTable();
        });


    </script>

@endsection

