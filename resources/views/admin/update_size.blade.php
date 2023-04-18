@extends('admin.layout.layout')

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
                    <h1>Update Size </h1>
                    <h3 class="card-title " style="color: green">
                        @if (session('success_edit'))
                            {{ session('success_edit') }}
                        @endif
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Size </li>
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

                <form method="POST" action="{{ url('admin/updateSize/' . $size->size_id) }}">
                    @csrf


                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Product name</label>

                            <select name="product_id" id="select_product_name" class="form-control">
                                <option value="{{ $size->product_id }}">{{ $size->product_name }}</option>
                                @foreach ($product_list as $item)
                                    <option value="{{ $item->product_id }}">{{ $item->product_name }}</option>
                                @endforeach

                            </select>


                            @error('product_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Size</label>
                            <input type="text" class="form-control" name="size" id="size"
                                placeholder="Enter product size" value="{{ $size->size }}">
                            @error('size')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Size Price</label>
                            <input type="text" class="form-control" name="size_price" id="size_price"
                                value="{{ $size->size_price }}" placeholder="Enter product size price">
                            @error('size_price')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <?php
                        $c = DB::table('tb_size')
                            ->where('product_id', $size->product_id)
                            ->sum('Quantity_size');
                        $p = DB::table('products')->where('product_id', $size->product_id)->first();

                        ?>
                        <div class="form-group">
                            <div style="display: flex; justify-content: space-between">
                                <label for="">Quantity</label>
                                <label for="">Avaliable <span class="display_a"
                                        style="color: #007bff">{{ $p->product_qty-$c }}</span></label>
                            </div>
                            <input type="text" class="form-control" name="quantity" id="qty_size"
                                placeholder="Enter quantity" value="{{ $size->Quantity_size }}">
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
                        <button type="submit" class="btn btn-primary update_size">Submit</button>
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
        $(document).ready(function() {

            $(".update_size").click(function(e) {
                $choose = confirm("Are you sure update size");
                if ($choose == true) {
                    window.load();
                } else {
                    e.preventDefault();

                }
            });

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
