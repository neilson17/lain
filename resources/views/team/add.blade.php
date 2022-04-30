@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Staff</h2>
<form role="form" method="POST" action="{{url('teams')}}">
    @csrf
    <div class="d-flex mt-15x ml-20x">
        <div class="d-flex flex-dir-col w-50p">
            <div class="w-100p">
                <p class="font-14x">Username</p>
                <input type="text" class="input-text mt-3x w-100p" name="username">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Name</p>
                <input type="text" class="input-text mt-3x w-100p" name="name">
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Role</p>
                <select name="role" id="" class="pl-20x pr-20x pt-5x pb-5x mt-3x">
                    <option value="employee">Employee</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <br>
            <p class="text-align-right h-40x">
                <button class="ml-15x btn btn-normal d-inline-flex" type="submit">Save</button>
                <!-- <a class="ml-15x btn btn-normal d-inline-flex" href="">Save</a> -->
            </p>
        </div>
    </div>
</form>
@endsection