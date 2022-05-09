@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Todo</h2>
<div id="notification-add-todo-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully added new todo</p>
</div>
<div id="notification-add-todo-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Failed to add new todo</p>
</div>
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        @csrf
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" required name="inptodotitle" class="input-text w-100p" placeholder="Todo Title">
            </div>
            <button class="ml-15x btn btn-normal" id="btn-new-todo">Save</button>
        </div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Deadline</p>
                <input type="datetime-local" name="inptododeadline" required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-datetime">
            </div>
            <div class="d-flex item-align-center input-todo-second-rows">
                <p class="font-14px d-flex">Client</p>
                <select class="ml-10x text-align-center h-30x pl-20x pr-20x" id="inptodoclientid">
                    @foreach($client as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="divider mt-15x mb-15x"></div>
        <div class="d-flex item-align-center h-30x">
            <p class="font-14px d-flex">Assign To</p>
            <select class="ml-10x text-align-center pl-20x pr-20x" name="" id='add-todo-add-assign-list'>
                @foreach($account as $a)
                    <option value="{{ $a->username }}">{{ $a->name }}</option>
                @endforeach
            </select>
            <button class="btn pt-5x pb-5x ml-10x" id='btn-add-todo-add-assign'>Add</button>
        </div>
        <div class="d-flex mt-10x flex-wrap" id="add-todo-assign-list"></div>
        <div class="divider mt-15x mb-15x"></div>
        <div class="d-flex input-todo-rows">
            <div class="d-flex mr-10x item-align-center">
                <p class="font-14px d-flex">Tag</p>
                <select class="ml-10x text-align-center pl-20x pr-20x" name="" id="add-todo-add-tag-list">
                    @foreach($tag as $t)
                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                </select>
                <button class="btn pt-5x pb-5x ml-10x" id="btn-add-todo-add-tag">Add</button>
            </div>
            <div class="d-flex item-align-center input-todo-second-rows">
                <input type="text" id="inpnewtag" class="input-text w-x" placeholder="New Tag">
                <button id="btn-new-tag" class="btn pt-5x pb-5x ml-10x">Create Tag</button>
            </div>
        </div>
        <div class="d-flex mt-10x flex-wrap" id="add-todo-tag-list"></div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <textarea id="inptododescription" cols="30" rows="10" class="input-text w-100p mw-100p"  placeholder="Todo Description"></textarea>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/add-todo.js')}}"></script>
@endsection

@section('todo-active')
active
@endsection