@extends('admin.layout.layout')
@section('title', 'create-new-product')
@section('content')
    <style>
        .container-fluid {

            margin-left: 15rem
        }
    </style>

    <div class="container-fluid">
        <div class="row">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Profile </h3>
                </div>
                <form action="">
                <div class="card-body">

                    <hr>

                    <div class="form-group">
                        <label for="">ID:</label>
                        <input name="id" class="form-control" value="{{ $user->customer_id }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="">Email:</label>
                        <input name="email" class="form-control"  value="{{ $user->customer_email }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="">Fullname</label>
                        <input name="name" class="form-control"  value="{{ $user->customer_name }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="">Address:</label>
                        <input name="address" class="form-control"  value="{{ $user->customer_address }}" readonly />
                    </div>
                    <div class="form-group">
                        <label for="">Phone:</label>
                        <input type="text" class="form-control"  name="phone" value="{{ $user->customer_phone }}" readonly />
                    </div>

                    <a href="{{url('admin/staff')}}">Return</a>

                </div>
                </form>
            </div>
            @endsection
            @section('script-section')
                <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

            @endsection
