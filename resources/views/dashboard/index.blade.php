@extends('layout.bar')

@section('content')
<div class="dashboard-page-content w-100p h-100p">
    <div class="card p-20x">
        <h3>Revenue</h3>
    </div>
    <div class="card p-20x">
        <!-- Cuma liatin mentok 5 client aja tapi diurutin dari deadline terdekat -->
        <div class="justify-content-space-between d-flex mb-15x">
            <h3>Clients</h3>
            <a class="font-14x" href="{{url('/clients')}}">See More ></a>
        </div>
        <div class="sidebar-list-wrapper d-flex">
            @foreach($clients as $c)
            <a href="{{ url('/clients/'.$c['data']->id) }}">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex w-70p item-align-center">
                        <img class="img-avatar h-40x" src="{{asset('assets/img/'.$c['data']->photo_url)}}" alt="">
                        <div class="ml-10x mr-10x w-100p">
                            <p class="dashboard-item-header">{{$c['data']->name}}</p>
                            <progress class="w-80p" id="progressclientdashboard" value="{{ $c['percentage'] * 100 }}" max="100"></progress>
                            <label for="progressclientdashboard" class="font-14x">{{ $c["percentage"] * 100 }}%</label>
                            <p class="font-12x">Task Done: {{ $c["taskDone"] }}/{{ $c["totalTask"] }}</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due {{$c['data']->deadline}}</p>
                </div>
            </a>
            <div class="divider"></div>
            @endforeach
        </div>
    </div>
    <div class="card p-20x">
        <div class="justify-content-space-between d-flex mb-15x item-align-center">
            <h3>Upcoming Events</h3>
            <div class="d-flex item-align-center">
                <p class="mr-10x font-14x">Range: </p>
                <select class="pr-20x pl-20x" id="range-event-dashboard">
                    <option value="1">1 day</option>
                    <option value="3">3 days</option>
                    <option value="7">7 days</option>
                    <option value="15">15 days</option>
                    <option value="30">30 days</option>
                    <option value="100" selected>All Upcoming</option>
                    <option value="200">All</option>
                </select>
                <a class="ml-10x font-14x" href="{{url('/events')}}">See More ></a>
            </div>
        </div>
        <div class="sidebar-list-wrapper d-flex">
            @foreach($events as $d)
            <a href="{{ url('/events/'.$d->id) }}">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex">
                        @if($d->clients_id != 1)
                            <img class="img-avatar h-40x" src="{{asset('assets/img/'.$d->client->photo_url)}}" alt="">
                        @endif
                        <div class="ml-10x">
                            <p class="dashboard-item-header">{{ $d->title }}</p>
                            @if($d->clients_id != 1)
                            <p class="font-12x">{{ $d->client->name }}</p>
                            @endif
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due {{ $d->date }}</p>
                </div>
            </a>
            <div class="divider"></div>
            @endforeach
        </div>
        <p class="text-align-right pb-10x pt-10x">
            <br>
            <a class="btn-normal btn" href="">Add Reminder</a>
        </p>
    </div>
    <div class="card p-20x">
        <div class="justify-content-space-between d-flex mb-15x">
            <h3>To Dos</h3>
            <div class="d-flex item-align-center">
                <p class="mr-10x font-14x">Range: </p>
                <select class="pr-20x pl-20x" id="range-todo-dashboard">
                    <option value="1">1 day</option>
                    <option value="3">3 days</option>
                    <option value="7">7 days</option>
                    <option value="15">15 days</option>
                    <option value="30">30 days</option>
                    <option value="100">All Upcoming</option>
                    <option value="200" selected>All Not Done</option>
                    <option value="300">All</option>
                </select>
                <a class="ml-10x font-14x" href="{{url('todos')}}">See More ></a>
            </div>
        </div>
        @foreach($todos as $d)
        <a href="{{ url('/todos/'.$d->id) }}">
            <div class="dashboard-list-item d-flex">
                <div class="d-flex item-align-center w-70p">
                    <input id="{{$d->id}}" class="done-todo-list" type="checkbox" @if($d->done == 1) checked @endif >
                    @if ($d->clients_id != 1)
                    <img class="img-avatar ml-10x h-40x" src="{{asset('assets/img/'.$d->client->photo_url)}}" alt="">
                    @endif
                    <div class="ml-10x">
                        <p class="dashboard-item-header">{{ $d->name }}</p>
                        @if ($d->clients_id != 1)
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
        <p class="text-align-right pb-10x pt-10x">
            <br>
            <a class="btn-normal btn" href="{{url('/todos/create')}}">Add Todo</a>
        </p>
    </div>
</div>
@endsection

@section('dashboard-active')
active
@endsection