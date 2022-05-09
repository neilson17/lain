@extends('layout.bar')

@section('content')
<div class="card p-20x">
    <div class="d-flex card-header-todo-detail">
        <div>
            <h2>{{ $data->title }}</h2>
            <p class="font-12x">{{ $data->type }}
            @if ($client->id != 1)    
            - {{ $client->name }}
            @endif
            </p>
        </div>
        <div class="d-flex item-align-center header-second-row-todo-detail">
            <div class="item-align-end d-flex">
                <p class="font-12x text-align-right"><b>Last Edited </b><br>{{ $data->date }}</p>
            </div>
            <div class="d-flex">
                <a class="ml-15x btn btn-normal" href="{{url('/notes/'.$data->id.'/edit')}}">Edit</a>
                <form method="POST" class="m-0 d-flex" id="delete-note-detail" action="{{url('notes/'.$data->id)}}">
                    @csrf
                    @method('DELETE')
                    <a id="btn-delete-note-detail" class="ml-10x btn btn-warning border-none" href="#">Delete</a>
                </form>
            </div>
        </div>
    </div>
    <div class="divider mt-10x mb-10x"></div>
    <p class="font-14x">
        {!! nl2br($data->content) !!}
    </p>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('note-active')
active
@endsection