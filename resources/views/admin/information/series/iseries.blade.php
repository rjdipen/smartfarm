@extends('layouts.admin')
@extends('admin.box.information.iseriesBox')
@section('title')
    Information
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <p><button type="button" class="btn btn-primary btn-labeled" data-toggle="modal" data-target="#myModal"><b><i class="icon-file-plus"></i></b> Create Series</button></p>
        </div>
        <div class="col-md-6"></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title font-weight-bold">All Series list</h6>
                </div>

                <div class="panel-body">
                    <table class="table datatable table-bordered table-condensed table-hover table-striped mb-10">
                        <thead>
                        <tr>
                            <th>S\N</th>
                            <th>name</th>
                            <th>Category</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->iserieID}}</td>
                                <td>
                                    <div class="media">
                                        <a href="#" class="media-left">
                                            <img src="{{asset('public/image/information/iseries/'.$row->imgName)}}" height="100" width="100" class="" alt="">
                                        </a>

                                        <div class="media-body media-middle">
                                            <p class="text-semibold"><strong>{{$row->name}}</strong></p>
                                            <div class="text-size-small">
                                                <span class="position-left">
                                                    {{str_limit($row->description, 80, '...')}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>



                                <td>{{$row->icat['name']}}</td>
                                <td class="text-right">
                                    <button class="btn btn-xs btn-success no-padding mr-5 ediBtn"
                                            data-id="{{$row->iserieID}}"
                                            data-name="{{$row->name}}"
                                            data-des="{{$row->description}}"
                                            data-tag="{{$row->tag}}"
                                            data-icat="{{$row->icatID}}"
                                            data-isubcat="{{$row->isubcatID}}"
                                            data-state="{{$row->stateID}}"
                                            data-img="{{asset('public/image/information/iseries/'.$row->imgName)}}"
                                            data-city="{{$row->cityID}}" data-toggle="modal" data-target="#ediModal" title="Edit"><i class="icon-pencil5"></i></button>
                                    <a class="btn btn-xs btn-danger no-padding" href="{{action('Information\IseriesController@del', ['id' => $row->iserieID])}}"  onclick="return confirm('Are you sure to delete?')" title="Delete"><i class="icon-bin"></i></a>
                                    <a class="btn btn-xs bg-teal-400 no-padding" href="{{action('Information\IseriesController@steps_list',['id' => $row->iserieID])}}" title="Details"><i class="icon-arrow-right16"></i></a>
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
                var img = $(this).data('img');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=description]').val(des);
                $('#ediModal [name=tag]').val(tag);
                $('#ediModal [name=icatID]').val(icat);
                $('#ediModal [name=isubcatID]').val(isucat);
                $('#ediModal [name=state]').val(state);
                $('#ediModal [name=city]').val(city);
                $('#ediModal img').attr('src',img);

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
        // upload date
        $(function () {
            $('#icat').change(function () {
                var icatID = $(this).val();
                $.get("{{action('Information\IseriesController@category_list')}}", {icatID: icatID}, function(result){
                    var show_data = '';
                    $.each(result, function( i, value ) {
                        show_data += '<option value="'+value.isubcatID+'">'+value.name+'</option>';
                    });

                    $('#isubcat').html(show_data);
                });
            });

        });

        $(function () {
            $('#state').change(function () {
                var stateID = $(this).val();
                $.get("{{action('Information\IseriesController@state_list')}}", {stateID: stateID}, function(result){
                    var show_data = '';
                    $.each(result, function( i, value ) {
                        show_data += '<option value="'+value.cityID+'">'+value.name+'</option>';
                    });

                    $('#city').html(show_data);
                });
            });

        });

        //Edit data
        $(function () {
            $('#icatEdit').change(function () {
                var icatID = $(this).val();
                $.get("{{action('Information\IseriesController@category_list')}}", {icatID: icatID}, function(result){
                    var show_data = '';
                    $.each(result, function( i, value ) {
                        show_data += '<option value="'+value.isubcatID+'">'+value.name+'</option>';
                    });

                    $('#isubcatEdit').html(show_data);
                });
            });

        });

        $(function () {
            $('#stateEdit').change(function () {
                var stateID = $(this).val();
                $.get("{{action('Information\IseriesController@state_list')}}", {stateID: stateID}, function(result){
                    var show_data = '';
                    $.each(result, function( i, value ) {
                        show_data += '<option value="'+value.cityID+'">'+value.name+'</option>';
                    });

                    $('#cityEdit').html(show_data);
                });
            });

        });

        //image Preview
        $(function () {
            $("#inputFile").change(function () {
                imgPrev(this , '.preview');
            });
        });



    </script>

@endsection


