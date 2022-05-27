@extends('layout.bar')

@section('content')
{{date_default_timezone_set('Asia/Jakarta')}}
<h2 class="ml-20x">Edit Transaction - {{$data->title}}</h2>
<div id="notification-edit-transaction-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully edited transaction</p>
</div>
<div id="notification-edit-transaction-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p id="edit-transaction-fail-message" class="ml-15x">Failed to edit transaction</p>
</div>
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        @csrf
        <input type="hidden" id="transid" value="{{$data->id}}">
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" required name="inptransactiontitle" class="input-text w-100p" value="{{$data->title}}" placeholder="Transaction Title">
            </div>
            <button class="ml-15x btn btn-normal" id="btn-edit-transaction">Save</button>
        </div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Amount</p>
                <input step="1000" type="number" value="{{$data->amount}}" name="inptransactionamount" required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-text">
            </div>
            <div class="d-flex mr-15x item-align-end input-todo-second-rows">
                <p class="font-14px d-flex"><b>Account:</b></p>
                <p class="font-14px d-flex" id="bank_account_id" bank="{{$data->bank_account->id}}">&nbsp;{{$data->bank_account->name}}</p>
            </div>
            <div class="d-flex item-align-end input-todo-second-rows">
                <p class="font-14px d-flex"><b>Category:</b></p>
                <p class="font-14px d-flex" id="category_id" category="{{$data->transaction_category->id}}">&nbsp;{{$data->transaction_category->name}}</p>
            </div>
        </div>
        <div class="divider mt-15x mb-15x"></div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Date</p>
                <input type="datetime-local" name="inptransactiondate" value='{{date("Y-m-d\TH:i",strtotime($data->date))}}' required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-datetime">
            </div>
            <div class="d-flex item-align-center input-todo-second-rows">
                <p class="font-14px d-flex">Client</p>
                <select class="ml-10x text-align-center h-30x pl-20x pr-20x" id="inptransactionclientid">
                    @foreach($client as $c)
                        <option value="{{ $c->id }}" @if($c->id == $data->clients_id) selected @endif>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <textarea id="inptransactiondescription" cols="30" rows="10" class="input-text w-100p mw-100p" placeholder="Transaction Description">{{$data->description}}</textarea>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('finance-active')
active
@endsection