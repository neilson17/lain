<div class="flex-dir-col d-flex w-100p" id="todo-list-wrapper">
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