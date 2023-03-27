@extends('admin.layout.layout')
@section('title', 'create-new-product')
@section('content')
    <style>
        .container-fluid {
            margin-left: 100px
        }
    </style>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-6">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update info [{{$u->customer_name}}]</h3>
                </div>
                <form method="POST" action="{{url('admin/updateInfoPost/'.$u->customer_id)}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">ID </label>
                            <input type="text" class="form-control" name="name" id="name" value="{{$u->customer_id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Full name </label>
                            <input type="text" class="form-control" name="name" id="name"
                            value="{{$u->customer_name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Address </label>
                            <input type="text" class="form-control" name="address" id="address"
                            value="{{$u->customer_address}}">
                        </div>
                        <div class="form-group">
                            <label for="">Email: </label>
                            <input type="email" name="email" required pattern="[a-zA-z0-9]{5.}@[a-zA-Z]{2,6}.[a-z]{2,6}" value="{{$u->customer_email}}"  readonly/>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" pattern="[0-9]{6,}"
                            value="{{$u->customer_phone}}">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div>
                        @if (session('err_msg'))
                        <h6 style="color: red">
                        Errors: {{session('err_msg')}}
                        </h6>

                        @endif
                    </div>
                </form>
            </div>


        @endsection
        @section('script-section')
            <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
            <script>
                $(function() {
                    bsCustomFileInput.init();
                });
            </script>
        @endsection
