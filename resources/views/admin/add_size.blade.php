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

    <section class="content-header" style="text-decoration-line: underline 1px black">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Size </h1>
                    <h3 class="card-title " style="color: green">
                        @if (session('status'))
                            {{ session('status') }}
                        @endif
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Size </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row" id="a">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">

                <!-- /.card-header -->
                <!-- form start -->

                <form method="POST" action="{{ url('sizeManager_insert') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Product name</label>

                            <select name="product_name" id="product_id" class="form-control">
                                <option value="">Choose option product name</option>
                                @foreach ($list_product as $p)
                                    <option value="{{ $p->product_id }}">{{ $p->product_name }}</option>
                                @endforeach
                            </select>

                            @error("product_name")
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Size</label>
                            <input type="text" class="form-control" name="size" id="size"
                                placeholder="Enter product size">
                                @error("size")
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Size Price</label>
                            <input type="text" class="form-control" name="size_price" id="size_price"
                                placeholder="Enter product size price" >
                                @error("size_price")
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
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
    </script>

@stop
