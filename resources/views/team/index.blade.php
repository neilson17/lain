@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x justify-content-space-between">
    <h2>Lain Group Team</h2>
    <div class="d-flex">
        <input type="text" class="input-text-merged-button">
        <a class="btn-merged-input btn" href="">Search</a>
        <a class="btn-normal btn ml-10x" href="{{url('/team/add')}}">Add Staff</a>
    </div>
</div>
<div class="flex-dir-col d-flex w-100p">
    <div class="card p-10x team-list-item mt-15x">
        <div class="d-flex flex-dir-col">
            <div class="d-flex item-align-center justify-content-space-between">
                <div class="d-flex item-align-center">
                    <img class="img-avatar h-50x" src="https://i.pravatar.cc/300" alt="">
                    <div class="ml-10x">
                        <p class="dashboard-item-header">Staff Name</p>
                        <p class="font-12x">Employee</p>
                    </div>
                </div>
                <div>
                    <a class="btn btn-normal" href="{{url('/team/edit')}}">Edit</a>
                    <a class="ml-10x btn btn-warning" href="">Delete</a>
                </div>
            </div>
            <div class="divider mt-15x"></div>
            <div class="d-flex flex-dir-col">
                <br>
                <p class="font-12x text-align-center"><b>Address</b></p>
                <p class="font-12x text-align-center">Jl. Raya Semampir Barat no. 2</p>
                <br>
                <div class="d-flex">
                    <div class="w-50p d-flex justify-content-end">
                        <div class="d-flex flex-dir-col">
                            <p class="font-12x text-align-right"><b>Email</b></p>
                            <p class="font-12x text-align-right"><b>Phone</b></p>
                        </div>
                        <div class="d-flex flex-dir-col ml-10x">
                            <p class="font-12x">neil@mail.com</p>
                            <p class="font-12x">082337363440</p>
                        </div>
                    </div> 
                    <div class="w-50p d-flex ml-20x">
                        <div class="d-flex flex-dir-col ">
                            <p class="font-12x text-align-right"><b>LINE</b></p>
                            <p class="font-12x text-align-right"><b>Instagram</b></p>
                            <p class="font-12x text-align-right"><b>LinkedIn</b></p>
                        </div>
                        <div class="d-flex flex-dir-col ml-10x">
                            <p class="font-12x">neilson1907</p>
                            <p class="font-12x">neilson.17</p>
                            <p class="font-12x">neilson.soeratman</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="card p-10x team-list-item mt-15x">
        <div class="d-flex flex-dir-col">
            <div class="d-flex item-align-center justify-content-space-between">
                <div class="d-flex item-align-center">
                    <img class="img-avatar h-50x" src="https://i.pravatar.cc/300" alt="">
                    <div class="ml-10x">
                        <p class="dashboard-item-header">Staff Name</p>
                        <p class="font-12x">Employee</p>
                    </div>
                </div>
                <div>
                    <a class="btn btn-normal" href="{{url('/team/edit')}}">Edit</a>
                    <a class="ml-10x btn btn-warning" href="">Delete</a>
                </div>
            </div>
            <div class="divider mt-15x"></div>
            <div class="d-flex flex-dir-col">
                <br>
                <p class="font-12x text-align-center"><b>Address</b></p>
                <p class="font-12x text-align-center">Jl. Raya Semampir Barat no. 2</p>
                <br>
                <div class="d-flex">
                    <div class="w-50p d-flex justify-content-end">
                        <div class="d-flex flex-dir-col">
                            <p class="font-12x text-align-right"><b>Email</b></p>
                            <p class="font-12x text-align-right"><b>Phone</b></p>
                        </div>
                        <div class="d-flex flex-dir-col ml-10x">
                            <p class="font-12x">neil@mail.com</p>
                            <p class="font-12x">082337363440</p>
                        </div>
                    </div> 
                    <div class="w-50p d-flex ml-20x">
                        <div class="d-flex flex-dir-col ">
                            <p class="font-12x text-align-right"><b>LINE</b></p>
                            <p class="font-12x text-align-right"><b>Instagram</b></p>
                            <p class="font-12x text-align-right"><b>LinkedIn</b></p>
                        </div>
                        <div class="d-flex flex-dir-col ml-10x">
                            <p class="font-12x">neilson1907</p>
                            <p class="font-12x">neilson.17</p>
                            <p class="font-12x">neilson.soeratman</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="card p-10x team-list-item mt-15x">
        <div class="d-flex flex-dir-col">
            <div class="d-flex item-align-center justify-content-space-between">
                <div class="d-flex item-align-center">
                    <img class="img-avatar h-50x" src="https://i.pravatar.cc/300" alt="">
                    <div class="ml-10x">
                        <p class="dashboard-item-header">Staff Name</p>
                        <p class="font-12x">Employee</p>
                    </div>
                </div>
                <div>
                    <a class="btn btn-normal" href="{{url('/team/edit')}}">Edit</a>
                    <a class="ml-10x btn btn-warning" href="">Delete</a>
                </div>
            </div>
            <div class="divider mt-15x"></div>
            <div class="d-flex flex-dir-col">
                <br>
                <p class="font-12x text-align-center"><b>Address</b></p>
                <p class="font-12x text-align-center">Jl. Raya Semampir Barat no. 2</p>
                <br>
                <div class="d-flex">
                    <div class="w-50p d-flex justify-content-end">
                        <div class="d-flex flex-dir-col">
                            <p class="font-12x text-align-right"><b>Email</b></p>
                            <p class="font-12x text-align-right"><b>Phone</b></p>
                        </div>
                        <div class="d-flex flex-dir-col ml-10x">
                            <p class="font-12x">neil@mail.com</p>
                            <p class="font-12x">082337363440</p>
                        </div>
                    </div> 
                    <div class="w-50p d-flex ml-20x">
                        <div class="d-flex flex-dir-col ">
                            <p class="font-12x text-align-right"><b>LINE</b></p>
                            <p class="font-12x text-align-right"><b>Instagram</b></p>
                            <p class="font-12x text-align-right"><b>LinkedIn</b></p>
                        </div>
                        <div class="d-flex flex-dir-col ml-10x">
                            <p class="font-12x">neilson1907</p>
                            <p class="font-12x">neilson.17</p>
                            <p class="font-12x">neilson.soeratman</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="card p-10x team-list-item mt-15x">
        <div class="d-flex flex-dir-col">
            <div class="d-flex item-align-center justify-content-space-between">
                <div class="d-flex item-align-center">
                    <img class="img-avatar h-50x" src="https://i.pravatar.cc/300" alt="">
                    <div class="ml-10x">
                        <p class="dashboard-item-header">Staff Name</p>
                        <p class="font-12x">Employee</p>
                    </div>
                </div>
                <div>
                    <a class="btn btn-normal" href="">Edit</a>
                    <a class="ml-10x btn btn-warning" href="">Delete</a>
                </div>
            </div>
            <div class="divider mt-15x"></div>
            <div class="d-flex flex-dir-col">
                <br>
                <p class="font-12x text-align-center"><b>Address</b></p>
                <p class="font-12x text-align-center">Jl. Raya Semampir Barat no. 2</p>
                <br>
                <div class="d-flex">
                    <div class="w-50p d-flex justify-content-end">
                        <div class="d-flex flex-dir-col">
                            <p class="font-12x text-align-right"><b>Email</b></p>
                            <p class="font-12x text-align-right"><b>Phone</b></p>
                        </div>
                        <div class="d-flex flex-dir-col ml-10x">
                            <p class="font-12x">neil@mail.com</p>
                            <p class="font-12x">082337363440</p>
                        </div>
                    </div> 
                    <div class="w-50p d-flex ml-20x">
                        <div class="d-flex flex-dir-col ">
                            <p class="font-12x text-align-right"><b>LINE</b></p>
                            <p class="font-12x text-align-right"><b>Instagram</b></p>
                            <p class="font-12x text-align-right"><b>LinkedIn</b></p>
                        </div>
                        <div class="d-flex flex-dir-col ml-10x">
                            <p class="font-12x">neilson1907</p>
                            <p class="font-12x">neilson.17</p>
                            <p class="font-12x">neilson.soeratman</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('team-active')
active
@endsection