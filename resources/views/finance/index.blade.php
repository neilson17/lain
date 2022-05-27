@extends('layout.bar')

@section('content')
@csrf
<div class="card p-20x">
    <p class="text-align-center">Total</p>
    <h1 class="text-align-center">Rp{{number_format($bankacc[0]->balance,0,",",".")}}</h1>
    <br>
    <p class="text-align-center">Available Balance</p>
    <h2 class="text-align-center">Rp{{number_format($bankacc[0]->available,0,",",".")}}</h2>
    <div class="d-flex justify-content-center mt-15x"><a class="btn-normal btn" href="{{url('reports')}}">Reports</a></div>
</div>

<div class="d-flex justify-content-space-evenly mt-20x card p-20x">
    @foreach($bankacc as $b)
        @if ($b->id != 1)
        <div>
            <p class="text-align-center">{{$b->name}}</p>
            <h3 class="text-align-center">Rp{{number_format($b->balance,0,",",".")}}</h1>
        </div>
        @endif
    @endforeach
</div>

<div class="d-flex ml-10x mt-20x mb-20x justify-content-space-between header-wrapper">
    <h2>Targets</h2>
    <div class="d-flex search-add-wrapper">
        <a class="btn-normal btn ml-10x" href="{{route('targets.create')}}">Add Target</a>
    </div>
</div>

@if(session('statustarget'))
<div id="notification-delete-target-success" class="mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully deleted target</p>
</div>
@endif

@if(session('errortarget'))
<div id="notification-delete-target-fail" class="card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">{{session('errortarget')}}</p>
</div>
@endif

<div class="note-list-wrapper mt-20x">
    @foreach($target as $t)
    <a href="{{ url('/targets/'.$t->id) }}">
        <div class="card p-15x note-list-item">
            <div class="d-flex justify-content-space-between item-align-center mb-10x">
                <div>
                    <h4>{{$t->name}}</h4>
                </div>
                <p class="font-12x text-align-right">{{$t->date}}</p>
            </div>
            <progress class="w-70p" id="progressclientdashboard" value="{{$t->current_amount / $t->target_amount * 100}}" max="100"></progress>
            <label for="progressclientdashboard" class="font-14x">{{round($t->current_amount / $t->target_amount * 100, 1)}}%</label>
            <p class="font-12x mt-3x">Rp{{number_format($t->current_amount,0,",",".")}} / Rp{{number_format($t->target_amount,0,",",".")}}</p>  
        </div>
    </a>
    @endforeach
</div>

<div class="d-flex ml-10x mt-20x mb-20x justify-content-space-between header-wrapper">
    <h2>Transaction</h2>
    <div class="d-flex search-add-wrapper">
        <a class="btn-normal btn ml-10x" href="{{route('transactions.create')}}">Add Transaction</a>
    </div>
</div>

@if(session('statustrans'))
<div id="notification-delete-transaction-success" class="mt-15x card-progress p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">Successfully deleted transaction</p>
</div>
@endif

@if(session('errortrans'))
<div id="notification-delete-transaction-fail" class="card-warning mt-15x p-15x d-flex item-align-center">
    <img src="{{asset('assets/img/light-bulb.png')}}" class="h-20x" alt="">
    <p class="ml-15x">{{session('errortrans')}}</p>
</div>
@endif

<div class="flex-dir-col mt-20x d-flex w-100p" id="todo-list-wrapper">
    @foreach($trans as $tr)
    <a href="{{ url('/transactions/'.$tr->id) }}">
        <div class="dashboard-list-item d-flex">
            <div class="d-flex item-align-center w-70p">
                @if($tr->transaction_category->id == 3 || $tr->transaction_category->id == 4)
                <input id="{{$tr->id}}" 
                    @if($tr->transaction_category->id == 3) 
                    class="done-piutang-list" 
                    @else
                    class="done-hutang-list"
                    @endif
                 type="checkbox"  >
                @endif
                <div class="ml-10x">
                    <div class="d-flex item-align-end">
                        <p class="dashboard-item-header">{{$tr->title}}</p>
                        <p class="font-12x ml-5x">({{$tr->bank_account->name}})</p>
                    </div>
                    <div class="d-flex item-align-center mt-3x">
                        <p id="transcat{{$tr->id}}" class="font-12x p-5x
                            @if($tr->transaction_category->id == 1) card-progress
                            @elseif ($tr->transaction_category->id == 2) card-warning
                            @else card-neutral @endif">{{$tr->transaction_category->name}}</p>
                        @if($tr->clients_id != 1)<p class="font-12x">&nbsp;- {{$tr->client->name}}</p>@endif
                    </div>
                </div>
            </div>
            <div class="w-30p">
                <p class="font-12x text-align-right">{{$tr->date}}</p>
                <p class="font-12x text-align-right">Rp{{number_format($tr->amount,0,",",".")}}</p>
            </div>
        </div>
    </a>
    <div class="divider"></div>
    @endforeach
</div>
@endsection

@section('javascript')
<script src="{{asset('assets/js/main.js')}}"></script>
@endsection

@section('finance-active')
active
@endsection