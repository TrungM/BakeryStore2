@extends('admin.layout.layout')
@section('title', 'create-new-product')

@section('content')
<style>
    #a{
     display: flex;
     align-items: center;
     justify-content: center;
    }
    #b{
        margin-top: 40px;
    }
</style>

    <div class="row" id="a">
        <!-- left column -->
        <div class="col-md-6" id="b">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add new products</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form enctype="multipart/form-data" method="POST" action="{{ url('admin/insertPost') }}"
                onsubmit="return kiemtra()">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Product name</label>
                            <input type="text" class="form-control" name="product_name" id="product_name"
                                placeholder="Enter product name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="product_description" id="product_description"
                                placeholder="Enter product description" required>
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="product_price" id="product_price"
                                placeholder="Enter product price" required min="1">
                        </div>
                        <div class="form-group">
                            <label for="">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fileImage" name="fileImage">
                                    <label class="custom-file-label" for="">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Category ID</label>
                            <input type="number" class="form-control" name="category_id" id="category_id"
                                placeholder="Enter product type 1-6" required min="1" max="6">
                        </div>
                        <div class="form-group">
                            <label for="">Product Star</label>
                            <input type="number" class="form-control" name="product_star" id="product_star"
                                placeholder="Enter product star" min="0" value="0">
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"  >Submit</button>
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
