@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Portfolio - Dodaj')

@section('action', route('portfolio.store'))

@section('button', 'Dodaj')

@section('method')
    {{ method_field('POST')  }}
@endsection

@section('form-control')

    @include('backend.partials.form-input', [
    'name' => 'tags',
    'label' => 'Tagi',
    'placeholder' => 'Podaj tagi',
    'helper' => '',
    'value' => old('tags')
])

    @include('backend.partials.form-file', [])

@endsection
