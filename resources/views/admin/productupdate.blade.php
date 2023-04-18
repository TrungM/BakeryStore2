@extends('admin.layout.layout')
@section('title', 'edit-product')

@section('content')
<style>
    #a{
     display: flex;
     align-items: center;
     justify-content: center;
    }
    #b{
        margin-top: 40px;
    }
</style>
<section class="content-header" style="text-decoration-line: underline 1px black">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"  >
                <h1>Detail and Edit Product</h1>
                <h3    style="color: green; font-size:1rem ">
                    @if(session('success_edit') )
                    {{session('success_edit')}}
                    @endif

                </h3>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Detail and Edit Product</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section>
    <div class="row" id="a">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Product - {{$p->product_name}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                 <form enctype="multipart/form-data" method="POST" action="{{ url('admin/updatePost/'.$p->product_id) }}"  >
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Product name</label>
                            <input type="text" class="form-control" name="product_name" id="product_name"
                            value="{{$p->product_name}}" >
                            @error('product_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="product_description" id="product_description" cols="30" rows="5">{{$p->product_description}}</textarea>
                            @error('product_description')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" class="form-control" name="product_price" id="product_price"
                            value="{{$p->product_price}}" >
                            @error('product_price')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" name="product_qty" id="product_qty"
                            value="{{$p->product_qty}}" >
                            @error('product_qty')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="" class="form-control" name="category_id">

                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>

                                @foreach ($category_list as $item)
                                    <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                                @endforeach


                            </select>
                            @error('category_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror


                        </div>


                        <div class="form-group">
                            <label for="">File input</label>
                            <img src="{{asset('user/images/'.$p->product_images)}}" alt="{{$p->product_id}}" class="img-fluid">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="fileImage" name="fileImage">
                                    <label class="custom-file-label" for="">Choose file</label>
                                </div>
                                @error('fileImage')
                                <small class="form-text text-danger">{{ $message }}</small>
                               @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary update_product" >Save</button>
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
                $choose = confirm("Are you sure update product");
                if ($choose == true) {
                    window.load();
                } else {
                    e.preventDefault();

                }
            });


    </script>

@stop
