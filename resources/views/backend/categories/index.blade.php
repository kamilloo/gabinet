@extends('layouts.crud')

@section('content')
    @parent
@endsection

@section('header', 'Kategorie')

@section('route.create', route('categories.create'))

@section('table-header')

    <tr>
        <th scope="col">Lp</th>
        <th scope="col">Name</th>
        <th scope="col">Ikona</th>
        <th scope="col">Action</th>
    </tr>

@endsection

@section('table-footer')
    @if(!$categories->count())
    <tr>
        <td colspan="4" scope="col">Brak Kategorii</td>
    </tr>
    @endif
@endsection

@section('table-item')

    @foreach($categories as $category)
        <tr>
            <td class="align-middle" scope="row">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $category->name }}</td>
            <td class="align-middle" >
                <span class="border border-info rounded text-info shadow-sm p-2 bg-white"><i class="xsicon {{ $category->icon }}"></i></span>
            </td>
            <td class="align-middle">
                <a class="btn btn-info float-left" href="{{ route('categories.edit', $category) }}">Edit&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                <form class="form-inline pl-2" action="{{ route('categories.destroy', $category) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger" type="submit">Delete&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                </form>
            </td>
        </tr>
    @endforeach

@endsection
