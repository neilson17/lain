@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x mb-15x justify-content-space-between">
    <h2>Events</h2>
    <div class="d-flex">
        <input type="text" class="input-text-merged-button">
        <a class="btn-merged-input btn" href="">Search</a>
        <a class="btn-normal btn ml-10x" href="{{route('date.create')}}">Add Events</a>
    </div>
</div>
<div class="flex-dir-col d-flex w-100p">
    @foreach($data as $d)
    <a href="">
        <div class="dashboard-list-item d-flex">
            <div class="d-flex">
                @if($d->clients_id != 1)
                    <!-- kalo client idnya 1 tag img dibawah gausa dimasukkan -->
                    <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
                @endif
                <div class="ml-10x">
                    <p class="dashboard-item-header">{{ $d->title }}</p>
                    <p class="font-12x">{{ $d->client_name }}</p>
                </div>
            </div>
            <p class="font-12x text-align-right">Due {{ $d->date }}</p>
        </div>
    </a>
    <div class="divider"></div>
    @endforeach
</div>
@endsection

@section('dashboard-active')
active
@endsection