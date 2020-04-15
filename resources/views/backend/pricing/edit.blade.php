@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Cennik - Edytuj')

@section('action', route('pricing.update', $pricing))

@section('button', 'Zapisz')

@section('method')
    {{ method_field('PUT')  }}
@endsection

@section('form-control')

    @include('backend.partials.form-input', [
    'name' => 'name',
    'label' => 'Nazwa',
    'placeholder' => 'Podaj nazwę',
    'helper' => '',
    'value' => old('name') ?? $pricing->name
])

    @include('backend.partials.form-number', [
    'name' => 'price_since',
    'label' => 'Ceny od:',
    'placeholder' => 'Podaj minimalną cenę',
    'helper' => 'Podaj minimalną cenę w dodawanym cenniku',
    'value' => old('price_since')  ?? $pricing->price_since
])
    @include('backend.partials.form-select', [
'name' => 'position',
'label' => 'Kolejność',
'placeholder' => 'Ustaw kolejność',
'helper' => 'Ustaw kolejność, do której zostanie przypisany cennik',
'value' => old('position') ?? $pricing->position,
'options' => [
    '0' => 'pierwszy',
    '1' => 'bez zmian',
    '2' => 'ostatni',
    ]])

    @include('backend.partials.form-file', [
    'name' => 'filepath',
    'label' => 'Zdjęcie',
    'helper' => 'Dodaj zdjęcie do cennika',
    'filepath' => $pricing->filepath,
])

    @include('backend.partials.form-records', [
    'items' => old('items') ?? $pricing->items
])

@endsection
