@extends('layouts.crud-show')

@section('content')
    @parent
@endsection

@section('header', 'Cennik')

@section('show-content')
<div class="row">
    <div class="col-8">
        <h2 class="pb-3">{{ $pricing->name }}</h2>
        <h3>Ceny od: {{ $pricing->price_since }}</h3>
    </div>
    <div class="col-4">
        <img class="img-fluid shadow shadow-lg border border-info" src="{{ asset('storage/'.$pricing->filepath) }}">

    </div>
</div>

<div class="col-12 py-5">
    <div class="row py-2 border border-secondary">
        <div class="col">Lp</div>
        <div class="col">Tytuł</div>
        <div class="col">Cena</div>
        <div class="col">Opis</div>
        <div class="col">Link</div>
    </div>

    <draggable :items="{{ json_encode($pricing->items) }}" sortable-endpoint="{{ route('pricing.items.sortable', $pricing) }}"></draggable>
</div>



@endsection

