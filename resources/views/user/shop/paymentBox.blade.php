<!--BIKASH MODEL-->
<div id="bikashModal" class="modal fade in">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-teal-400">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h5 class="modal-title"><i class="icon-cash"></i> BKash Payment information</h5>
            </div>

            <form action="{{action('PaymentController@save')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <table class="table table-hover table-striped table-bordered">
                        <tbody>
                        <tr>
                            <th>Account Number:</th>
                            <td>01747270531</td>
                        </tr>
                        <tr>
                            <th>Amount:</th>
                            <td>{{money($grandTotal)}}</td>
                        </tr>
                        <tr>
                            <th>Type:</th>
                            <td>Merchent Payment</td>
                        </tr>
                        <tr>
                            <th>Counter No:</th>
                            <td>1</td>
                        </tr>
                        </tbody>
                    </table>

                    <p class="text-center text-muted mt-20 mb-20">** Please enter the Transaction Id or Trx Id provided to you by BKash after your payment.</p>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">Trx Id:</label>
                        <div class="col-lg-9">
                            <input class="form-control" name="textID" placeholder="Trx Id " type="text" required="">
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
<!--BIKASH MODEL-->
