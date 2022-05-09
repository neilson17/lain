@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Edit Todo - {{$data->name}}</h2>
<div id="notification-edit-todo-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully edited todo</p>
</div>
<div id="notification-edit-todo-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Failed to edit todo</p>
</div>
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        @csrf
        <input type="hidden" value="{{$data->id}}" id="inptodoid">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" value="{{$data->name}}" required name="inptodotitle" class="input-text w-100p" placeholder="Todo Title">
            </div>
            <button class="ml-15x btn btn-normal" id="btn-edit-todo">Save</button>
        </div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Deadline</p>
                <input type="datetime-local" value="{{date('Y-m-d\TH:i', strtotime($data->deadline))}}" name="inptododeadline" required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-datetime">
            </div>
            <div class="d-flex item-align-center input-todo-second-rows">
                <p class="font-14px d-flex">Client</p>
                <select class="ml-10x text-align-center h-30x pl-20x pr-20x" id="inptodoclientid">
                    @foreach($client as $c)
                        <option value="{{ $c->id }}" @if($c->id == $data->clients_id) selected @endif>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="divider mt-15x mb-15x"></div>
        <div class="d-flex item-align-center h-30x">
            <p class="font-14px d-flex">Assign To</p>
            <select class="ml-10x text-align-center pl-20x pr-20x" name="" id='edit-todo-add-assign-list'>
                @foreach($accountNotAdded as $a)
                    <option value="{{ $a->username }}">{{ $a->name }}</option>
                @endforeach
            </select>
            <button class="btn pt-5x pb-5x ml-10x" id='btn-edit-todo-add-assign'>Add</button>
        </div>
        <div class="d-flex mt-10x flex-wrap" id="edit-todo-assign-list">
            @foreach($accountAdded as $a)
                <div class="position-relative">
                    <div class="dashboard-tag-item font-12x item-align-center d-flex">
                        <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
                        {{$a->name}}
                    </div>
                    <span username="{{$a->username}}" assignname="{{$a->name}}" class="todo-assign-delete color-white text-align-center font-10x">x</span>
                </div>
            @endforeach
        </div>
        <div class="divider mt-15x mb-15x"></div>
        <div class="d-flex input-todo-rows">
            <div class="d-flex mr-10x item-align-center">
                <p class="font-14px d-flex">Tag</p>
                <select class="ml-10x text-align-center pl-20x pr-20x" name="" id="edit-todo-add-tag-list">
                    @foreach($tagNotAdded as $t)
                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                </select>
                <button class="btn pt-5x pb-5x ml-10x" id="btn-edit-todo-add-tag">Add</button>
            </div>
            <div class="d-flex item-align-center input-todo-second-rows">
                <input type="text" id="inpnewtag" class="input-text w-x" placeholder="New Tag">
                <button id="btn-new-tag" class="btn pt-5x pb-5x ml-10x">Create Tag</button>
            </div>
        </div>
        <div class="d-flex mt-10x flex-wrap" id="edit-todo-tag-list">
            @foreach($tagAdded as $t)
                <div class="position-relative">
                    <div class="dashboard-tag-item font-12x">{{$t->name}}</div>
                    <span id="{{$t->id}}" tagname="{{$t->name}}" class="todo-tag-delete color-white text-align-center font-10x">x</span>
                </div>
            @endforeach
        </div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <textarea id="inptododescription" cols="30" rows="10" class="input-text w-100p mw-100p" placeholder="Todo Description">{{$data->description}}</textarea>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/edit-todo.js')}}"></script>
@endsection

@section('todo-active')
active
@endsection