@extends('user.layout.index')
@section('content')
    <section class="detail-profile-customer">
        <div class="detail-profile">
            <div class="image-option-profile">
                @if (Session::has('login_google'))

                @if (Session::has("image_upload_profile_user"))

                <div class="image-profile">
                    <img src="{{ asset('user/images/' . $profile->image) }}" alt="">
                </div>
                @else
                <div class="image-profile">
                    <img src="{{ $profile->image}}" alt="">
                </div>
                @endif

                @else
                <div class="image-profile">
                    <img src="{{ asset('user/images/' . $profile->image) }}" alt="">
                </div>
                @endif

                <div class="detail-infor">

                    <div class="name-infor">
                        <span>{{ $profile->name }}</span>
                    </div>
                    <div class="email-infor">
                        <span>{{ $profile->email }}</span>
                    </div>

                </div>

                <div class="option-profile">
                    <h5 style="color: green">
                        @if (session('success_change_password_c'))
                            {{ session('success_change_password_c') }}
                        @endif
                    </h5>
                    <div class="change-image">
                        <span>Change Image</span>
                    </div>
                    @if (Session::has('login_google'))

                    @else
                        <div class="change-password">
                            <span>Change password</span>
                        </div>
                    @endif

                </div>

            </div>

            <div class="fix-profile">
                <div class="header-profile">
                    <h2>Profile customer
                        <h5 style="color: green">
                            @if (session('success_update_profile'))
                                {{ session('success_update_profile') }}
                            @endif
                        </h5>

                    </h2>
                </div>
                <form action="{{ url('detail-profile/edit/' . $profile->id) }}" method="post">
                    @csrf
                    <div>
                        <label for="">Name </label>
                        @error('name')
                            <small class="form-text text-danger-error">{{ $message }}</small>
                        @enderror
                        <br>
                        <input type="text" name="name" id="username" value="{{ $profile->name }}"
                            class="user-form-items">

                    </div>
                    <div>
                        <label for="">Email </label>

                        <br>
                        <input type="text" name="email" id="email" value="{{ $profile->email }}"
                            class="user-form-items" readonly>

                    </div>
                    <div>
                        <label for="">Phone </label>
                        @error('phone')
                            <small class="form-text text-danger-error">{{ $message }}</small>
                        @enderror
                        <br>
                        <input type="text" name="phone" id="phone" value="{{ $profile->phone }}"
                            class="user-form-items">

                    </div>
                    <div>
                        <input type="submit" value="Save" class="btn edit_profile">

                    </div>
                </form>

            </div>




        </div>




    </section>

    <section class="upload-img" style="display:none;">
        <div class="bg-upload">


            <div class="close-bg-upload">
                <i class="fas fa-times" id="close"></i>
            </div>
            @error('image')
                <small class="form-text text-danger-error" style="font-size: 1rem">{{ $message }}</small>
            @enderror
            <div class="action-upload">
                <div class="upload-main">
                    <svg height="32" width="32" viewBox="0 0 24 24" aria-label="Add files" role="img">
                        <path
                            d="M24 12c0-6.627-5.372-12-12-12C5.373 0 0 5.373 0 12s5.373 12 12 12c6.628 0 12-5.373 12-12zm-10.767 3.75a1.25 1.25 0 0 1-2.5 0v-3.948l-1.031 1.031a1.25 1.25 0 0 1-1.768-1.768L12 7l4.066 4.065a1.25 1.25 0 0 1-1.768 1.768l-1.065-1.065v3.982z">
                        </path>
                    </svg>



                    <div class="upload-content-title">
                        <p style="font-weight: bold;">Click to change</p>
                    </div>


                    <div class="upload-content-footer">
                        <p style="font-size: 1.5rem ;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
                            nesciunt, cupiditate facere esse dolorem numquam </p>
                    </div>
                </div>

                <form action="{{ url('detail-profile/uploadimg/' . $profile->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input aria-label="File Upload" id="storyboard-upload-input" type="file"
                        style="cursor: pointer; height: 100%; opacity: 0; position: absolute; width: 100%; left: 0px ;border-radius: 32px;top:0px"
                        name="image">

                    <input type="submit" value="Change" class="btn btn-upload" style="margin-top: 3rem ">
                </form>

            </div>


        </div>


    </section>
    <div class="bg-color" style="display:none">

    </div>
    <section class="change-password-txt" style="display:none;">

        <div class="bg-change-password-customer">

            <div class="close-bg-upload">
                <i class="fas fa-times" id="close"></i>
            </div>
            <div class="header-change-pass">
                <h2>Change Password </h2>
            </div>
            <form action="{{ url('detail-profile/change-password/' . $profile->id) }}" method="post">
                @csrf
                <div>
                    <label for="">Current Password </label>
                    @error('current_password')
                        <small class="form-text text-danger-error error-change-pass">{{ $message }}</small>
                    @enderror
                    <br>
                    <input type="text" name="current_password" id="current_password" value=""
                        class="user-form-items"placeholder="Enter your password">
                </div>
                <div>
                    <label for="">New Password </label>
                    @error('password')
                        <small class="form-text text-danger-error error-change-pass">{{ $message }}</small>
                    @enderror
                    <br>
                    <input type="text" name="password" id="password" value="" class="user-form-items"
                        placeholder="Enter new password">
                </div>
                <div>
                    <label for="">Confirm Password </label>
                    @error('password_confirmation')
                        <small class="form-text text-danger-error error-change-pass">{{ $message }}</small>
                    @enderror
                    <br>
                    <input type="text" name="password_confirmation" id="password_confirmation" value=""
                        class="user-form-items" placeholder="Enter confirm password">
                </div>

                <div>
                    <input type="submit" value="Save" class="btn btn-change-pass">

                </div>
            </form>
        </div>



    </section>
    <link rel="stylesheet" href=" {{ asset('user/css/detail-customer.css') }}">
    <script src=" {{ asset('user/js/detail-profile.js') }} "></script>
@endsection
