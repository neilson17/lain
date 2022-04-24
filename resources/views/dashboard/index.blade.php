@extends('layout.bar')

@section('content')
<div class="dashboard-page-content w-100p h-100p">
    <div class="card revenue-dashboard p-20x">
        <h3>Revenue</h3>
    </div>
    <div class="card notification-dashboard p-20x">
        <div class="justify-content-space-between d-flex mb-15x item-align-center">
            <h3>Upcoming Events</h3>
            <div class="d-flex">
                <p class="mr-10x font-14x">Range: </p>
                <select name="" class="pr-20x pl-20x" id="">
                    <option value="1">1 days</option>
                    <option value="3">3 days</option>
                    <option value="7">7 days</option>
                    <option value="15">15 days</option>
                    <option value="30">30 days</option>
                </select>
            </div>
        </div>
        <div class="sidebar-list-wrapper d-flex">
            <a href="">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex">
                        <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
                        <div class="ml-10x">
                            <p class="dashboard-item-header">Client Deadline</p>
                            <p class="font-12x">Client Name</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </a>
            <div class="divider"></div>
            <a href="">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex">
                        <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
                        <div class="ml-10x">
                            <p class="dashboard-item-header">Client Deadline</p>
                            <p class="font-12x">Client Name</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </a>
            <div class="divider"></div>
            <a href="">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex">
                        <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
                        <div class="ml-10x">
                            <p class="dashboard-item-header">Client Deadline</p>
                            <p class="font-12x">Client Name</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </a>
        </div>
        <p class="text-align-right pb-10x pt-10x">
            <br>
            <a class="btn-normal btn" href="">Add Reminder</a>
        </p>
    </div>
    <div class="card client-dashboard p-20x">
        <div class="justify-content-space-between d-flex mb-15x">
            <h3>Clients</h3>
            <a class="font-14x" href="{{url('/client')}}">See More ></a>
        </div>
        <div class="sidebar-list-wrapper d-flex">
            <a href="">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex w-70p item-align-center">
                        <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
                        <div class="ml-10x mr-10x w-100p">
                            <p class="dashboard-item-header">Client Deadline</p>
                            <progress class="w-80p" id="progressclientdashboard" value="32" max="100"></progress>
                            <label for="progressclientdashboard" class="font-14x">10%</label>
                            <p class="font-12x">Task Done: 14/20</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </a>
            <div class="divider"></div>
            <a href="">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex w-70p item-align-center">
                        <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
                        <div class="ml-10x mr-10x w-100p">
                            <p class="dashboard-item-header">Client Deadline</p>
                            <progress class="w-80p" id="progressclientdashboard" value="32" max="100"></progress>
                            <label for="progressclientdashboard" class="font-14x">10%</label>
                            <p class="font-12x">Task Done: 14/20</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </a>
            <div class="divider"></div>
            <a href="">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex w-70p item-align-center">
                        <img class="img-avatar h-40x" src="https://i.pravatar.cc/300" alt="">
                        <div class="ml-10x mr-10x w-100p">
                            <p class="dashboard-item-header">Client Deadline</p>
                            <progress class="w-80p" id="progressclientdashboard" value="32" max="100"></progress>
                            <label for="progressclientdashboard" class="font-14x">10%</label>
                            <p class="font-12x">Task Done: 14/20</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </a>
        </div>
    </div>
    <div class="card todo-dashboard p-20x">
        <div class="justify-content-space-between d-flex mb-15x">
            <h3>To Dos</h3>
        </div>
        <div class="dashboard-list-item d-flex">
            <div class="d-flex item-align-center">
                <input type="checkbox">
                <div class="ml-10x">
                    <p class="dashboard-item-header">Todo Today</p>
                    <p class="font-12x">Todo Description</p>
                </div> 
            </div>
            <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
        </div>
        <div class="divider"></div>
        <div class="dashboard-list-item d-flex">
            <div class="d-flex item-align-center">
                <input type="checkbox">
                <div class="ml-10x">
                    <p class="dashboard-item-header">Todo Today</p>
                    <p class="font-12x">Todo Description</p>
                </div> 
            </div>
            <div>
                <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                <p class="font-12x text-align-right">Client Name</p>
            </div>
        </div>
        <div class="divider"></div>
        <div class="dashboard-list-item d-flex">
            <div class="d-flex item-align-center">
                <input type="checkbox">
                <div class="ml-10x">
                    <p class="dashboard-item-header">Todo Today</p>
                    <p class="font-12x">Todo Description</p>
                </div> 
            </div>
            <div>
                <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                <p class="font-12x text-align-right">Client Name</p>
            </div>
        </div>
        <div class="divider"></div>
        <div class="dashboard-list-item d-flex">
            <div class="d-flex item-align-center">
                <input type="checkbox">
                <div class="ml-10x">
                    <p class="dashboard-item-header">Todo Today</p>
                    <p class="font-12x">Todo Description</p>
                </div> 
            </div>
            <div>
                <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                <p class="font-12x text-align-right">Client Name</p>
            </div>
        </div>
        <div class="divider"></div>
        <div class="dashboard-list-item d-flex">
            <div class="d-flex item-align-center">
                <input type="checkbox">
                <div class="ml-10x">
                    <p class="dashboard-item-header">Todo Today</p>
                    <p class="font-12x">Todo Description</p>
                </div> 
            </div>
            <div>
                <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                <p class="font-12x text-align-right">Client Name</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('dashboard-active')
active
@endsection