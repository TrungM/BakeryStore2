@extends('admin.layout.layout')
@section('title', 'create-new-product')

@section('content')
    <style>
        #a {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #b {
            margin-top: 40px;
        }
    </style>

    <div class="row" id="a">
        <!-- left column -->
        <div class="col-md-6" id="b">
            <!-- general form elements -->
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->

                <form method="POST" action="{{ url('admin/updateSize/' . $size->size_id) }}" onsubmit="return kiemtra()">
                    @csrf


                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Product id</label>
                            <input type="text" class="form-control" name="product_id" id="product_id"
                                value="{{ $size->product_id }}" placeholder="Enter product id" required>
                        </div>

                        <div class="form-group">
                            <label for="">Size</label>
                            <input type="text" class="form-control" name="size" id="size"
                                placeholder="Enter product size" value="{{ $size->size }}">
                        </div>

                        <div class="form-group">
                            <label for="">Size Price</label>
                            <input type="text" class="form-control" name="size_price" id="size_price"
                                value="{{ $size->size_price }}" placeholder="Enter product size price">
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div>
                        @if (session('err_msg'))
                            <h6 style="color: red">
                                Errors: {{ session('err_msg') }}
                            </h6>
                        @endif
                    </div>
                </form>
            </div>
            <!-- /.card -->


        </div>
    </div>

@endsection


@section('script-section')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });

        function kiemtra() {
            //Kiem tra fullname
            let prodname = $("#product_name").val().trim();
            let proddes = $("#product_description").val().trim();
            let prodprice = $("#product_price").val().trim();
            let cateid = $("#category_id").val().trim();
            if (prodname == "") {
                alert('Name Cant Not Be Blank!!!');
                $("#product_name").focus();
                return false;
            }
            //kiem tra description
            if (proddes == "") {
                alert('Description Cant Not Be Blank!!!');
                $("#product_description").focus();
                return false;
            }
            //kiem tra price
            if (prodprice < 1) {
                alert('Price Must Be Greater Than 0!');
                $("#product_price").focus();
                return false;
            }
            if (cateid < 1 || cateid > 6) {
                alert('Category ID must be in range [1-6]');
                $("#category_id").focus();
                return false;
            }
        }
    </script>

@stop
