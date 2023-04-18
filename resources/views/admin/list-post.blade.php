@extends('admin.layout.layout')
@section('title', 'list-post')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Blogs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Blogs</li>
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
              <a href="{{ URL::to('admin/post') }}">Add New Blog</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="product" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Title </th>
                                    <th>Image main </th>
                                    <th>Slug</th>
                                    <th>Creator</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_post as $post)
                                    <tr>
                                        <td>{{ $post->post_title }}</td>
                                        <td><img style="width:100px" src="{{ url('admin/img/' . $post->post_images) }}"
                                                alt=""></td>
                                        <td>{{ $post->post_desc }}</td>

                                        <td>Admin</td>

                                        <td><a href="{{ url::to('admin/updatePost/' . $post->post_id) }}"><button
                                                    type="button" class="btn btn-primary ">Edit</button></a></td>
                                        <td >
                                            <a class="btn btn-danger "
                                                href="{{ url::to('delete-post/' . $post->post_id) }}"
                                                onclick="return confirm('Are you sure ')">
                                                 Delete
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

@endsection
