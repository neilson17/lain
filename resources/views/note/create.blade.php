@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Note</h2>
<div id="notification-add-note-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully created note</p>
</div>

<div id="notification-add-note-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Failed to create note</p>
</div>

@csrf
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" class="input-text w-100p" placeholder="Note Title" name="inpnotetitle" required>
            </div>
            <button id="btn-new-note" class="ml-15x btn btn-normal">Save</button>
        </div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Type</p>
                <select class="ml-10x text-align-center pl-20x h-30x pr-20x" name="inpnotetype" id="inpnotetype">
                    <option value="private">Private</option>
                    <option value="public">Public</option>
                </select>
            </div>
            <div class="d-flex item-align-center input-todo-second-rows">
                <p class="font-14px d-flex">Client</p>
                <select class="ml-10x text-align-center pl-20x h-30x pr-20x" name="inpnoteclientsid" id="inpnoteclientsid">
                    @foreach($client as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="divider mt-10x mb-10x"></div>
    <textarea id="" cols="30" rows="10" class="input-text w-100p mw-100p"  placeholder="Note Content" name="inpnotecontent" id="inpnotecontent"></textarea>
</div>

@endsection

@section('javascript')
<script src="{{asset('assets/js/add-note.js')}}"></script>
@endsection

@section('note-active')
active
@endsection