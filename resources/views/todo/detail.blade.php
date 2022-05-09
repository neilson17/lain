@extends('layout.bar')

@section('content')
@csrf
<div class="card p-20x">
    <div class="d-flex card-header-todo-detail">
        <div>
            <h2>{{ $data->name }}</h2>
            @if($client->id != 1)
            <p class="font-12x">{{$client->name}}</p>
            @endif
        </div>
        <div class="d-flex item-align-center header-second-row-todo-detail">
            <p class="font-12x">Due {{ $date }}</p>
            <div class="d-flex">
                <a class="ml-15x btn btn-normal" href="{{url('/todos/'.$data->id.'/edit')}}">Edit</a>
                <form method="POST" class="m-0 d-flex" id="delete-todo-detail" action="{{url('todos/'.$data->id)}}">
                    @csrf
                    @method('DELETE')
                    <a id="btn-delete-todo-detail" class="ml-10x btn btn-warning border-none" href="#">Delete</a>
                </form>
            </div>
        </div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <div class="d-flex item-align-center">
        <input id="{{$data->id}}" class="done-todo-list" type="checkbox"  @if($data->done == 1) checked @endif>
        <p class="font-14x ml-10x">Mark as Done</p>
    </div>
    <p class="mt-15x font-14x">{!! nl2br($data->description) !!}</p>
    <div class="divider mt-15x mb-15x"></div>
    <h4>Collaborators</h4>
    <div class="d-flex mt-10x flex-wrap mb-10x">
        @foreach($account as $a)
        <div class="dashboard-tag-item font-12x item-align-center d-flex">
            <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
            {{ $a->name }}
        </div>
        @endforeach
    </div>
    <h4>Tags</h4>
    <div class="d-flex mt-10x flex-wrap">
        @foreach($tag as $t)
            <div class="dashboard-tag-item font-12x">{{ $t->name }}</div>
        @endforeach
    </div>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('todo-active')
active
@endsection