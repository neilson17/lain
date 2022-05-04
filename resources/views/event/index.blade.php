@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x mb-15x justify-content-space-between">
    <h2>Events</h2>
    <div class="d-flex">
        <form class="d-flex m-0" method="POST" id="search-event" action="{{route('events.searchEvent')}}">
            @csrf
            <input type="text" name="inpsearchevent" class="input-text-merged-button">
            <a class="btn-merged-input btn" id="btn-search-event" href="#">Search</a>
        </form>
        <a class="btn-normal btn ml-10x" href="{{route('events.create')}}">Add Events</a>
    </div>
</div>
<div class="flex-dir-col d-flex w-100p">
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