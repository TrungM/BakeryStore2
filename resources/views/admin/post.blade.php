@extends('admin.layout.layout');
@section('title', 'post');
@section('content')

    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <form action="{{ URL::to('/save-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" name="post_title" class="form-control" id="exampleInputEmail1"
                    placeholder="Tên danh mục">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                <textarea style="resize: none" rows="1" class="form-control" name="post_desc" id="exampleInputPassword1"
                    placeholder="Tóm tắt bài viết"></textarea>
            </div>
            <div class="form-group" >
                <label for="exampleInputPassword1">Nội dung bài viết</label>
                <textarea style="resize: none" rows="1" class="form-control" name="post_content" id="ckeditor"
                    placeholder="Nội dung bài viết"></textarea>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFile"  name="post_images" >
                <label class="custom-file-label" for="exampleInputFile">Hình ảnh sản phẩm</label>
                </div>
            <div >
                <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
            </div>

        </form>
    </div>
</section>
<script src="//cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
    </script>
@stop

