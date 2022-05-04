@extends('layout.bar')

@section('content')
<div class="d-flex ml-10x mb-15x justify-content-space-between">
    <h2>Notes</h2>
    <div class="d-flex">
        <form class="d-flex m-0" method="POST" id="search-note" action="{{route('notes.searchNote')}}">
            @csrf
            <input type="text" name="inpsearchnote" class="input-text-merged-button">
            <a type="submit" class="btn-merged-input btn" id="btn-search-note" href="#">Search</a>
        </form>
        <a class="btn-normal btn ml-10x" href="{{route('notes.create')}}">Create Note</a>
    </div>
</div>
<div class="note-page-content">
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <h3 class="ml-15x mt-15x mb-15x">My Note</h3>
    <div class="note-list-wrapper">
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
    <div class="note-list-wrapper">
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

@section('note-active')
active
@endsection