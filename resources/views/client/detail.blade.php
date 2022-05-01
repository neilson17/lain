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
</div>
@endsection