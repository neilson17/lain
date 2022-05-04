@extends('layout.bar')

@section('content')
@csrf
<div class="card p-20x">
    <div class="d-flex justify-content-space-between item-align-center">
        <div class="d-flex item-align-center w-60p">
            <img src="https://i.pravatar.cc/300" class="img-avatar h-100x" alt="">
            <div class="w-100p ml-15x">
                <h2>{{ $data->name }}</h2>
                <p class="font-14x">{{ $data->job_category->name }}</p>
                <progress id="progressclientdetail" class="w-80p mt-10x" value="{{ $td / $tt * 100 }}" max="100"></progress>
                <label for="progressclientdetail" id="progresspercentage" class="font-14x color-white">{{ $percentage }}%</label>
                <p id="progressvalue" td={{$td}} tt={{$tt}} class="font-12x">Task Done: {{ $td }}/{{ $tt }}</p>
            </div>
        </div>
        <div>
            <p class="font-14x text-align-right">Due {{ $date }}</p> 
            <div class="d-flex justify-content-end mt-3x" id="clientdonecard">
                @if ($td == $tt)
                <div class="dashboard-tag-item font-12x btn-progress">Done</div>
                @else
                <div class="dashboard-tag-item font-12x">In Progress</div>
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-normal" href="{{url('/client/edit')}}">Edit</a>
        <a class="ml-10x btn btn-warning" href="">Delete</a>
    </div>
    <div class="divider mb-15x mt-15x"></div>
    <p class="font-14x">{{ $data->description }}</p>
    <div class="d-flex mt-15x">
        <div class="d-flex">
            <div class="d-flex flex-dir-col">
                <p class="font-14x h-20x"><b>Email</b></p>
                <p class="font-14x h-20x"><b>Phone</b></p>
            </div>
            <div class="d-flex flex-dir-col ml-30x">
                <p class="font-14x h-20x">{{ $data->email }}</p>
                <p class="font-14x h-20x">{{ $data->phone_number }}</p>
            </div>
        </div> 
        <div class="d-flex ml-60x">
            <div class="d-flex flex-dir-col">
                <p class="font-14x h-20x"><b>Instagram</b></p>
                <p class="font-14x h-20x"><b>LinkedIn</b></p>
            </div>
            <div class="d-flex flex-dir-col ml-30x">
                <p class="font-14x h-20x">{{ $data->instagram }}</p>
                <p class="font-14x h-20x">{{ $data->linkedin }}</p>
            </div>
        </div> 
    </div>
    <div class="divider mb-15x mt-15x"></div>
    <h4>Assigned to</h4>
    <div class="d-flex mt-10x flex-wrap">
        @foreach($accountss as $a)
        <div class="position-relative">
            <div class="dashboard-tag-item font-12x item-align-center d-flex">
                <img src="https://i.pravatar.cc/300" class="img-avatar h-20x mr-10x" alt="">
                {{ $a[0]->name }}
            </div>
        </div>
        @endforeach
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
                    <option value="1">1 day</option>
                    <option value="3">3 days</option>
                    <option value="7">7 days</option>
                    <option value="15">15 days</option>
                    <option value="30">30 days</option>
                </select>
                <a class="ml-10x font-14x" href="{{url('/events')}}">See More ></a>
            </div>
        </div>
        <div class="sidebar-list-wrapper d-flex">
            @foreach($events as $e)
            <a href="{{ url('/events/'.$e->id) }}">
                <div class="dashboard-list-item d-flex">
                    <div class="d-flex">
                        <div class="ml-10x">
                            <p class="dashboard-item-header">{{ $e->title }}</p>
                        </div>
                    </div>
                    <p class="font-12x text-align-right">Due {{ $e->date }}</p>
                </div>
            </a>
            <div class="divider"></div>
            @endforeach
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
                    <option value="1">1 day</option>
                    <option value="3">3 days</option>
                    <option value="7">7 days</option>
                    <option value="15">15 days</option>
                    <option value="30">30 days</option>
                </select>
                <a class="ml-10x font-14x" href="{{url('todos')}}">See More ></a>
            </div>
        </div>
        @foreach($todos as $t)
        <a href="{{url('/todos/'.$t->id)}}">
            <div class="dashboard-list-item d-flex">
                <div class="d-flex item-align-center w-70p">
                    <input id="{{$t->id}}" class="done-todo-client-detail" type="checkbox" @if($t->done == 1) checked @endif>
                    <div class="ml-10x">
                        <p class="dashboard-item-header">{{ $t->name }}</p>
                    </div> 
                </div>
                <div class="w-30p">
                    <p class="font-12x text-align-right">Due {{ $t->deadline }}</p>
                </div>
            </div>
        </a>
        <div class="divider"></div>
        @endforeach
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
        @foreach($private as $note)
            <a href="{{ url('/notes/'.$note->id) }}">
                <div class="card p-10x note-list-item">
                    <div class="d-flex justify-content-space-between item-align-center">
                        <div>
                            <h4>{{ $note->title }}</h4>
                            @if($note->clients_id != 1)
                                <p class="font-12x">{{ $note->name }}</p>
                            @endif
                        </div>
                        <p class="font-12x text-align-right">{{ $note->date }}</p>
                    </div>
                    <div class="divider mb-10x mt-10x"></div>
                    <p class="note-description-thumbnail font-12x">
                        {{ $note->content }}
                    </p>      
                </div>
            </a>
        @endforeach
    </div>
    <h3 class="ml-15x mt-15x mb-15x">Public Note</h3>
    <div class="note-list-wrapper mt-15x">
        @foreach($public as $note)
        <a href="{{ url('/notes/'.$note->id) }}">
                <div class="card p-10x note-list-item">
                    <div class="d-flex justify-content-space-between item-align-center">
                    <div>
                            <h4>{{ $note->title }}</h4>
                            @if($note->clients_id != 1)
                                <p class="font-12x">{{ $note->name }}</p>
                            @endif
                        </div>
                        <p class="font-12x text-align-right">{{ $note->date }}</p>
                    </div>
                    <div class="divider mb-10x mt-10x"></div>
                    <p class="note-description-thumbnail font-12x">
                        {{ $note->content }}
                    </p>      
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('client-active')
active
@endsection