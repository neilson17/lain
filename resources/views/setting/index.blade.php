@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Edit Profile</h2>
<form role="form" method="POST" action="{{url('settingupdate')}}" enctype="multipart/form-data">
@csrf
@method("PUT")
    @if(session('status'))
    <div id="notification-delete-note-success" class="mt-15x card-progress p-15x d-flex item-align-center">
        <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
        <p class="ml-15x">{{session('status')}}</p>
    </div>
    @endif

    @if(session('error'))
    <div id="notification-delete-note-fail" class="card-warning mt-15x p-15x d-flex item-align-center">
        <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
        <p class="ml-15x">{{session('error')}}</p>
    </div>
    @endif
    <div class="d-flex justify-content-space-evenly mt-15x edit-team-wrapper">
        <div class="d-flex flex-dir-col image-edit-team-wrapper">
            <img src="{{asset('assets/img/'.$data->photo_url)}}" alt="" class="w-175x img-avatar" id="preview-image">
            <input type="file" class="mt-15x" accept=".jpg, .jpeg, .png" name="image" id="image">
        </div>
        <div class="d-flex flex-dir-col form-edit-team-wrapper">
            <div class="w-100p">
                <p class="font-14x">Username</p>
                <input type="text" class="input-text mt-3x w-100p" disabled value="{{ $data->email }}">
                <input type="hidden" value="{{ $data->id }}" name="id_user">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Name</p>
                <input type="text" class="input-text mt-3x w-100p" value="{{ $data->name }}" name="name">
            </div>
            <div class="w-100p mt-15x">
                <div class="d-flex justify-content-space-between">
                    <div class="w-50p mr-10x">
                        <p class="font-14x">Password</p>
                        <input type="password" class="input-text mt-3x w-100p" value="" name="password">
                    </div>
                    <div class="w-50p ml-10x">
                        <p class="font-14x">Repeat Password</p>
                        <input type="password" class="input-text mt-3x w-100p" value="" name="repeat_password">
                    </div>
                </div>
            </div>
            <p class="font-12x mt-3x">*Empty these fields if not changing password</p>
            <div class="divider mt-15x"></div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Email</p>
                <input type="text" class="input-text mt-3x w-100p" value="{{ $data->email_email }}" name="email">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Phone Number</p>
                <input type="number" class="input-text mt-3x w-100p" value="{{ $data->phone_number }}" name="phone_number">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Address</p>
                <textarea type="text" class="input-text mt-3x w-100p" name="address">{{ $data->address }}</textarea>
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">LINE</p>
                <input type="text" class="input-text mt-3x w-100p" value="{{ $data->line }}" name="line">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Instagram</p>
                <input type="text" class="input-text mt-3x w-100p" value="{{ $data->instagram }}" name="instagram">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">LinkedIn</p>
                <input type="text" class="input-text mt-3x w-100p" value="{{ $data->linkedin }}" name="linkedin">
            </div>
            <br>
            <p class="text-align-right h-40x">
            <button type="submit" class="ml-15x btn btn-normal d-inline-flex">Save Changes</button>
            </p>
        </div>
    </div>
</form>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('settings-active')
active
@endsection