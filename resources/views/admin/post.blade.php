@extends('admin.layout.layout')
@section('title', 'post')
@section('content')




    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Post News </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post News</li>
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
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ URL::to('/save-post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="post_title" class="form-control" id="exampleInputEmail1"
                                    placeholder="Tên danh mục">
                                @error('post_title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1"> Description</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="post_desc" id="exampleInputPassword1"
                                    placeholder="Tóm tắt bài viết"></textarea>
                                @error('post_desc')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Content</label>
                                <textarea style="resize: none" rows="1" class="form-control" name="post_content" id="myeditorinstance"
                                    placeholder="Nội dung bài viết"></textarea>
                                @error('post_content')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="custom-file" style="margin-bottom: 1rem;">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="post_images">
                                <label class="custom-file-label" for="exampleInputFile">Choose Image</label>
                                @error('post_images')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add_category_product" class="btn btn-info ">Post News</button>
                            </div>
                        </form>
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


@section('script-section')
    <script src="https://cdn.tiny.cloud/1/oqqqu0q1wbw1eci789aykkt07vupj7vuxsljx1jc1kr48u72/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        var editor_config = {
            path_absolute: "http://localhost/BakeryStore/public/",
            selector: 'textarea#myeditorinstance',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback: function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth;
                var y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url: cmsURL,
                    title: 'Filemanager',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizable: "yes",
                    close_previous: "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@stop
