@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Todo</h2>
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" class="input-text w-100p" placeholder="Todo Title">
            </div>
            <a class="ml-15x btn btn-normal" href="">Save</a>
        </div>
        <div class="d-flex item-align-center mt-10x">
            <p class="font-14px d-flex">Deadline</p>
            <input type="date" class="ml-10x pt-5x pb-5x pl-10x pr-10x">
            <p class="font-14px ml-15x d-flex">Client</p>
            <select class="ml-10x text-align-center h-30x pl-20x pr-20x" name="" id="">
                <option value="">-</option>
                @foreach($client as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="divider mt-15x mb-15x"></div>
        <div class="d-flex item-align-center h-30x">
            <p class="font-14px d-flex">Assign To</p>
            <select class="ml-10x text-align-center pl-20x pr-20x" name="" id="">
                <option value="">-</option>
                @foreach($account as $a)
                    <option value="{{ $a->username }}">{{ $a->name }}</option>
                @endforeach
            </select>
            <button class="btn pt-5x pb-5x ml-10x">Add</button>
        </div>
        <div class="d-flex mt-10x flex-wrap">
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x item-align-center d-flex">
                    <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
                    Neilson Soeratman
                </div>
                <span class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x item-align-center d-flex">
                    <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
                    Neilson Soeratman
                </div>
                <span class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x item-align-center d-flex">
                    <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
                    Neilson Soeratman
                </div>
                <span class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
        </div>
        <div class="divider mt-15x mb-15x"></div>
        <div class="d-flex item-align-center h-30x">
            <p class="font-14px d-flex">Tag</p>
            <select class="ml-10x text-align-center pl-20x pr-20x" name="" id="">
                <option value="">-</option>
                @foreach($tag as $t)
                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                @endforeach
            </select>
            <button class="btn pt-5x pb-5x ml-10x">Add</button>
            <input type="text" class="input-text ml-10x w-x">
            <button class="btn pt-5x pb-5x ml-10x">Create Tag</button>
        </div>
        <div class="d-flex mt-10x flex-wrap">
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x">Tag 1</div>
                <span class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x">Tag 1</div>
                <span class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x">Tag 1</div>
                <span class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
            <div class="position-relative">
                <div class="dashboard-tag-item font-12x">Tag 1</div>
                <span class="todo-tag-delete color-white text-align-center font-10x">x</span>
            </div>
        </div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <textarea name="" id="" cols="30" rows="10" class="input-text w-100p mw-100p"  placeholder="Todo Description"></textarea>
</div>
@endsection