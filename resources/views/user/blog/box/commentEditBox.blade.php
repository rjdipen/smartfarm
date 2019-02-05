@section('box')
    <!-- Basic Edi modal -->
    <div id="ediModal" class="modal fade mt-20">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-teal-400">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Update Comment</h5>
                </div>

                <form action="{{action('User\BlogController@blogCmdEdit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID" name="id">
                    <input type="hidden" id="ediID" name="blogID" >


                    <div class="modal-body">
                        <div class="form-group">
                            <textarea class="form-control" name="comment" type="text" required></textarea>
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

    <!-- Basic Reply Edi modal -->
    <div id="ediModal1" class="modal fade mt-20">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-teal-400">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Update Reply</h5>
                </div>

                <form action="{{action('User\BlogController@blogReplyEdit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID2" name="id">
                    <input type="hidden" id="ediID1"   name="bcommentID" >
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea class="form-control" name="replyCmd" type="text" required></textarea>
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
    <!-- /basic Reply Edi modal -->
@endsection
