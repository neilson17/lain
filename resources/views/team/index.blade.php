@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x justify-content-space-between">
    <h2>Lain Group Team</h2>
    <div class="d-flex">
        <form class="d-flex m-0" method="POST" id="search-team" action="{{route('teams.searchTeam')}}">
            @csrf
            <input type="text" name="inpsearchteam" class="input-text-merged-button">
            <a type="submit" class="btn-merged-input btn" id="btn-search-team" href="#">Search</a>
        </form>
        <a class="btn-normal btn ml-10x" href="{{route('teams.create')}}">Add Staff</a>
    </div>
</div>
<div class="flex-dir-col d-flex w-100p">
    @foreach($data as $d)
        <div class="card p-10x team-list-item mt-15x">
            <div class="d-flex flex-dir-col">
                <div class="d-flex item-align-center justify-content-space-between">
                    <div class="d-flex item-align-center">
                        <img class="img-avatar h-50x" src="https://i.pravatar.cc/300" alt="">
                        <div class="ml-10x">
                            <p class="dashboard-item-header">{{ $d->name }}</p>
                            <p class="font-12x">{{ $d->role }}</p>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-normal" href="{{url('/teams/edit')}}">Edit</a>
                        <a class="ml-10x btn btn-warning" href="">Delete</a>
                    </div>
                </div>
                <div class="divider mt-15x"></div>
                <div class="d-flex flex-dir-col">
                    <br>
                    <p class="font-12x text-align-center"><b>Address</b></p>
                    <p class="font-12x text-align-center">{{ $d->address }}</p>
                    <br>
                    <div class="d-flex">
                        <div class="w-50p d-flex justify-content-end">
                            <div class="d-flex flex-dir-col">
                                <p class="font-12x text-align-right"><b>Email</b></p>
                                <p class="font-12x text-align-right"><b>Phone</b></p>
                            </div>
                            <div class="d-flex flex-dir-col ml-10x">
                                <p class="font-12x">{{ $d->email }}</p>
                                <p class="font-12x">{{ $d->phone_number }}</p>
                            </div>
                        </div> 
                        <div class="w-50p d-flex ml-20x">
                            <div class="d-flex flex-dir-col ">
                                <p class="font-12x text-align-right"><b>LINE</b></p>
                                <p class="font-12x text-align-right"><b>Instagram</b></p>
                                <p class="font-12x text-align-right"><b>LinkedIn</b></p>
                            </div>
                            <div class="d-flex flex-dir-col ml-10x">
                                <p class="font-12x">{{ $d->line }}</p>
                                <p class="font-12x">{{ $d->instagram }}</p>
                                <p class="font-12x">{{ $d->linkedin }}</p>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('team-active')
active
@endsection