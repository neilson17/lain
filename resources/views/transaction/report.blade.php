@extends('layout.bar')

@section('content')
@csrf
<h2>Finance Report</h2>
<div class="card p-20x mt-20x d-flex justify-content-space-between">
    <div class="d-flex input-todo-rows">
        <div class="d-flex mr-15x item-align-center">
            <p class="font-14px d-flex">Start</p>
            <input type="datetime-local" id="initstartdate" value='{{$startDate}}' required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-datetime">
        </div>
        <div class="d-flex mr-15x item-align-center input-todo-second-rows">
            <p class="font-14px d-flex">End</p>
            <input type="datetime-local" id="initenddate" value='{{$endDate}}' required class="ml-10x pt-5x pb-5x pl-10x pr-10x input-datetime">
        </div>
        <div class="d-flex item-align-center input-todo-second-rows">
            <p class="font-14px d-flex">Account</p>
            <select class="ml-10x text-align-center h-30x pl-20x pr-20x" id="inpbankaccount">
                @foreach($bankAcc as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="d-flex item-align-end">
        <button class="btn btn-normal" id="btn-search-report">Search</button>
    </div>
</div>
<div class="card p-20x mt-20x">
    <p class="text-align-center">Total</p>
    <h1 class="text-align-center">Rp<span id="totalBalance">xxxx</span></h1>
    <br>
    <div class="d-flex justify-content-space-evenly">
        <div>
            <p class="text-align-center">Total Income</p>
            <h3 class="text-align-center">Rp<span id="totalIncome">xxx</span></h1>
        </div>
        <div>
            <p class="text-align-center">Total Expense</p>
            <h3 class="text-align-center">Rp<span id="totalExpense">xxx</span></h1>
        </div>
    </div>
</div>
<div class="d-flex justify-content-space-evenly mt-20x card p-20x">
    <div>
        <p class="text-align-center">Total Piutang</p>
        <h3 class="text-align-center">Rp<span id="totalPiutang">xxx</span></h1>
    </div>
    <div>
        <p class="text-align-center">Total Hutang</p>
        <h3 class="text-align-center">Rp<span id="totalHutang">xxx</span></h1>
    </div>
</div>
<div class="d-flex ml-10x mt-20x mb-10x justify-content-space-between header-wrapper">
    <h2>Transaction</h2>
</div>
<div id="finance-report-content">
    
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/transaction-report.js')}}"></script>
@endsection

@section('finance-active')
active
@endsection