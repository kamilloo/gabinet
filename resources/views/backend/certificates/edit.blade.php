@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Usługi - Edytuj')

@section('action', route('certificates.update', $certificate))

@section('button', 'Zapisz')

@section('method')
    {{ method_field('PUT')  }}
@endsection

@section('form-control')

    @include('backend.partials.form-input', [
    'name' => 'title',
    'label' => 'Nazwa',
    'placeholder' => 'Podaj nazwę',
    'helper' => '',
    'value' => old('title') ?? $certificate->title
])

    @include('backend.partials.form-textarea', [
    'name' => 'description',
    'label' => 'Opis',
    'helper' => 'Opisz certyfikat',
    'value' => old('description') ?? $certificate->description,
])

    @include('backend.partials.form-file', [
        'name' => 'filepath',
        'label' => 'Zdjęcie',
        'helper' => 'Dodaj zdjęcie certyfikatu',
        'filepath' => $certificate->filepath,
])

@endsection
