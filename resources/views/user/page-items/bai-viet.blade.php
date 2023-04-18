@extends('user.layout.index')
@section('content')
    <!-- Main content -->

    <section class="content" >
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table >
                            <div class="container" style="padding:4rem 4rem; margin-right:5rem; ">
                                   {!! $post->post_content !!}
                            </div>
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
    <link rel="stylesheet" href="{{ asset('user/css/blog.css') }}">

@endsection
