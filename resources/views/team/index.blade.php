@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x justify-content-space-between header-wrapper">
    <h2>Lain Group Team</h2>
    <div class="d-flex search-add-wrapper">
        @csrf
        <input type="text" id="inpsearchteam" class="input-text-merged-button">
        <a class="btn-merged-input btn" id="btn-search-team" href="#">Search</a>
        <a class="btn-normal btn ml-10x btn-add" href="{{route('teams.create')}}">Add Staff</a>
    </div>
</div>

@if(session('status'))
<div id="notification-delete-event-success" class="mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">{{ session('status') }}</p>
</div>
@endif

<div class="flex-dir-col d-flex w-100p mt-15x" id="team-list-wrapper">
    @foreach($data as $d)
        <div class="card p-10x team-list-item mt-15x">
            <div class="d-flex flex-dir-col">
                <div class="d-flex item-align-center justify-content-space-between">
                    <div class="d-flex item-align-center">
                        <img class="img-avatar h-50x" src="{{asset('assets/img/'.$d->photo_url)}}" alt="">
                        <div class="ml-10x">
                            <p class="dashboard-item-header">{{ $d->name }}</p>
                            <p class="font-12x">{{ $d->role }}</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <a class="btn btn-normal" href="{{url('/teams/'.$d->id.'/edit')}}">Edit</a>
                        <form method="POST" class="m-0 d-flex" id="delete-team-{{$d->id}}" action="{{url('teams/deleteaccount')}}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="inpdelusername" value="{{$d->id}}">
                            <a username="{{$d->id}}" class="btn-delete-team ml-10x btn btn-warning border-none" href="#">Delete</a>
                        </form>
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
                                <p class="font-12x overflow-wrap-anywhere">{{ $d->email_email }}</p>
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