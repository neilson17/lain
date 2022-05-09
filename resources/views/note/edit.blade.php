@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Editing Note - {{$data->title}}</h2>

<div id="notification-edit-note-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully edited note</p>
</div>
<div id="notification-edit-note-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Failed to edit note</p>
</div>

@csrf
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" class="input-text w-100p" placeholder="Note Title" name="inpnotetitle" value="{{$data->title}}" required>
                <input type="hidden" value="{{$data->id}}" id="inpnoteid">
            </div>
            <button id="btn-edit-note" class="ml-15x btn btn-normal">Save</button>
        </div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Type</p>
                <select class="ml-10x text-align-center h-30x pl-20x pr-20x" name="inpnotetype" id="inpnotetype">
                    <option value="private" @if($data->type == "private") selected @endif>Private</option>
                    <option value="public" @if($data->type == "public") selected @endif>Public</option>
                </select>
            </div>
            <div class="d-flex item-align-center input-todo-second-rows">
                <p class="font-14px d-flex">Client</p>
                <select class="ml-10x text-align-center h-30x pl-20x pr-20x" name="inpnoteclientsid" id="inpnoteclientsid">
                    @foreach($client as $c)
                        <option value="{{ $c->id }}" @if($c->id == $data->clients_id) selected @endif>{{ $c->name }}</option>
                    @endforeach
                </select>
        </div>
        </div>
    </div>
    <div class="divider mt-10x mb-10x"></div>
    <textarea cols="30" rows="10" id="inpnotecontent" class="input-text w-100p mw-100p"  placeholder="Note Content">{{$data->content}}</textarea>
</div>

@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('note-active')
active
@endsection