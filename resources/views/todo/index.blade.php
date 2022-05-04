@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x mb-15x justify-content-space-between">
    <h2>Todo</h2>
    <div class="d-flex">
        <form class="d-flex m-0" method="POST" id="search-todo" action="{{route('todos.searchTodo')}}">
            @csrf
            <input type="text" name="inpsearchtodo" class="input-text-merged-button">
            <a type="submit" class="btn-merged-input btn" id="btn-search-todo" href="#">Search</a>
        </form>
        <a class="btn-normal btn ml-10x" href="{{route('todos.create')}}">Add Todo</a>
    </div>
</div>
<div class="flex-dir-col d-flex w-100p mt-15x">
    @foreach($data as $d)
    <a href="{{ url('/todos/'.$d->id) }}">
        <div class="dashboard-list-item d-flex">
            <div class="d-flex item-align-center w-70p">
                <input id="{{$d->id}}" class="done-todo-list" type="checkbox" @if($d->done == 1) checked @endif >
                <div class="ml-10x">
                    <p class="dashboard-item-header">{{ $d->name }}</p>
                    @if ($d->client_id != 1)
                    <p class="font-12x">{{ $d->client_name }}</p>
                    @endif
                </div>
            </div>
            <div class="w-30p">
                <p class="font-12x text-align-right">Due {{ $d->deadline }}</p>
            </div>
        </div>
    </a>
    <div class="divider"></div>
    @endforeach
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('todo-active')
active
@endsection