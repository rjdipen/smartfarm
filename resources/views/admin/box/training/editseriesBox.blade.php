@section('box')

    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-teal-400">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Training Series</h5>
                </div>

                <form action="{{action('Traning\TseriesController@edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID" name="id">

                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">Title</span>
                            <input class="form-control" name="title" placeholder="Enter series title..." type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Category</span>
                            <select class="form-control m-input" name="icatID" id="icatEdit" required >
                                <option value="">Select Category </option>
                                @foreach($icat as $row)
                                    <option value="{{$row->icatID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Sub Category</span>
                            <select class="form-control m-input" name="isubcatID" id="isubcatEdit" required>
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Author Name</span>
                            <input class="form-control" name="authorName" placeholder="Enter Authoe name.." type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Tag</span>
                            <input class="form-control" name="tag" placeholder="Enter Tag Name.." type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Description</span>
                            <textarea class="form-control" name="description" placeholder="Enter Product Description.." type="text" required></textarea>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Upload Image</span>
                            <input type="file" id="inputFile"  name="imgName" class="file-styled-primary" placeholder="Upload image...." accept="image/*">
                        </div><br>

                        <div class="text-center">
                            <img class="img-thumbnail preview" src="{{asset('public/image/information/iseries/')}}" style="height: 150px;" type="Company Logo" alt="Company Logo">
                        </div>

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
