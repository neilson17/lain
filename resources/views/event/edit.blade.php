@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Edit Event - {{$data->title}}</h2>
<div id="notification-edit-event-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully edited event</p>
</div>
<div id="notification-edit-event-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Failed to edit event</p>
</div>

@csrf   
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" class="input-text w-100p" placeholder="Event Title" name="inptodotitle" value="{{$data->title}}">
                <input type="hidden" value="{{$data->id}}" id="inpeventid">
            </div>
            <button id="btn-edit-event" class="ml-15x btn btn-normal">Save</button>
        </div>
        <div class="d-flex item-align-center mt-10x">
            <p class="font-14px d-flex">Due</p>
            <input type="datetime-local" name="inpdate" value="{{date('Y-m-d\TH:i', strtotime($data->date))}}" class="ml-10x pt-5x pb-5x pl-10x pr-10x">
            <p class="font-14px ml-15x d-flex">Client</p>
            <select class="ml-10x text-align-center h-30x pl-20x pr-20x" id="inpclientid">
                @foreach($client as $c)
                    <option value="{{ $c->id }}" @if($c->id == $data->clients_id) selected @endif>{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
    <div class="divider mt-15x mb-15x"></div>
    <textarea id="inpdescription" id="" cols="30" rows="10" class="input-text w-100p mw-100p"  placeholder="Event Description">{{$data->description}}</textarea>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('event-active')
active
@endsection