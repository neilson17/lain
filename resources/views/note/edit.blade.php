@extends('layout.bar')

@section('content')
<h2 class="ml-20x">Editing Note - Note Title</h2>
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" class="input-text w-100p" placeholder="Note Title">
            </div>
            <a class="ml-15x btn btn-normal" href="">Save</a>
        </div>
        <br>
        <div class="d-flex item-align-center">
            <p class="font-14px d-flex">Type</p>
            <select class="ml-10x text-align-center pl-20x pr-20x" name="" id="">
                <option value="">Private</option>
                <option value="">Public</option>
            </select>
            <p class="ml-30x font-14px d-flex">Client</p>
            <select class="ml-10x text-align-center pl-20x pr-20x" name="" id="">
                <option value="">-</option>
                <option value="">Kuraku</option>
            </select>

        </div>
    </div>
    <div class="divider mt-10x mb-10x"></div>
    <textarea name="" id="" cols="30" rows="10" class="input-text w-100p mw-100p"  placeholder="Note Content"></textarea>
</div>
@endsection