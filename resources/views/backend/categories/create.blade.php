@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Kategorie - Dodaj')

@section('action', route('categories.store'))

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
    'name' => 'icon',
    'label' => 'Ikona',
    'placeholder' => 'Wybierz obrazek',
    'helper' => 'Wybierz obrazek odpowiadający kategorii',
    'value' => old('icon'),
])

@endsection
