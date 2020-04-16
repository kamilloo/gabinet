@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Portfolio - Edytuj')

@section('action', route('portfolio.update', $portfolio))

@section('button', 'Zapisa')

@section('method')
    {{ method_field('PUT')  }}
@endsection

@section('form-control')

    @include('backend.partials.form-input', [
    'name' => 'tags',
    'label' => 'Tagi',
    'placeholder' => 'Podaj tagi',
    'helper' => '',
    'value' => old('tags') ?? implode(',',$portfolio->tags->pluck('name')->all())
])

    @include('backend.partials.form-file', [
    'name' => 'filepath',
    'label' => 'Zdjęcie',
    'helper' => 'Dodaj zdjęcie',
    'filepath' => $portfolio->filepath,
])

@endsection
