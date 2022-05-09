@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Edit Staff - {{$data->name}}</h2>
<form role="form" method="POST" action="{{url('teams/'.$data->username)}}" enctype="multipart/form-data">
@csrf
@method("PUT")
    <div class="d-flex justify-content-space-evenly mt-15x edit-team-wrapper">
        <div class="d-flex flex-dir-col image-edit-team-wrapper">
            <img src="{{asset('assets/img/'.$data->photo_url)}}" alt="" class="w-175x img-avatar" id="preview-image">
            <input type="file" class="mt-15x" accept=".jpg, .jpeg, .png" name="image" id="image">
        </div>
        <div class="d-flex flex-dir-col form-edit-team-wrapper">
            <div class="w-100p">
                <p class="font-14x">Username</p>
                <input type="text" class="input-text mt-3x w-100p" disabled value="{{ $data->username }}">
                <input type="hidden" value="{{ $data->username }}" name="username">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Name</p>
                <input type="text" class="input-text mt-3x w-100p" value="{{ $data->name }}" name="name">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Role</p>
                <select name="role" id="" class="pl-20x pr-20x pt-5x pb-5x mt-3x">
                    @foreach($role as $r)
                        <option value="{{ $r }}" @if($r == $data->role) selected @endif>{{ $r }}</option>
                    @endforeach
                </select>
            </div>
            <div class="divider mt-15x"></div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Email</p>
                <input type="text" class="input-text mt-3x w-100p" name="email" value="{{ $data->email }}">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Phone Number</p>
                <input type="number" class="input-text mt-3x w-100p" value="{{ $data->phone_number }}" name="phone_number">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Address</p>
                <textarea name="address" type="text" class="input-text mt-3x w-100p">{{ $data->name }}</textarea>
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
                <input type="text" class="input-text mt-3x w-100p" name="linkedin" value="{{ $data->linkedin }}">
            </div>
            <br>
            <p class="text-align-right h-40x">
                <button type="submit" class="ml-15x btn btn-normal d-inline-flex">Save Changes</button>
            </p>
        </div>
    </div>
</form>

<!-- <script type="text/javascript">
    $('#image').change(function(){
        $(document).ready(function (e) {
            $('#image').change(function(){    
                let reader = new FileReader();
                reader.onload = (e) => { 
                $('#preview-image').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });
        });
    });
</script> -->
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('team-active')
active
@endsection