@extends('layout.bar')

@section('content')
<div class="card p-20x">
    <div class="d-flex justify-content-space-between item-align-end">
        <div>
            <h2>Note Title</h2>
            <p class="font-12x">Private - Kuraku</p>
        </div>
        <div class="d-flex ">
            <div class="item-align-end d-flex">
                <p class="font-12x text-align-right"><b>Last Edited </b><br>22 Jan 2022 16:00</p>
            </div>
            <a class="ml-15x btn btn-normal" href="{{url('/note/edit')}}">Edit</a>
            <a class="ml-10x btn btn-warning" href="">Delete</a>
        </div>
    </div>
    <div class="divider mt-10x mb-10x"></div>
    <p class="font-14x">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate consequuntur maxime debitis reprehenderit repellat quia ut officiis dicta deserunt voluptatem? Adipisci consectetur hic illo necessitatibus fugit accusamus ab, cupiditate qui! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita eligendi sunt sint iste cum quo! Non nam itaque aliquid veritatis, debitis, consectetur deserunt fuga harum iure ipsum, reiciendis perspiciatis vero. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur neque cum dolore modi, magnam id minus quia quibusdam exercitationem ea ipsum voluptatem eveniet, quod laboriosam, expedita ut nisi molestiae est. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error unde facere tenetur. Deserunt ut error facere unde officia, a odio fugit eum, molestiae ea, commodi laudantium rerum sapiente! Non, sint.
    </p>
</div>
@endsection