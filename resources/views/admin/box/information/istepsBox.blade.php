@section('box')

    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-teal-400">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> <strong>Edit Series</strong></h5>
                </div>

                <form action="{{action('Information\IseriesController@edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID" name="id">

                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">Name</span>
                            <input class="form-control" name="name" placeholder="Series Name" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Upload Image</span>
                            <input type="file"  name="imgName" class="file-styled-primary" placeholder="Upload image...." accept="image/*">
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Description</span>
                            <textarea class="form-control" name="description" placeholder="Series description.." type="text" required></textarea>
                        </div><br>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic Edi modal -->
@endsection
