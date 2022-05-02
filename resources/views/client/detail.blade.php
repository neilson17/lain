@extends('layout.bar')

@section('content')
<div class="card p-20x">
    <div class="d-flex justify-content-space-between item-align-center">
        <div class="d-flex item-align-center w-60p">
            <img src="https://i.pravatar.cc/300" class="img-avatar h-100x" alt="">
            <div class="w-100p ml-15x">
                <h2>Client Name</h2>
                <p class="font-14x">Website</p>
                <progress id="progressclientdetail" class="w-80p mt-10x" value="32" max="100"></progress>
                <label for="progressclientdetail" class="font-14x color-white">10%</label>
                <p class="font-12x">Task Done: 14/20</p>
            </div>
        </div>
        <div>
            <p class="font-14x text-align-right">Due 15 Apr 2022, 15.00</p> 
            <div class="d-flex justify-content-end mt-3x">
                <div class="dashboard-tag-item font-12x btn-progress">Done</div>
                <!-- Kalo progressnya "In Progress" class btn-progress dihapus -->
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-normal" href="{{url('/client/edit')}}">Edit</a>
        <a class="ml-10x btn btn-warning" href="">Delete</a>
    </div>
    <div class="divider mb-15x mt-15x"></div>
    <p class="font-14x">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque nisi laborum eaque earum a nesciunt magni nemo nihil, laudantium, obcaecati soluta aliquid. Quaerat sit praesentium temporibus similique ea, facilis autem? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus voluptatem minus, necessitatibus eligendi quas, nisi corrupti non ad placeat, molestiae quae ex! Cum earum laudantium deleniti suscipit, totam corrupti dolorum.</p>
    <div class="d-flex mt-15x">
        <div class="d-flex">
            <div class="d-flex flex-dir-col">
                <p class="font-14x h-20x"><b>Email</b></p>
                <p class="font-14x h-20x"><b>Phone</b></p>
            </div>
            <div class="d-flex flex-dir-col ml-30x">
                <p class="font-14x h-20x">aa@mail.com</p>
                <p class="font-14x h-20x">0812731283728</p>
            </div>
        </div> 
        <div class="d-flex ml-60x">
            <div class="d-flex flex-dir-col">
                <p class="font-14x h-20x"><b>Instagram</b></p>
                <p class="font-14x h-20x"><b>LinkedIn</b></p>
            </div>
            <div class="d-flex flex-dir-col ml-30x">
                <p class="font-14x h-20x">@instagramid</p>
                <p class="font-14x h-20x">username</p>
            </div>
        </div> 
    </div>
    <div class="divider mb-15x mt-15x"></div>
    <h4>Assigned to</h4>
    <div class="d-flex mt-10x flex-wrap">
        <div class="position-relative">
            <div class="dashboard-tag-item font-12x item-align-center d-flex">
                <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
                Neilson Soeratman
            </div>
        </div>
        <div class="position-relative">
            <div class="dashboard-tag-item font-12x item-align-center d-flex">
                <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
                Neilson Soeratman
            </div>
        </div>
        <div class="position-relative">
            <div class="dashboard-tag-item font-12x item-align-center d-flex">
                <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
                Neilson Soeratman
            </div>
        </div>
    </div>
</div>
<div class="card p-20x mt-15x">
    <h3>Finance</h3>
</div>
<div class="client-item-list-wrapper mt-15x">
<div class="card p-20x">
        <div class="justify-content-space-between d-flex mb-15x item-align-center">
            <h3>Upcoming Events</h3>
            <div class="d-flex item-align-center">
                <p class="mr-10x font-14x">Range: </p>
                <select name="" class="pr-20x pl-20x" id="">
                    <option value="1">1 days</option>
                    <option value="3">3 days</option>
                    <option value="7">7 days</option>
                    <option value="15">15 days</option>
                    <option value="30">30 days</option>
                </select>
                <a class="ml-10x font-14x" href="{{url('/events')}}">See More ></a>
            </div>
        </div>
        <div class="sidebar-list-wrapper d-flex">
            <a href="">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex">
                        <div class="ml-10x">
                            <p class="dashboard-item-header">Client Deadline</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </a>
            <div class="divider"></div>
            <a href="">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex">
                        <div class="ml-10x">
                            <p class="dashboard-item-header">Client Deadline</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </a>
            <div class="divider"></div>
            <a href="">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex">
                        <div class="ml-10x">
                            <p class="dashboard-item-header">Client Deadline</p>
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
    <div class="card p-20x">
        <div class="justify-content-space-between d-flex mb-15x">
            <h3>To Dos</h3>
            <div class="d-flex item-align-center">
                <p class="mr-10x font-14x">Range: </p>
                <select name="" class="pr-20x pl-20x" id="">
                    <option value="1">1 days</option>
                    <option value="3">3 days</option>
                    <option value="7">7 days</option>
                    <option value="15">15 days</option>
                    <option value="30">30 days</option>
                </select>
                <a class="ml-10x font-14x" href="{{url('todos')}}">See More ></a>
            </div>
        </div>
        <a href="{{url('/todo/detail')}}">
            <div class="dashboard-list-item d-flex">
                <div class="d-flex item-align-center w-70p">
                    <input type="checkbox">
                    <div class="ml-10x">
                        <p class="dashboard-item-header">Todo Today</p>
                    </div> 
                </div>
                <div class="w-30p">
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </div>
        </a>
        <div class="divider"></div>
        <a href="{{url('/todo/detail')}}">
            <div class="dashboard-list-item d-flex">
                <div class="d-flex item-align-center w-70p">
                    <input type="checkbox">
                    <div class="ml-10x">
                        <p class="dashboard-item-header">Todo Today</p>
                    </div> 
                </div>
                <div class="w-30p">
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </div>
        </a>
        <div class="divider"></div>
        <a href="{{url('/todo/detail')}}">
            <div class="dashboard-list-item d-flex">
                <div class="d-flex item-align-center w-70p">
                    <input type="checkbox">
                    <div class="ml-10x">
                        <p class="dashboard-item-header">Todo Today</p>
                    </div> 
                </div>
                <div class="w-30p">
                    <p class="font-12x text-align-right">Due 15 Apr 2022, 15.00</p>
                </div>
            </div>
        </a>
        <p class="text-align-right pb-10x pt-10x">
            <br>
            <a class="btn-normal btn" href="{{url('/todo/create')}}">Add Todo</a>
        </p>
    </div>
</div>
<div class="card p-20x d-flex justify-content-space-between item-align-center mt-15x">
    <h3>Client's Notes</h3>
    <div class="d-flex">
    <input type="text" class="input-text-merged-button">
        <a class="btn-merged-input btn" href="">Search</a>
        <a class="btn-normal btn ml-10x" href="{{route('notes.create')}}">Create Note</a>
    </div>
</div>
<div class="note-page-content">
    <h3 class="ml-15x mt-15x mb-15x">My Note</h3>
    <div class="note-list-wrapper mt-15x">
        <a href="http://127.0.0.1:8000/notes/detail">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <div>
                        <h4>Note title</h4>
                    </div>
                    <p class="font-12x text-align-right">2022-04-29 17:53:18</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quibusdam nemo quod eaque iste quidem illum maiores repellendus magni, nobis nostrum placeat debitis maxime sint atque, molestias ratione reprehenderit provident.
                </p>      
            </div>
        </a>
        <a href="http://127.0.0.1:8000/notes/detail">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <div>
                        <h4>Note title</h4>
                    </div>
                    <p class="font-12x text-align-right">2022-04-29 17:53:18</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quibusdam nemo quod eaque iste quidem illum maiores repellendus magni, nobis nostrum placeat debitis maxime sint atque, molestias ratione reprehenderit provident.
                </p>      
            </div>
        </a>
        <a href="http://127.0.0.1:8000/notes/detail">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <div>
                        <h4>Note title</h4>
                    </div>
                    <p class="font-12x text-align-right">2022-04-29 17:53:18</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quibusdam nemo quod eaque iste quidem illum maiores repellendus magni, nobis nostrum placeat debitis maxime sint atque, molestias ratione reprehenderit provident.
                </p>      
            </div>
        </a>
        <a href="http://127.0.0.1:8000/notes/detail">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <div>
                        <h4>Note title</h4>
                    </div>
                    <p class="font-12x text-align-right">2022-04-29 17:53:18</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quibusdam nemo quod eaque iste quidem illum maiores repellendus magni, nobis nostrum placeat debitis maxime sint atque, molestias ratione reprehenderit provident.
                </p>      
            </div>
        </a>
    </div>
    <h3 class="ml-15x mt-15x mb-15x">Public Note</h3>
    <div class="note-list-wrapper mt-15x">
        <a href="http://127.0.0.1:8000/notes/detail">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <div>
                        <h4>Note title</h4>
                    </div>
                    <p class="font-12x text-align-right">2022-04-29 17:53:18</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quibusdam nemo quod eaque iste quidem illum maiores repellendus magni, nobis nostrum placeat debitis maxime sint atque, molestias ratione reprehenderit provident.
                </p>      
            </div>
        </a>
        <a href="http://127.0.0.1:8000/notes/detail">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <div>
                        <h4>Note title</h4>
                    </div>
                    <p class="font-12x text-align-right">2022-04-29 17:53:18</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quibusdam nemo quod eaque iste quidem illum maiores repellendus magni, nobis nostrum placeat debitis maxime sint atque, molestias ratione reprehenderit provident.
                </p>      
            </div>
        </a>
        <a href="http://127.0.0.1:8000/notes/detail">
            <div class="card p-10x note-list-item">
                <div class="d-flex justify-content-space-between item-align-center">
                    <div>
                        <h4>Note title</h4>
                    </div>
                    <p class="font-12x text-align-right">2022-04-29 17:53:18</p>
                </div>
                <div class="divider mb-10x mt-10x"></div>
                <p class="note-description-thumbnail font-12x">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit quibusdam nemo quod eaque iste quidem illum maiores repellendus magni, nobis nostrum placeat debitis maxime sint atque, molestias ratione reprehenderit provident.
                </p>      
            </div>
        </a>
    </div>
</div>
@endsection