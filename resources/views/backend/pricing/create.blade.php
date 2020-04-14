@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Cennik - Dodaj')

@section('action', route('pricing.store'))

@section('button', 'Dodaj')

@section('method')
    {{ method_field('POST')  }}
@endsection

@section('form-control')

    @include('backend.partials.form-input', [
    'name' => 'name',
    'label' => 'Nazwa',
    'placeholder' => 'Podaj nazwę',
    'helper' => '',
    'value' => old('name')
])

    @include('backend.partials.form-input', [
    'name' => 'price_since',
    'label' => 'Ceny od:',
    'placeholder' => 'Podaj minimalną cenę',
    'helper' => 'Podaj minimalną cenę w dodawanym cenniku',
    'value' => old('price_since')
])
    @include('backend.partials.form-file', [
    'name' => 'filepath',
    'label' => 'Zdjęcie',
    'helper' => 'Dodaj zdjęcie do cennika',
    'filepath' => '',
])

    @include('backend.partials.form-records', [
    'items' => old('items')
])

@endsection
