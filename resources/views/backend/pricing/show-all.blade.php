@extends('layouts.crud-show')

@section('content')
    @parent
@endsection

@section('header', 'Cennik')

@section('show-content')

<div class="col-12 py-5">
    <div class="row py-2 border border-secondary">
        <div class="col">Lp</div>
        <div class="col">Nazwa</div>
        <div class="col">Cena od</div>
    </div>

    <draggable-pricing :items="{{ json_encode($pricing) }}" sortable-endpoint="{{ route('pricing.sortable') }}"></draggable-pricing>
</div>



@endsection

