@extends('admin.layout.layout')
@section('title', 'list-post')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hiện thị bài viết </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
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
                        <h3><a href="{{ URL::to('admin/post') }}">Thêm bài viết</a></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="product" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Tên bài viết</th>
                                    <th>Hình ảnh bài viết</th>
                                    <th>Slug</th>
                                    {{-- <th>Mô tả bài viết</th> --}}
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_post as $post)
                                    <tr>
                                        <td>{{ $post->post_title }}</td>
                                        <td><img style="width:100px" src="{{ url('admin/img/' . $post->post_images) }}"
                                                alt=""></td>
                                        <td>{{ $post->post_desc }}</td>
                                        {{-- <td>{!! $post->post_content !!}</td> --}}
                                        {{-- <td>{{ $post->post_meta_keywords }}</td> --}}
                                        {{-- <td>{{ $p->created_at }}</td> --}}

                                        {{-- <td><img width="100px" src="{{ url('images/'.$p->image) }}" /></td> --}}
                                        <td class="text-right">
                                            {{-- <a class="btn btn-primary btn-sm"
                                                href="{{ URL::to('admin/view_order/') }}">
                                                <i class="fas fa-folder"></i> View
                                            </a> --}}
                                            {{-- <a class="btn btn-info btn-sm"
                                                href="{{ url::to('update_post/' . $post->post_id) }}">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a> --}}
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ url::to('delete-post/' . $post->post_id) }}"
                                                onclick="return confirm('Bạn có muốn xóa')">
                                                <i class="fas fa-trash"></i> Delete
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
