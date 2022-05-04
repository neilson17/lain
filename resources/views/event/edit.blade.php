@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Edit Event - Event Title</h2>
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" class="input-text w-100p" placeholder="Event Title">
            </div>
            <a class="ml-15x btn btn-normal" href="">Save</a>
        </div>
        <div class="d-flex item-align-center mt-10x">
            <p class="font-14px d-flex">Due</p>
            <input type="date" class="ml-10x pt-5x pb-5x pl-10x pr-10x">
            <p class="font-14px ml-15x d-flex">Client</p>
            <select class="ml-10x text-align-center h-30x pl-20x pr-20x" name="" id="">
                <option value="">-</option>
                <option value="">Kuraku</option>
            </select>
        </div>
    <div class="divider mt-15x mb-15x"></div>
    <textarea name="" id="" cols="30" rows="10" class="input-text w-100p mw-100p"  placeholder="Event Description"></textarea>
</div>
@endsection

@section('event-active')
active
@endsection