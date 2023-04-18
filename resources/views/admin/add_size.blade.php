@extends('admin.layout.layout')
@section('title', 'create-new-size')

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
                            <select name="product_name" id="select_product_name" class="form-control">
                                <option value="">Choose option product name</option>
                                @foreach ($list_product as $p)
                                    <option value="{{ $p->product_id }}">{{ $p->product_name }}</option>
                                @endforeach
                            </select>
                            @error('product_name')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Size</label>
                            <input type="text" class="form-control" name="size" id="size"
                                placeholder="Enter product size">
                            @error('size')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Size Price</label>
                            <input type="text" class="form-control" name="size_price" id="size_price"
                                placeholder="Enter product size price">
                            @error('size_price')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div style="display: flex; justify-content: space-between">
                                <label for="">Quantity</label>
                                <label for="">Avaliable <span class="display_a"
                                        style="color: #007bff"></span></label>
                            </div>


                            <input type="text" class="form-control" name="quantity" id="qty_size"
                                placeholder="Enter quantity">
                            @error('quantity')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                            @if (session('status_error'))
                                <small class="form-text text-danger"> {{ session('status_error') }}
                                </small>
                            @endif
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
    <script>
        $(document).ready(function() {
            $('#select_product_name').change(function() {
                var select_value = $(this).val();
                // alert(value);
                var _token = $('input[name="_token"]').val();

                $.ajax({

                    url: '{{ url('display_avaliable') }}',
                    method: 'POST',
                    data: {
                        _token: _token,
                        select_value: select_value,
                    },

                    success: function(data) {

                        $(".display_a").html(data.avaliable);



                    }


                });



            });


        });
    </script>

@stop
