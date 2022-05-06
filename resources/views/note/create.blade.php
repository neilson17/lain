@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Add Note</h2>
{{-- <form role="form" method="POST" action = "{{url('notes')}}"> --}}
{{-- @csrf --}}
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" class="input-text w-100p" placeholder="Note Title" name="title">
            </div>
            <button type="submit" class="ml-15x btn btn-normal">Save</button>
        </div>
        <br>
        <div class="d-flex item-align-center">
            <p class="font-14px d-flex">Type</p>
            <select class="ml-10x text-align-center pl-20x pr-20x" name="type" id="">
                <option value="private">Private</option>
                <option value="public">Public</option>
            </select>
            <p class="ml-30x font-14px d-flex">Client</p>
            <select class="ml-10x text-align-center pl-20x pr-20x" name="clients_id" id="">
                <option value="">-</option>
                @foreach($client as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="divider mt-10x mb-10x"></div>
    <textarea id="" cols="30" rows="10" class="input-text w-100p mw-100p"  placeholder="Note Content" name="content"></textarea>
</div>
{{-- </form> --}}
@endsection