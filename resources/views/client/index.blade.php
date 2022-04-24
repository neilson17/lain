@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x justify-content-space-between">
    <h2>Lain Group Client</h2>
    <div class="d-flex">
        <input type="text" class="input-text-merged-button">
        <a class="btn-merged-input btn" href="">Search</a>
        <a class="btn-normal btn ml-10x" href="">Add Client</a>
    </div>
</div>
<a href="">
    <div class="card p-10x client-list-item mt-15x dashboard-list-item d-flex">
        <div class="d-flex w-70p item-align-center">
            <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
            <div class="ml-10x mr-10x w-100p">
                <div class="d-flex item-align-end">
                    <p class="dashboard-item-header">Client Deadline</p>
                    <p class="font-12x ml-5x">(Website)</p>
                </div>
                <progress class="w-80p" id="progressclientdashboard" value="32" max="100"></progress>
                <label for="progressclientdashboard" class="font-14x">10%</label>
                <p class="font-12x">Task Done: 14/20</p>
            </div>
        </div>
        <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p> 
    </div>
</a>
<a href="">
    <div class="card p-10x client-list-item mt-15x dashboard-list-item d-flex">
        <div class="d-flex w-70p item-align-center">
            <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
            <div class="ml-10x mr-10x w-100p">
                <div class="d-flex item-align-end">
                    <p class="dashboard-item-header">Client Deadline</p>
                    <p class="font-12x ml-5x">(Website)</p>
                </div>
                <progress class="w-80p" id="progressclientdashboard" value="32" max="100"></progress>
                <label for="progressclientdashboard" class="font-14x">10%</label>
                <p class="font-12x">Task Done: 14/20</p>
            </div>
        </div>
        <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p> 
    </div>
</a>
<a href="">
    <div class="card p-10x client-list-item mt-15x dashboard-list-item d-flex">
        <div class="d-flex w-70p item-align-center">
            <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
            <div class="ml-10x mr-10x w-100p">
                <div class="d-flex item-align-end">
                    <p class="dashboard-item-header">Client Deadline</p>
                    <p class="font-12x ml-5x">(Website)</p>
                </div>
                <progress class="w-80p" id="progressclientdashboard" value="32" max="100"></progress>
                <label for="progressclientdashboard" class="font-14x">10%</label>
                <p class="font-12x">Task Done: 14/20</p>
            </div>
        </div>
        <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p> 
    </div>
</a>
@endsection

@section('client-active')
active
@endsection