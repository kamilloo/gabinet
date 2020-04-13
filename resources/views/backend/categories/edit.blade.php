@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Kategorie - Edytuj')

@section('action', route('categories.update', $category))

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
    'value' => old('name') ?? $category->name,
])

    @include('backend.partials.icon-form-select', [
    'value' => old('icon') ?? $category->icon,
    'options' => $icons

])

@endsection
