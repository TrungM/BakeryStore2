@extends('admin.layout.layout')
@section('title', 'edit-size')
@section('content')
    <section class="content-header" style="text-decoration-line: underline 1px black">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Size </h1>
                    <h3 class="card-title " style="color: green">
                        @if (session('success_delete'))
                            {{ session('success_delete') }}
                        @endif
                    </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Size </li>
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
                                href="{{ URL('admin/add_size') }}"><span style="font-size: 1rem; color:#fff">Add
                                    New Size</span></a>
                        </button>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="product" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>Size</th>
                                    <th>Size Price</th>
                                    <th>Quantity</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($size as $p)
                                    <tr>
                                        <td style=color:chocolate>{{ $p->product_name }}</td>
                                        <td>{{ $p->size }}</td>

                                        <td>{{ $p->size_price }}</td>
                                        <td>{{ $p->Quantity_size }}</td>

                                        <td class="text-left">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ url('admin/update_size/' . $p->size_id) }}"> Edit

                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-sm delete_size "
                                                href="{{ url('delete_size/' . $p->size_id) }}">Delete

                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Product name </th>
                                    <th rowspan="1" colspan="1">Size</th>
                                    <th rowspan="1" colspan="1">Size Price </th>
                                    <th rowspan="1" colspan="1">Edit</th>
                                    <th rowspan="1" colspan="1">Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row paging">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                            Showing {{ $size->count() }} of {{ $count_size }} size</div>
                    </div>
                    {{ $size->links() }}
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
        function delete_size() {
            $(".delete_size").click(function(e) {
                $choose = confirm("Are you sure delete size");
                if ($choose == true) {
                    window.load();
                } else {
                    e.preventDefault();

                }
            });
        }
        delete_size();
    </script>
@endsection
