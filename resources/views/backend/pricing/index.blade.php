@extends('layouts.crud')

@section('content')
    @parent
@endsection

@section('header', 'Cennik')
@section('route.create', route('pricing.create'))

@section('table-header')

    <tr>
        <th scope="col">Lp</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Zdjęcie</th>
        <th scope="col">
            <a class="btn btn-info mr-3" href="{{ route('pricing.show.all') }}">Sortuj&nbsp;Cenniki<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            <a class="btn btn-info mr-3" href="{{ route('pricing.printing') }}">Do&nbsp;PDF<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            Action
        </th>
    </tr>

@endsection


@section('table-footer')
    @if(!$pricing->count())
        <tr>
            <td colspan="4" scope="col">Brak Cennika</td>
        </tr>
    @endif
@endsection

@section('table-item')

    @foreach($pricing as $pricing_item)
        <tr>
            <td class="align-middle" scope="row">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $pricing_item->name }}</td>
            <td class="align-middle" height="100">
                <a href="{{ route('pricing.edit', $pricing_item) }}">
                    <img width="height" class="img-thumbnail h-100" src="{{ asset('storage/'.$pricing_item->filepath) }}">
                </a>
            </td>
            <td class="align-middle">
                <div class="float-left">
                    <a class="btn btn-info mr-3" href="{{ route('pricing.show', $pricing_item) }}">Sortuj&nbsp;Pozycje<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    <a class="btn btn-info" href="{{ route('pricing.edit', $pricing_item) }}">Edit&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </div>
                <form class="form-inline pl-3" action="{{ route('pricing.destroy', $pricing_item) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger" type="submit">Delete&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                </form>
            </td>
        </tr>
    @endforeach

@endsection
