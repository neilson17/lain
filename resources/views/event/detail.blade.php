@extends('layout.bar')

@section('content')
<div class="card p-20x">
    <div class="d-flex card-header-todo-detail">
        <div>
            <h2>{{ $data->title }}</h2>
            @if ($client->id != 1)
            <p class="font-12x">{{ $client->name }}</p>
            @endif
        </div>
        <div class="d-flex item-align-center header-second-row-todo-detail">
            <p class="font-12x">Due {{ $data->date }}</p>
            <div class="d-flex">
                <a class="ml-15x btn btn-normal" href="{{url('/events/'.$data->id.'/edit')}}">Edit</a>
                <form method="POST" class="m-0 d-flex" id="delete-event-detail" action="{{url('events/'.$data->id)}}">
                    @csrf
                    @method('DELETE')
                    <a id="btn-delete-event-detail" class="ml-10x btn btn-warning border-none" href="#">Delete</a>
                </form>
            </div>
        </div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <p class="mt-15x font-14x">{!! nl2br($data->description) !!}</p>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('event-active')
active
@endsection