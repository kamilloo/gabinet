@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Usługi - Edytuj')

@section('action', route('services.update', $service))

@section('button', 'Zapisz')

@section('method')
    {{ method_field('PUT')  }}
@endsection

@section('form-control')

    @include('backend.partials.form-select', [
    'name' => 'category_id',
    'label' => 'Kategoria',
    'placeholder' => 'Wybierz kategorię',
    'helper' => 'Wybierz kategorię, do której zostanie przypisana usługa',
    'value' => old('category_id') ?? $service->category_id,
    'options' => $categories->pluck('name','id')
])

    @include('backend.partials.form-input', [
    'name' => 'title',
    'label' => 'Nazwa',
    'placeholder' => 'Podaj nazwę',
    'helper' => '',
    'value' => old('title') ?? $service->title
])

    @include('backend.partials.form-textarea', [
    'name' => 'description',
    'label' => 'Opis',
    'helper' => 'Opis swoją usługę',
    'value' => old('description') ?? $service->description,
])

    @include('backend.partials.form-file', [])

@endsection
