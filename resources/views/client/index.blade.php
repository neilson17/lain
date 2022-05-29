@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x justify-content-space-between header-wrapper">
    <h2>Lain Group Client</h2>
    <div class="d-flex search-add-wrapper">
        @csrf
        <input type="text" id="inpsearchclient" class="input-text-merged-button">
        <a class="btn-merged-input btn" id="btn-search-client" href="#">Search</a>
        @can('admin-only')
        <a class="btn-normal btn ml-10x" href="{{route('clients.create')}}">Add Client</a>
        @endcan
    </div>
</div>
@if(session('status'))
    <div id="notification-add-event-success" class="mt-15x card-progress p-15x d-flex item-align-center">
        <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
        <p class="ml-15x">{{session('status')}}</p>
    </div>
@endif

@if(session('deletesuccess'))
<div id="notification-delete-event-success" class="mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully deleted client</p>
</div>
@endif

@if(session('deleteerror'))
<div id="notification-delete-event-fail" class="card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">{{session('deleteerror')}}</p>
</div>
@endif

<div id="client-list-wrapper">
    @foreach($data as $d)
    <a href="{{ url('/clients/'.$d['data']->id) }}">
        <div class="card p-10x client-list-item mt-15x dashboard-list-item d-flex">
            <div class="d-flex w-70p item-align-center">
                <img class="img-avatar h-40x" src="{{asset('assets/img/'.$d['data']->photo_url)}}" alt="">
                <div class="ml-10x mr-10x w-100p">
                    <div class="d-flex item-align-end">
                        <p class="dashboard-item-header">{{ $d["data"]->name }}</p>
                        <p class="font-12x ml-5x">({{ $d["data"]->job_category->name }})</p>
                    </div>
                    <progress class="w-80p" id="progressclientdashboard" value="{{ $d['percentage'] * 100 }}" max="100"></progress>
                    <label for="progressclientdashboard" class="font-14x">{{ $d["percentage"] * 100 }}%</label>
                    <p class="font-12x">Task Done: {{ $d["taskDone"] }}/{{ $d["totalTask"] }}</p>
                </div>
            </div>
            <p class="font-12x text-align-right">Due {{ $d["formatted_date"] }}</p> 
        </div>
    </a>
    @endforeach
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('client-active')
active
@endsection