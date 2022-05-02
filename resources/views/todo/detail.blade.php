@extends('layout.bar')

@section('content')
<div class="card p-20x">
    <div class="d-flex item-align-center justify-content-space-between">
        <div>
            <h2>namee</h2>
            <p class="font-12x"></p>
        </div>
        <div class="d-flex item-align-center">
            <p class="font-12x">Due 15 Apr 2022, 15.00</p>
            <div>
                <a class="ml-15x btn btn-normal" href="{{url('/todo/edit')}}">Edit</a>
                <a class="ml-10x btn btn-warning" href="">Delete</a>
            </div>
        </div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <div class="d-flex item-align-center">
        <input type="checkbox">
        <p class="font-14x ml-10x">Mark as Done</p>
    </div>
    <p class="mt-15x font-14x">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A expedita alias doloribus vitae consequatur nihil consequuntur cupiditate vero ab veniam deleniti eius unde praesentium, saepe, est, ea voluptatum magnam harum!</p>
    <div class="divider mt-15x mb-15x"></div>
    <h4>Collaborators</h4>
    <div class="d-flex mt-10x flex-wrap mb-10x">
        <div class="dashboard-tag-item font-12x item-align-center d-flex">
            <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
            Neilson Soeratman
        </div>
        <div class="dashboard-tag-item font-12x item-align-center d-flex">
            <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
            Neilson Soeratman
        </div>
        <div class="dashboard-tag-item font-12x item-align-center d-flex">
            <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
            Neilson Soeratman
        </div>
        <div class="dashboard-tag-item font-12x item-align-center d-flex">
            <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
            Neilson Soeratman
        </div>
    </div>
    <h4>Tags</h4>
    <div class="d-flex mt-10x flex-wrap">
        <div class="dashboard-tag-item font-12x">Tag 1</div>
        <div class="dashboard-tag-item font-12x">Tag 2</div>
        <div class="dashboard-tag-item font-12x">Tag 3</div>
        <div class="dashboard-tag-item font-12x">Tag 2</div>
        <div class="dashboard-tag-item font-12x">Tag 3</div>
        <div class="dashboard-tag-item font-12x">Tag 2</div>
        <div class="dashboard-tag-item font-12x">Tag 3</div>
    </div>
</div>
@endsection