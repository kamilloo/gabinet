@extends('layouts.crud')

@section('content')
    @parent
@endsection

@section('header', 'Certyfikaty')

@section('route.create', route('certificates.create'))

@section('table-header')

    <tr>
        <th scope="col">Lp</th>
        <th scope="col">Tytuł</th>
        <th scope="col">Zdjęcie</th>
        <th scope="col">Action</th>
    </tr>

@endsection


@section('table-footer')
    @if(!$certificates->count())
        <tr>
            <td colspan="4" scope="col">Brak certyfikatów</td>
        </tr>
    @endif
@endsection

@section('table-item')

    @foreach($certificates as $certificate)
        <tr>
            <td class="align-middle" scope="row">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $certificate->title }}</td>
            <td class="align-middle">
                <a href="{{ route('certificates.edit', $certificate) }}">
                    <img height="50" class="img-thumbnail" src="{{ asset('storage/'.$certificate->filepath) }}">
                </a>
            </td>
            <td class="align-middle">
                <a class="btn btn-info float-left" href="{{ route('certificates.edit', $certificate) }}">Edit&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

                <form class="form-inline pl-2" action="{{ route('certificates.destroy', $certificate) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button class="btn btn-danger" type="submit">Delete&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
                </form>
            </td>
        </tr>
    @endforeach

@endsection
