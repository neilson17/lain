@extends('layout.bar')

@section('content')
<div class="card p-20x">
    <div class="d-flex justify-content-space-between item-align-end">
        <div>
            <h2>{{ $data->title }}</h2>
            <p class="font-12x">{{ $data->type }}
            @if ($client->id != 1)    
            - {{ $client->name }}
            @endif
            </p>
        </div>
        <div class="d-flex ">
            <div class="item-align-end d-flex">
                <p class="font-12x text-align-right"><b>Last Edited </b><br>{{ $data->date }}</p>
            </div>
            <a class="ml-15x btn btn-normal" href="{{url('/note/edit')}}">Edit</a>
            <a class="ml-10x btn btn-warning" href="">Delete</a>
        </div>
    </div>
    <div class="divider mt-10x mb-10x"></div>
    <p class="font-14x">
        {{ $data->content }}
    </p>
</div>
@endsection