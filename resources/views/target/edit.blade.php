@extends('layout.bar')

@section('content')
{{date_default_timezone_set('Asia/Jakarta')}}
<h2 class="ml-20x">Edit Target - {{$data->name}}</h2>
<p id="availableBalance" balance="{{$avalBal}}" class="ml-20x mt-3x">Available balance for this target: Rp{{number_format($avalBal,0,",",".")}}</p>
<div id="notification-edit-target-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully edited target</p>
</div>
<div id="notification-edit-target-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p id="edit-target-fail-message" class="ml-15x">Failed to edit target</p>
</div>
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        @csrf
        <input type="hidden" id="idtarget" value="{{$data->id}}">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" required name="inptargettitle" value="{{$data->name}}" class="input-text w-100p" placeholder="Target Title">
            </div>
            <button class="ml-15x btn btn-normal" id="btn-edit-target">Save</button>
        </div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Current Amount</p>
                <input step="1000" type="number" value="{{$data->current_amount}}" max="{{$data->target_amount}}" name="inpcurrentamount" required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-text">
            </div>
            <div class="d-flex mr-15x item-align-center input-todo-second-rows">
                <p class="font-14px d-flex">Target Amount</p>
                <input step="1000" type="number" value="{{$data->target_amount}}" name="inptargetamount" required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-text">
            </div>
        </div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Date</p>
                <input type="datetime-local" value="{{date('Y-m-d\TH:i', strtotime($data->date))}}" name="inptargetdate" required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-datetime">
            </div>
        </div>  
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <textarea id="inptargetdescription" cols="30" rows="10" class="input-text w-100p mw-100p" placeholder="Target Description">{{$data->description}}</textarea>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/edit-target.js')}}"></script>
@endsection

@section('finance-active')
active
@endsection