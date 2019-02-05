@extends('layouts.admin')
@section('title')
    User
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-flat border-top-success">
                <div class="panel-heading">
                    <h6 class="panel-title">All User</h6>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered table-condensed table-hover table-striped datatable">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>State</th>
                            <th>City</th>
                            <th class="text-center">Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($table as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td class="text-center">
                                    @if($row->type == 'User')
                                    <a  href="{{action('HomeController@makeAdmin', ['id' => $row->id])}}"  onclick="return confirm('Are you sure to make admin?')" title="User">
                                        <span class="label bg-blue"><i class="icon-users2"></i> User </span></a>
                                    @else
                                    <a href="{{action('HomeController@makeUser', ['id' => $row->id])}}"  onclick="return confirm('Are you sure to make user?')" title="Admin">
                                        <span class="label bg-success-400"><i class="icon-user-tie"></i>  Admin</span> </a>
                                    @endif
                                </td>
                                <td class="text-right">
                                <a href="{{action('HomeController@del',['id' => $row->id])}}"  onclick="return confirm('Are you sure to delete?')" title="Admin"><span class="label bg-danger"><i class="icon-bin"></i>  Delete</span></a>

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
                var istate = $(this).data('istate');

                $('#ediID').val(id);
                $('#ediModal [name=name]').val(name);
                $('#ediModal [name=stateID]').val(istate);

            });
        });

        $(function () {

            $('.datatable').DataTable({
                order: [[ 0, "desc" ]],
                iDisplayLength: 25,
                columnDefs: [
                    { orderable: false, "targets": [4] }//For Column Order
                ]
            });

        });

    </script>

@endsection


