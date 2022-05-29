@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Staff</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="d-flex add-team-wrapper">
        <div class="d-flex flex-dir-col form-edit-team-wrapper">
            <div class="w-100p">
                <p class="font-14x">Username</p>
                <input id="username" type="text" class="input-text mt-3x w-100p @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Name</p>
                <input id="name" type="text" class="input-text mt-3x w-100p @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Role</p>
                <select name="role" id="role" class="pl-20x pr-20x pt-5x pb-5x mt-3x">
                    <option value="employee">Employee</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="w-100p mt-15x">
                <p class="font-14x">Password</p>
                <input id="password" type="password" class="input-text mt-3x w-100p @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="w-100p mt-15x">
                <p class="font-14x">Confirm Password</p>
                <input id="password-confirm" type="password" class="input-text mt-3x w-100p form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
            <br>
            <p class="text-align-right h-40x">
                <button class="ml-15x btn btn-normal d-inline-flex" type="submit">Save</button>
            </p>
        </div>
    </div>
</form>
@endsection

@section('team-active')
active
@endsection