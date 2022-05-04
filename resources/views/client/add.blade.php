@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Client</h2>
<form action="">
    <div class="d-flex justify-content-space-evenly mt-15x">
        <div class="d-flex flex-dir-col">
            <img src="https://i.pravatar.cc/300" alt="" class="w-175x img-avatar">
            <input type="file" class="mt-15x" accept=".jpg, .jpeg, .png">
        </div>
        <div class="d-flex flex-dir-col w-50p">
            <div class="w-100p">
                <p class="font-14x">Username</p>
                <input type="text" class="input-text mt-3x w-100p" disabled>
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Description</p>
                <textarea type="text" class="input-text mt-3x w-100p"></textarea>
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Deadline</p>
                <input type="datetime-local" class="pt-5x pb-5x pl-10x mt-3x pr-10x">
            </div>
            <div class="divider mt-15x"></div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Email</p>
                <input type="text" class="input-text mt-3x w-100p">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Phone Number</p>
                <input type="number" class="input-text mt-3x w-100p">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Instagram</p>
                <input type="text" class="input-text mt-3x w-100p">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">LinkedIn</p>
                <input type="text" class="input-text mt-3x w-100p">
            </div>
            <br>
            <p class="text-align-right h-40x">
                <a class="ml-15x btn btn-normal d-inline-flex" href="">Save</a>
            </p>
        </div>
    </div>
</form>
@endsection

@section('client-active')
active
@endsection