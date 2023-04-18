@extends('admin.layout.layout')
@section('content')
    <section class="content-header" style="text-decoration-line: underline 1px black">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Product </h1>
                    <h3 class="card-title " style="color: green">
                        @if (session('success_delete'))
                            {{ session('success_delete') }}
                        @endif
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Product </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header" style=" display:flex; justify-content: space-between  ">

                        <button class="btn btn-secondary" aria-controls="example1" type="button"><a
                                href="{{ URL::to('admin/productinsert') }}"><span style="font-size: 1rem; color:#fff">Add
                                    New Product</span></a>
                        </button>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <form action="">
                                @csrf
                                <input type="text" class="form-control" id="search" name="search"
                                    placeholder="Enter Product Name">
                            </form>

                        </div>
                        <table id="product" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th> Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Category </th>
                                    <th>Quantity </th>
                                    <th>Star</th>
                                    <th> Edit </th>
                                    <th> Status </th>
                                    <th> Delete </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $p)
                                    <tr>
                                        <td><img width="100px" src="{{ url('user/images/' . $p->product_images) }}" />
                                        </td>
                                        <td>{{ $p->product_name }}</td>
                                        <td>{{ $p->product_price }}</td>


                                        <td>{{ $p->product_description }}</td>
                                        <td>{{ $p->category_name }}</td>

                                        @if ($p->product_qty == 0)
                                            <td style="color:red">Out of stock</td>
                                        @else
                                            <td style="font-weight:bold">{{ $p->product_qty }}</td>
                                        @endif
                                        {{-- <td>{{  $p->product_qty_sold  }}</td> --}}
                                        {{-- @if ($p->product_qty - $p->product_qty_sold <= 0)
                                        <td style="color:red">Sold out</td>
                                        @else
                                        <td style="font-weight:bold">{{$p->product_qty-$p->product_qty_sold   }}</td>
                                        @endif --}}
                                        <td>{{ $p->product_star }}</td>

                                        <td><a href="{{ url('admin/productupdate/' . $p->product_id) }}"><button
                                                    type="button" class="btn btn-primary ">Edit</button></a></td>
                                        <td><a href="{{ url('admin/productstatus/'.$p->product_id )}}"><button
                                                    type="button" class="btn btn-warning">Status</button></a></td>
                                        <td><a href="{{ url('admin/delete/' . $p->product_id) }}"><button type="button"
                                                    class="btn btn-danger delete_product">Detele</button></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Image </th>
                                    <th rowspan="1" colspan="1">Name</th>
                                    <th rowspan="1" colspan="1">Price </th>
                                    <th rowspan="1" colspan="1">Description</th>
                                    <th rowspan="1" colspan="1">Category</th>
                                    <th rowspan="1" colspan="1">Quantity</th>
                                    <th rowspan="1" colspan="1">Start</th>
                                    <th rowspan="1" colspan="1"> Edit</th>
                                    <th rowspan="1" colspan="1"> Delete</th>


                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row paging">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                            Showing {{ $products->count() }} of {{ $count_product }} product</div>
                    </div>
                    {{ $products->links() }}
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script-section')
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val();
                var _token = $('input[name="_token"]').val();

                if (value.trim().length >= 1) {

                    $(".paging").hide();


                    $.ajax({
                        type: 'get',
                        url: "{{ URL::to('product2') }}",
                        data: {
                            search: value,
                            _token: _token,

                        },
                        success: function(data) {
                            $('tbody').html(data);
                            delete_product();

                        }
                    });
                } else {
                    $(".paging").show();

                }


            })
        });

        function delete_product() {
            $(".delete_product").click(function(e) {
                $choose = confirm("Are you sure delete product");
                if ($choose == true) {
                    window.load();
                } else {
                    e.preventDefault();

                }
            });
        }
        delete_product();
    </script>
@endsection
