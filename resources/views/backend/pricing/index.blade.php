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
        <th scope="col">Action</th>
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
            <td class="align-middle">
                <a href="{{ route('pricing.edit', $pricing_item) }}">
                    <img width="height" class="img-thumbnail" src="{{ asset('storage/'.$pricing_item->path) }}">
                </a>
            </td>
            <td class="align-middle">
                <a class="btn btn-info float-left" href="{{ route('pricing.edit', $pricing_item) }}">Edit&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <form class="form-inline pl-2" action="{{ route('pricing.destroy', $pricing_item) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger" type="submit">Delete&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                </form>
            </td>
        </tr>
    @endforeach

@endsection
