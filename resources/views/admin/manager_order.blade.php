@extends('admin.layout.layout')
@section('title', 'order')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List order </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List order </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title">DataTable with minimal features & hover style</h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="product" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Order Code</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Create_at</th>
                                    <th>Detail_order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                            @endphp
                                @foreach ($order as $p)
                                    <tr>
                                    <td>

                                        {{$i++}}
                                        </td>
                                        <td>{{ $p->order_code }}</td>
                                        <td>${{ $p->order_total }}</td>
                                        <td>{{$p->order_status}}
                                            <a class="btn btn-info btn-sm"
                                            href="{{ URL::to('admin/update/' . $p->order_code) }}">
                                            Edit
                                        </a>
                                        </td>
                                        <td>{{ $p->created_at }}</td>

                                        <td >
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ URL::to('admin/view_order/' . $p->order_code) }}">
                                                <i class="fas fa-folder"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row paging">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                            Showing {{ $order->count() }} of {{ $order_count }} size
                        </div>
                    </div>
                    {{ $order->links() }}
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop
{{-- asset de bat link js --}}
{{-- url bat link route --}}
@section('script-section')
    <script>
        function confirm() {
            return confirm('are u sure');
        }
    </script>
@endsection
