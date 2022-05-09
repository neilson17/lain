@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x justify-content-space-between header-wrapper">
    <h2>Events</h2>
    <div class="d-flex search-add-wrapper">
        @csrf
        <input type="text" id="inpsearchevent" class="input-text-merged-button">
        <a class="btn-merged-input btn" id="btn-search-event" href="#">Search</a>
        <a class="btn-normal btn ml-10x" href="{{route('events.create')}}">Add Events</a>
    </div>
</div>

@if(session('status'))
<div id="notification-delete-event-success" class="mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully deleted event</p>
</div>
@endif

@if(session('error'))
<div id="notification-delete-event-fail" class="card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">{{session('error')}}</p>
</div>
@endif

<div class="flex-dir-col d-flex w-100p mt-15x" id="event-list-wrapper">
    @foreach($data as $d)
    <a href="{{ url('/events/'.$d->id) }}">
        <div class="dashboard-list-item d-flex">
            <div class="d-flex">
                @if($d->clients_id != 1)
                    <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
                @endif
                <div class="ml-10x">
                    <p class="dashboard-item-header">{{ $d->title }}</p>
                    @if($d->clients_id != 1)
                    <p class="font-12x">{{ $d->client_name }}</p>
                    @endif
                </div>
            </div>
            <p class="font-12x text-align-right">Due {{ $d->date }}</p>
        </div>
    </a>
    <div class="divider"></div>
    @endforeach
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('event-active')
active
@endsection