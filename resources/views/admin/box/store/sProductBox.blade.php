@section('box')
    <!-- Basic modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-teal-400">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title"><i class="icon-file-plus"></i> Add New SubCategory</h5>
                </div>

                <form action="{{action('Store\ProductController@save')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">Product Name</span>
                            <input class="form-control" name="name" placeholder="Enter Product Name..." type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Category</span>
                            <select class="form-control m-input" name="scatID" id="scat" required >
                                <option value="">Select Category </option>
                                @foreach($scat as $row)
                                    <option value="{{$row->scatID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Sub Category</span>
                            <select class="form-control m-input" name="ssubcatID" id="ssubcat" required>
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Quantity</span>
                            <input class="form-control" name="qty" placeholder="Enter Number of Quantity.." type="number" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Unit</span>
                            <select class="form-control m-input" name="unit" >
                                <option value="">Select Category </option>
                                <option value="KG">KG</option>
                                <option value="TON">Ton</option>
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Price</span>
                            <input class="form-control" name="price" placeholder="Enter Price.." type="number" required>
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
                            <img class="img-thumbnail preview" src="{{asset('public/image/information/iseries/'.$row->imgName)}}" style="height: 150px;" type="Company Logo" alt="Company Logo">
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
                    <h5 class="modal-title"><i class="icon-pencil7"></i> Edit Product</h5>
                </div>

                <form action="{{action('Store\ProductController@edit')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="ediID" name="id">

                    <div class="modal-body">

                        <div class="input-group">
                            <span class="input-group-addon">Product Name</span>
                            <input class="form-control" name="name" placeholder="Enter Product Name..." type="text" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Category</span>
                            <select class="form-control m-input" name="scatID" id="scatEdit" required>
                                <option value="">Select Category </option>
                                @foreach($scat as $row)
                                    <option value="{{$row->scatID}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Sub Category</span>
                            <select class="form-control m-input" name="ssubcatID" id="ssubcatEdit" required>
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Quantity</span>
                            <input class="form-control" name="qty" placeholder="Enter Number of Quantity.." type="number" required>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Unit</span>
                            <select class="form-control m-input" name="unit" >
                                <option value="">Select Category </option>
                                <option value="KG">KG</option>
                                <option value="TON">Ton</option>
                                <option value="piece">Piece</option>
                                <option value="set">Set</option>
                                <option value="unit">Unit</option>
                            </select>
                        </div><br>

                        <div class="input-group">
                            <span class="input-group-addon">Price</span>
                            <input class="form-control" name="price" placeholder="Enter Price.." type="number" required>
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
