@extends('layout.bar')

@section('content')
@csrf
<div class="card p-20x">
    <div class="d-flex client-detail-wrapper">
        <div class="d-flex client-detail">
            <div class="w-100p">
                <h2>{{ $data->name }}</h2>
                <progress id="progressclientdetail" class="w-80p mt-10x" value="{{$data->current_amount / $data->target_amount * 100}}" max="100"></progress>
                <label for="progressclientdetail" id="progresspercentage" class="font-14x color-white">{{round($data->current_amount / $data->target_amount * 100, 1)}}%</label>
                <p id="progressvalue" class="font-12x">Rp{{number_format($data->current_amount,0,",",".")}} / Rp{{number_format($data->target_amount,0,",",".")}}</p>
            </div>
        </div>
        <div class="deadline-client-detail">
            <p class="font-14x text-align-right">{{date("d M Y, H.i", strtotime($data->date))}}</p> 
            <div class="d-flex justify-content-end mt-3x" id="targetdonecard">
                @if ($data->done == 1)
                <div class="dashboard-tag-item font-12x btn-progress">Done</div>
                @else
                <div class="dashboard-tag-item font-12x">In Progress</div>
                @endif
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-normal" href="{{url('/targets/'.$data->id.'/edit')}}">Edit</a>
        <form method="POST" class="m-0 d-flex" id="delete-target-detail" action="{{url('/targets/'.$data->id)}}">
            @csrf
            @method('DELETE')
            <a id="btn-delete-target-detail" class="ml-10x btn btn-warning border-none" href="#">Delete</a>
        </form>
    </div>
    <div class="divider mb-15x mt-15x"></div>
    @if($data->done == 0)
    <div id="mark-done-target-detail">
        <div class="d-flex item-align-center" >
            <input id="{{$data->id}}" class="mr-10x done-target" type="checkbox">
            <p class="font-14x">Mark target as Done</p>
        </div>
        <div class="divider mb-15x mt-15x"></div>
    </div>
    @endif
    <p class="font-14x">{!! nl2br($data->description) !!}</p>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('finance-active')
active
@endsection