@section('box')
    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-teal-400">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> <strong>Create New Series</strong></h5>
                </div>

                <form action="{{action('Information\IseriesController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">Name</span>
                            <input class="form-control" name="name" placeholder="Series Name" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Category</span>
                            <select class="form-control m-input" name="icatID" id="icat">
                                <option value="">Select State </option>
                                @foreach($icat as $row)
                                    <option value="{{$row->icatID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Subcategory</span>
                            <select id="isubcat" class="form-control m-input" name="isubcatID" >

                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">State</span>
                            <select class="form-control m-input" name="stateID" id="state">
                                <option value="">Select State </option>
                                @foreach($state as $row)
                                    <option value="{{$row->stateID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mt-20">
                            <span class="input-group-addon">City</span>
                            <select class="form-control m-input" name="cityID" id="city">
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Tag</span>
                            <input class="form-control" name="tag" placeholder="Enter tag" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Description</span>
                            <textarea class="form-control" name="description" placeholder="Series description.." type="text" required></textarea>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Upload Image</span>
                            <input type="file" id="inputFile"  name="imgName" class="file-styled-primary" placeholder="Upload image...." accept="image/*">
                        </div><br>

                        <div class="text-center">
                            <img class="img-thumbnail preview" src="" style="height: 150px;" type="Company Logo" alt="Company Logo">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-cancel-circle2"></i> Close</button>
                        <button type="submit" id="submit-all" class="btn btn-primary"><i class="icon-checkmark4"></i> Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /basic modal -->

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
                            <span class="input-group-addon">Category</span>
                            <select class="form-control m-input" name="icatID" id="icatEdit">
                                <option value="">Select State </option>
                                @foreach($icat as $row)
                                    <option value="{{$row->icatID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Subcategory</span>
                            <select id="isubcatEdit" class="form-control m-input" name="isubcatID" >

                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">State</span>
                            <select class="form-control m-input" name="stateID" id="stateEdit">
                                <option value="">Select State </option>
                                @foreach($state as $row)
                                    <option value="{{$row->stateID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mt-20">
                            <span class="input-group-addon">City</span>
                            <select class="form-control m-input" name="cityID" id="cityEdit">
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Tag</span>
                            <input class="form-control" name="tag" placeholder="Enter tag" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Description</span>
                            <textarea class="form-control" name="description" placeholder="Series description.." type="text" required></textarea>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Upload Image</span>
                            <input type="file" id="inputFile"  name="imgName" class="file-styled-primary" placeholder="Upload image...." accept="image/*">
                        </div><br>

                        <div class="text-center">
                            <img class="img-thumbnail preview" src="{{asset('public/image/information/iseries/'.$row->imgName)}}" style="height: 150px;" type="Company Logo" alt="Company Logo">
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
