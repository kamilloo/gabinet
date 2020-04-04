@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Certyfikaty - Dodaj')

@section('action', route('certificates.store'))

@section('button', 'Dodaj')

@section('method')
    {{ method_field('POST')  }}
@endsection

@section('form-control')

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
    'helper' => 'Opisz certyfikat',
    'value' => old('description'),
])

    @include('backend.partials.form-file', [])

@endsection
