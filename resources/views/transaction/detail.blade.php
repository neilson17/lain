@extends('layout.bar')

@section('content')
@csrf
<div class="card p-20x">
    <div class="d-flex card-header-todo-detail">
        <div>
            <h2>{{ $data->title }}</h2>
            <h3>Rp{{number_format($data->amount,0,",",".")}}</h3>
        </div>
        <div class="d-flex item-align-center header-second-row-todo-detail">
            <div class="d-flex flex-dir-col">
                <p class="font-12x text-align-center">{{date("d M Y, H.i", strtotime($data->date))}}</p>
                @if($data->client->id != 1)
                <p class="font-12x text-align-center">{{$data->client->name}}</p>
                @endif
            </div>
            <div class="d-flex">
                <a class="ml-15x btn btn-normal" href="{{url('/transactions/'.$data->id.'/edit')}}">Edit</a>
                <form method="POST" class="m-0 d-flex" id="delete-transaction-detail" action="{{url('/transactions/'.$data->id)}}">
                    @csrf
                    @method('DELETE')
                    <a id="btn-delete-transaction-detail" class="ml-10x btn btn-warning border-none" href="#">Delete</a>
                </form>
            </div>
        </div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    @if($data->transaction_category->id == 3 || $data->transaction_category->id == 4)
    <div class="d-flex item-align-center" id="mark-done-transaction-detail">
        <input id="{{$data->id}}"
             @if($data->transaction_category->id == 3) 
            class="done-piutang-detail mr-10x" 
            @else
            class="done-hutang-detail mr-10x"
            @endif 
        type="checkbox">
        <p class="font-14x">Mark {{$data->transaction_category->name}} as Done</p>
    </div>
    @endif
    <div class="mt-15x d-flex @if($data->transaction_category->id == 1) card-progress
                            @elseif ($data->transaction_category->id == 2) card-warning
                            @else card-neutral @endif p-5x w-fit-content">
        <p class="font-14x d-flex" id="transcatdetail">{{$data->transaction_category->name}}</p>
        <p class="font-14x d-flex">&nbsp;on {{$data->bank_account->name}}</p>
    </div>
    <p class="mt-15x font-14x">{!! nl2br($data->description) !!}</p>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('finance-active')
active
@endsection