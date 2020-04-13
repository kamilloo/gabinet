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

    @include('backend.partials.icon-form-select', [
    'value' => old('icon'),
    'options' => $icons
])

@endsection
