@extends('admin.layout.layout')
@section('title', 'updatePost')

@section('content')
    <style>
        #a {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #b {
            margin-top: 40px;
        }
    </style>
    <section class="content-header" style="text-decoration-line: underline 1px black">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit News</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit News</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section>
        <div class="row" id="a">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card ">
                    <div class="card-header" style="color:green;">
                        @if (session('success_edit'))
                            {{ session('success_edit') }}
                        @endif

                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form action="{{ url('admin/updatePostAction/' . $post->post_id) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="post_title" id="post_title"
                                    value="{{ $post->post_title }}">
                                @error('post_title')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="post_desc" id="product_name"
                                    value="{{ $post->post_desc }}">
                                @error('post_desc')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea style="resize: none" cols="10" rows="30"class="form-control" name="post_content" id="myeditorinstance">{{ $post->post_content }}</textarea>
                                @error('post_content')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Post Image</label><br>
                                <img src="{{ asset('admin/img/' . $post->post_images) }}" width="70px">
                                <div class="input-group" style="margin-top: 1rem ">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fileImage" name="post_images">
                                        <label class="custom-file-label" for="">Choose file</label>
                                    </div>

                                </div>
                                @error('post_images')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary update_product">Save</button>
                        </div>
                        <div>
                            @if (session('err_msg'))
                                <h6 style="color: red">
                                    Errors: {{ session('err_msg') }}
                                </h6>
                            @endif
                        </div>
                    </form>
                </div>
                <!-- /.card -->


            </div>
        </div>
    </section>


@endsection


@section('script-section')

    <script>
        $(".update_product").click(function(e) {
            $choose = confirm("Are you sure update news");
            if ($choose == true) {
                window.load();
            } else {
                e.preventDefault();

            }
        });
    </script>
    <script src="https://cdn.tiny.cloud/1/oqqqu0q1wbw1eci789aykkt07vupj7vuxsljx1jc1kr48u72/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
     var editor_config = {
        path_absolute : "http://localhost/BakeryStore/public/",
        selector: 'textarea#myeditorinstance',
        relative_urls: false,
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table directionality",
          "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
          if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
              callback(message.content);
            }
          });
        }
      };

      tinymce.init(editor_config);
    </script>
@stop
