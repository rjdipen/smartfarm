@section('box')

    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade mt-20">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-teal-400">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> <strong>Update Profile</strong></h5>
                </div>

                <form action="{{action('User\DashboardController@profileUpdate')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID" name="id">

                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">Name</span>
                            <input class="form-control" name="name" placeholder="Enter Name" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Job Title</span>
                            <input class="form-control" name="job" placeholder="Enter Your occupation" type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Mobile</span>
                            <input class="form-control" name="mobile" placeholder="Enter Mobile Number" type="number" maxlength="11" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Address</span>
                            <textarea class="form-control" name="address" placeholder="Enter Your Address" type="text"  required></textarea>
                        </div><br>


                        <div class="input-group">
                            <span class="input-group-addon">Upload Image</span>
                            <input type="file" id="inputFile"  name="imgName" class="file-styled-primary" placeholder="Upload image...." accept="image/*">
                        </div><br>

                        <div class="text-center">
                            <img class="img-thumbnail preview" src="{{asset('public/image/information/iseries/'.Auth::user()->imgName)}}" style="height: 150px;" type="Company Logo" alt="Profile Image">
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
