@extends('layouts.admin')
@section('title')
    Blog
@endsection
@section('content')
    <div class="row mb-10">
        <div class="col-md-6">
            <a class="btn bg-teal-400" type="button" href="{{action('Blog\BlogController@create')}}"><i class="icon-pencil5"></i> Create New Blog Post</a>
        </div>
        <div class="col-md-6"></div>
    </div>

    <!--This is for blog list-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All Blog list</h6>
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
                                <td>{{$row->blogID}}</td>
                                <td>
                                    <div class="media">
                                        <div class="thumb">
                                            <img src="{{asset('public/image/information/iseries/'.$row->imgName)}}" class="img-md" alt="" height="60" >
                                        </div>

                                    </div>
                                </td>

                                <td>
                                    <div class="media-body media-middle">
                                        <h5  class="text-size-base">{{$row->title}}</h5>
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
                                                <li><a href="{{action('Blog\BlogController@update',['id' => $row->blogID])}}"><i class="icon-pencil5"></i> Edit</a></li>
                                                <li class="divider"></li>
                                                <li><a href="{{action('Blog\BlogController@del', ['id' => $row->blogID])}}"><i class="icon-bin2"></i> Delete</a></li>
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

    <script type="text/javascript">

        $(function () {
            $('.ediBtn').click(function () {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var icon = $(this).data('icon');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=icon]').val(icon);

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
                    { name: 'links' },
                    { name: 'insert' },
                    { name: 'colors' },
                    { name: 'tools' },
                    { name: 'others' },
                    { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] }
                ]
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

