@extends('layouts.app')

@section('content')
    <div class="col-12 mb-4">
        <a class="btn btn-primary float-right" href="{{ route('categories.create') }}">Create&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
        <h1>Kategorie</h1>
    </div>
    <div class="col-12">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Lp</th>
                <th scope="col">Name</th>
                <th scope="col">Ikona</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td><span class="img-thumbnail"><i class="xsicon {{ $category->icon }}"></i></span></td>
                    <td>
                        <a class="btn btn-info" href="{{ route('categories.edit', $category) }}">Edit&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a class="btn btn-danger" href="{{ route('categories.destroy', $category) }}">Delete&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
