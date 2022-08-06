@extends('user.layout.index');
@section('content')
    {{-- <section class="content-header">
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
</section> --}}

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3><a href="{{ UsRL::to('admin/post') }}">Thêm bài viết</a></h3> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="product" class="table table-bordered table-hover">
                            {{-- @foreach ($post as $p) --}}
                            <div class="container">
                                <div>
                                    <b>
                                        <h1
                                            style="text-align: center; margin-bottom: 2rem; font-size:3rem; font-weight:bold;">
                                            {{ $post->post_desc }}</h1>
                                    </b>
                                    <img style="width: 100%;padding:1rem 1rem; "
                                        src="{{ url('admin/img/' . $post->post_images) }}" alt="">
                                    <div style="font-size: 2.5rem;padding:4rem 4rem; margin-right:5rem">
                                        <h4>{{ $post->post_content }}</h4>
                                    </div>

                                </div>
                                {{-- <img style="width:150px" src="{{url('admin/img/' . $post->post_images)}}" alt="">
                                <h2 style="padding:10px">{{ $post->post_title }}</h2> --}}
                            </div>
                            {{-- @endforeach --}}
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
@endsection
