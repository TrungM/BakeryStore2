@extends('admin.layout.layout')
@section('title', 'customer')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Customer</li>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <thead style="text-align: center">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Images</th>
                                    <th>Google Id </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ds as $u)
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->phone }}</td>
                                        <td><img src="{{ asset('user/images/' . $u->image) }}" alt=""
                                                width="50px">
                                        </td>
                                        <td>{{ $u->google_id }}</td>
                                        @if ($u->active == 0)
                                            <td><button type="button" class="btn btn-primary btn_customer "
                                                    data-customer-status="1" id="{{ $u->id }}">Active</button></td>
                                        @else
                                            <td><button type="button" class="btn btn-danger  btn_customer"
                                                    data-customer-status="0" id="{{ $u->id }}">UnActive</button>
                                            </td>
                                        @endif


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <div class="row paging">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                            Showing {{ $ds->count() }} of {{ $count_customer }} customers
                        </div>
                    </div>
                    {{ $ds->links() }}
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop
@section('script-section')

    <script>
        $(".btn_customer").click(function(e) {
            var account_status = $(this).data('customer-status');
            var customer_id = $(this).attr("id");

            $choose = confirm("Do you change acitve customer account");

            if ($choose == true) {
                $.ajax({

                    url: '{{ url('admin/activeaccount') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        account_status: account_status,
                        customer_id: customer_id
                    },

                    success: function(data) {
                        location.reload();
                    }


                });
            } else {
                e.preventDefault();

            }






        });
    </script>

@endsection
