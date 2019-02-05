@section('box')
    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add New City</h5>
                </div>

                <form action="{{action('Information\CityController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="input-group">
                            <span class="input-group-addon">State</span>
                            <select class="form-control m-input" name="stateID" >
                                <option value="">Select State </option>
                                @foreach($state as $row)
                                    <option value="{{$row->stateID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">City</span>
                            <input class="form-control" name="name" placeholder="City Name" type="text" required>
                        </div><br>

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
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit City</h5>
                </div>

                <form action="{{action('Information\CityController@edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID" name="id">

                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">State</span>
                            <select class="form-control m-input" name="stateID" >
                                <option value="">Select State </option>
                                @foreach($state as $row)
                                    <option value="{{$row->stateID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">City Name:</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="name" placeholder="City Name" type="text" required>
                            </div>
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
