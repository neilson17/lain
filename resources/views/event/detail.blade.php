@extends('layout.bar')

@section('content')
<div class="card p-20x">
    <div class="d-flex item-align-center justify-content-space-between">
        <div>
            <h2>{{ $data->title }}</h2>
            @if ($client->id != 1)
            <p class="font-12x">{{ $client->name }}</p>
            @endif
        </div>
        <div class="d-flex item-align-center">
            <p class="font-12x">Due {{ $data->date }}</p>
            <div>
                <a class="ml-15x btn btn-normal" href="{{url('/todo/edit')}}">Edit</a>
                <a class="ml-10x btn btn-warning" href="">Delete</a>
            </div>
        </div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <p class="mt-15x font-14x">{{ $data->description }}</p>
</div>
@endsection

@section('event-active')
active
@endsection