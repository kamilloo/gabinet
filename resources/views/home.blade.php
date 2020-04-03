@extends('layouts.app')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Witaj {{ auth()->user()->name }}</h1>
        <p>Znajdujesz się w panelu do zarządziania stroną internetową</p>

        <hr class="my-4">
        <p class="lead">Gabinet kosmetyki pielęgnacyjnej Katarzyna Piętka</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Życzymy miłego dnia :)</a>
    </div>


@endsection
