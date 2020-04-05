@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Usługi - Dodaj')

@section('action', route('services.store'))

@section('button', 'Dodaj')

@section('method')
    {{ method_field('POST')  }}
@endsection

@section('form-control')

    @include('backend.partials.form-select', [
    'name' => 'category_id',
    'label' => 'Kategoria',
    'placeholder' => 'Wybierz kategorię',
    'helper' => 'Wybierz kategorię, do której zostanie przypisana usługa',
    'value' => old('category_id'),
    'options' => $categories->pluck('name','id')
])

    @include('backend.partials.form-input', [
    'name' => 'title',
    'label' => 'Nazwa',
    'placeholder' => 'Podaj nazwę',
    'helper' => '',
    'value' => old('title')
])

    @include('backend.partials.form-textarea', [
    'name' => 'description',
    'label' => 'Opis',
    'helper' => 'Opis swoją usługę',
    'value' => old('description'),
])

    @include('backend.partials.form-file', [
        'name' => 'filepath',
        'label' => 'Zdjęcie',
        'helper' => 'Dodaj zdjęcie do usługi',
        'file' => '',
])

@endsection
