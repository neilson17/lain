@extends('layout.bar')

@section('content')
{{date_default_timezone_set('Asia/Jakarta')}}
<h2 class="ml-20x">Add Transaction</h2>
<div id="notification-add-transaction-success" class="d-none mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully added new transaction</p>
</div>
<div id="notification-add-transaction-fail" class="d-none card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p id="add-transaction-fail-message" class="ml-15x">Failed to add new transaction</p>
</div>
<div class="card p-20x mt-15x">
    <div class="d-flex flex-dir-col">
        @csrf
        <div class="d-flex justify-content-space-between item-align-center">
            <div class="w-60p">
                <input type="text" required name="inptransactiontitle" class="input-text w-100p" placeholder="Transaction Title">
            </div>
            <button class="ml-15x btn btn-normal" id="btn-new-transaction">Save</button>
        </div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Amount</p>
                <input step="1000" type="number" name="inptransactionamount" required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-text">
            </div>
            <div class="d-flex mr-15x item-align-center input-todo-second-rows">
                <p class="font-14px d-flex">Account</p>
                <select class="ml-10x text-align-center h-30x pl-20x pr-20x" id="inptransactionaccount">
                    @foreach($bank_acc as $t)
                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex item-align-center input-todo-second-rows">
                <p class="font-14px d-flex">Category</p>
                <select class="ml-10x text-align-center h-30x pl-20x pr-20x" id="inptransactioncategory">
                    @foreach($trans_cat as $t)
                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="divider mt-15x mb-15x"></div>
        <div class="d-flex mt-10x input-todo-rows">
            <div class="d-flex mr-15x item-align-center">
                <p class="font-14px d-flex">Date</p>
                <input type="datetime-local" name="inptransactiondate" value='{{date("Y-m-d\TH:i",strtotime(date("y-m-d h:i:s")))}}' required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-datetime">
            </div>
            <div class="d-flex item-align-center input-todo-second-rows">
                <p class="font-14px d-flex">Client</p>
                <select class="ml-10x text-align-center h-30x pl-20x pr-20x" id="inptransactionclientid">
                    @foreach($client as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="divider mt-15x mb-15x"></div>
    <textarea id="inptransactiondescription" cols="30" rows="10" class="input-text w-100p mw-100p" placeholder="Transaction Description"></textarea>
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/add-transaction.js')}}"></script>
@endsection

@section('finance-active')
active
@endsection