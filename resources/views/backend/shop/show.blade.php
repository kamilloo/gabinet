@extends('layouts.crud-form')

@section('content')
    @parent
@endsection

@section('header', 'Sklep')

@section('action', route('shop.update'))

@section('button', 'Zapisz')

@section('method')
    {{ method_field('PUT')  }}
@endsection

@section('form-control')

    @include('backend.partials.form-input', [
    'name' => 'url',
    'label' => 'Adres',
    'placeholder' => 'Podaj adres',
    'helper' => 'Podaj adres do Twojego sklepu, na który będę mogli wejść klienci',
    'value' => old('url') ?? $shop->url,
])

    @include('backend.partials.form-radio', [
    'name' => 'status',
    'label' => 'Wyświetlanie linku',
    'helper' => 'Wyświetlaj link do Twojego sklepu w menu strony',
    'value' => old('status') ?? $shop->status,
    'options' => \App\Models\Enums\ShopStatus::description()
])

@endsection
