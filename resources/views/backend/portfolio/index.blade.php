@extends('layouts.crud')

@section('content')
    @parent
@endsection

@section('header', 'Portfolio')

@section('route.create', route('portfolio.create'))

@section('table-header')

    <tr>
        <th scope="col">Lp</th>
        <th scope="col">Zdjęcie</th>
        <th scope="col">Tagi</th>
        <th scope="col">Action</th>
    </tr>

@endsection


@section('table-footer')
    @if(!$files->count())
        <tr>
            <td colspan="4" scope="col">Brak Portfolio</td>
        </tr>
    @endif
@endsection

@section('table-item')

        @foreach($files as $file)
        <tr>
            <td class="align-middle" scope="row">{{ $loop->iteration }}</td>
            <td class="align-middle">
                <a href="{{ route('portfolio.edit', $file) }}">
                    <img height="50" class="img-thumbnail" src="{{ asset('storage/'.$file->filepath) }}">
                </a>
            </td>
            <td class="align-middle">
                @foreach($file->tags as $tag)
                    <span class="label label-primary">{{ $tag->name }}</span>
                @endforeach
            </td>
            <td class="align-middle">
                <a class="btn btn-info float-left" href="{{ route('portfolio.edit', $file) }}">Edit<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <form class="form-inline pl-2" action="{{ route('portfolio.destroy', $file) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger" type="submit">Delete&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                </form>
            </td>
        </tr>
    @endforeach

@endsection
