@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Client</h2>
<form enctype="multipart/form-data">
<div id="notification-add-client-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully added new client</p>
</div>
<div id="notification-add-client-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Failed to add new client</p>
</div>
    @csrf
    <div class="d-flex justify-content-space-evenly mt-15x">
        <div class="d-flex flex-dir-col">
            <img src="https://i.pravatar.cc/300" alt="" class="w-175x img-avatar">
            <input type="file" class="mt-15x" accept=".jpg, .jpeg, .png" name="inpclientphotourl" id="inpclientphotourl">
        </div>
        <div class="d-flex flex-dir-col w-50p">
            <div class="w-100p">
                <p class="font-14x">Name</p>
                <input type="text" class="input-text mt-3x w-100p" name="inpclientname">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Description</p>
                <textarea type="text" class="input-text mt-3x w-100p" name="inpclientdescription" id="inpclientdescription"></textarea>
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14px">Job Category</p>
                <select class="mt-3x text-align-center h-30x pl-20x pr-20x" name="job_categories_id" id="inpclientjobcategories">
                    @foreach($job_categories as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Deadline</p>
                <input type="datetime-local" class="pt-5x pb-5x pl-10x mt-3x pr-10x" name="inpclientdeadline" id="inpclientdeadline">
            </div>
            <div class="divider mt-15x"></div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Email</p>
                <input type="text" class="input-text mt-3x w-100p" name="email" id="inpclientemail">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Phone Number</p>
                <input type="number" class="input-text mt-3x w-100p" name="inpclientphonenumber" id="inpclientphonenumber">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Instagram</p>
                <input type="text" class="input-text mt-3x w-100p" name="inpclientinstagram" id="inpclientinstagram">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">LinkedIn</p>
                <input type="text" class="input-text mt-3x w-100p" name="inpclientlinkedin" id="inpclientlinkedin">
            </div>
            <br>
            <p class="text-align-right h-40x">
                <button class="ml-15x btn btn-normal d-inline-flex" id="btn-new-client">Save</button>
            </p>
        </div>
    </div>
</form>
@endsection

@section('javascript')
<script src="{{asset('assets/js/add-client.js')}}"></script>
@endsection

@section('client-active')
active
@endsection