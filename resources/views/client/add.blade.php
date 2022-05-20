@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Client</h2>
<form role="form" method="POST" action="{{url('clients')}}" enctype="multipart/form-data">
    @csrf
    <div class="d-flex justify-content-space-evenly mt-15x edit-team-wrapper">
        <div class="d-flex flex-dir-col image-edit-team-wrapper">
            <img src="https://i.pravatar.cc/300" alt="" class="w-175x img-avatar" id="preview-image">
            <input type="file" class="mt-15x" accept=".jpg, .jpeg, .png" name="inpclientphotourl" id="image">
        </div>
        <div class="d-flex flex-dir-col form-edit-team-wrapper">
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
                <input type="datetime-local" class="pt-5x pb-5x pl-10x mt-3x pr-10x input-datetime" name="inpclientdeadline" id="inpclientdeadline">
            </div>
            <div class="divider mt-15x"></div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Email</p>
                <input type="text" class="input-text mt-3x w-100p" name="inpclientemail" id="inpclientemail">
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
                <p class="font-14x">Link</p>
                <input type="text" class="input-text mt-3x w-100p" name="inpclientlinkedin" id="inpclientlinkedin">
            </div>
            <br>
            <p class="text-align-right h-40x">
                <button type="submit" class="ml-15x btn btn-normal d-inline-flex">Save</button>
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