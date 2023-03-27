@extends('admin.layout.layout')
@section('title', 'create-new-product')

@section('content')

    <section class="content-header" style="text-decoration-line: underline 1px black">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product </h1>
                    <h3 class="card-title " style="color: green">
                        @if (session('status'))
                        {{ session('status') }}
                    @endif
                </h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Product </li>
                    </ol>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="display: flex; justify-content: center ;">
                <!-- left column -->
                <div class="col-md-6" style="padding: 0.1rem 0rem ">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ url('admin/insertPost') }}" enctype="multipart/form-data">

                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product name </label>
                                    <input type="text" class="form-control" id="productname" name="product_name"
                                        placeholder="Enter your product name">
                                    @error('product_name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">Product price</label>
                                    <input type="text" class="form-control" id="productname" name="product_price"
                                        placeholder="Enter your product price">
                                    @error('product_price')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="product_images">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>

                                    @error('product_images')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror

                                    <small class="form-text text-danger">
                                        @if (session('error_upload'))
                                            {{ session('error_upload') }}
                                        @endif
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Category</label>
                                    <select id="" class="form-control" name="select_category">
                                        <option value="">Choose Category</option>

                                        @foreach ($category as $item)
                                            <option value="{{ $item->category_id }}">{{ $item->category_name }}</option>
                                        @endforeach


                                    </select>
                                    @error('select_category')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label for="quality">Product quality</label>
                                    <input type="text" class="form-control" id="productqty" name="product_quantity"
                                        placeholder="Enter your product quality">

                                    @error('product_quantity')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Product description</label>
                                    <textarea id="" cols="30" rows="5" class="form-control" placeholder="Enter your  description"
                                        name="product_description"></textarea>

                                    @error('product_description')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="btn-add-product">Add New
                                    Product</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
