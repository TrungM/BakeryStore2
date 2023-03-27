@extends('user.layout.index')
@section('content')
    <section class="blogs" id="blogs">

        <div class="heading">
            <h3>our blogs</h3>
        </div>

        <div class="box-container">
            @foreach ($all_post as $post)
                <div class="box">
                    <div class="image">

                        <img src="{{ url('admin/img/' . $post->post_images) }}">
                    </div>
                    <div class="content">
                        <p>{{ $post->post_desc }}</p>
                        <a href="{{ url('bai-viet/' . $post->post_title) }}" class="btn-blog">read more</a>
                    </div>
                </div>
            @endforeach
        </div>

    </section>
        <link rel="stylesheet" href="{{ asset('user/css/blog.css') }}">

    @endsection
