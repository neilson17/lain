@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x mb-15x justify-content-space-between">
    <h2>Todo</h2>
    <div class="d-flex">
        <input type="text" class="input-text-merged-button">
        <a class="btn-merged-input btn" href="">Search</a>
        <a class="btn-normal btn ml-10x" href="{{route('todos.create')}}">Add Todo</a>
    </div>
</div>
<div class="flex-dir-col d-flex w-100p">
    @foreach($data as $d)
    <a href="{{ url('/todos/'.$d->id) }}">
        <div class="dashboard-list-item d-flex">
            <div class="d-flex item-align-center w-70p">
                <input type="checkbox">
                <div class="ml-10x">
                    <p class="dashboard-item-header">{{ $d->name }}</p>
                    <p class="font-12x">{{ $d->client_name }}</p>
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

@section('dashboard-active')
active
@endsection