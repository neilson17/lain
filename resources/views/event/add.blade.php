@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Event</h2>

<div id="notification-add-event-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully created event</p>
</div>

<div id="notification-add-event-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Failed to create event</p>
</div>

@csrf   
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" class="input-text w-100p" placeholder="Event Title" name="inptodotitle">
            </div>
            <button id="btn-new-event" class="ml-15x btn btn-normal">Save</button>
        </div>
        <div class="d-flex item-align-center mt-10x">
            <p class="font-14px d-flex">Due</p>
            <input type="datetime-local" name="inpdate" class="ml-10x pt-5x pb-5x pl-10x pr-10x">
            <p class="font-14px ml-15x d-flex">Client</p>
            <select class="ml-10x text-align-center h-30x pl-20x pr-20x" id="inpclientid">
                @foreach($client as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
    <div class="divider mt-15x mb-15x"></div>
    <textarea id="inpdescription" id="" cols="30" rows="10" class="input-text w-100p mw-100p"  placeholder="Event Description"></textarea>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/add-event.js')}}"></script>
@endsection

@section('event-active')
active
@endsection