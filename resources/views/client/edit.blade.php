@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Edit Client - {{$data->name}}</h2>
<form role="form" method="POST" action="{{url('clients/'.$data->id)}}" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="d-flex justify-content-space-evenly mt-15x edit-team-wrapper">
        <div class="d-flex flex-dir-col image-edit-team-wrapper">
            <img src="{{asset('assets/img/'.$data->photo_url)}}" alt="" class="w-175x img-avatar" id="preview-image">
            <input type="file" class="mt-15x" accept=".jpg, .jpeg, .png" name="image" id="image">
        </div>
        <div class="d-flex flex-dir-col form-edit-team-wrapper">
            <div class="w-100p">
                <p class="font-14x">Name</p>
                <input type="text" class="input-text mt-3x w-100p" value="{{ $data->name }}" name="name">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Description</p>
                <textarea type="text" class="input-text mt-3x w-100p" name="description">{{ $data->description }}</textarea>
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Deadline</p>
                <input type="datetime-local" class="pt-5x pb-5x pl-10x mt-3x pr-10x input-datetime" value="{{ $deadline }}" name="deadline">
            </div>
            <div class="divider mt-15x"></div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Email</p>
                <input type="text" class="input-text mt-3x w-100p" value="{{ $data->email }}" name="email">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Phone Number</p>
                <input type="number" class="input-text mt-3x w-100p" value="{{ $data->phone_number }}" name="phone_number">
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

@section('client-active')
active
@endsection