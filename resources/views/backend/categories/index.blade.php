@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Kategorie</h1>
                <div class="float-right">
                    <a class="btn btn-default" href="{{ route('categories.create') }}">Create&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                </div>
            </div>
            @if (session('status'))
            <div class="panel-body">
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
            </div>
            @endif
            <table class="table">
                <thead>
                <tr>
                    <th>Lp</th>
                    <th>Name</th>
                    <th>Ikona</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td><span><i class="xsicon {{ $category->icon }}"></i>&nbsp;&nbsp;{{ $category->icon }}</span></td>
                        <td>
                            <a class="btn btn-default" href="{{ route('categories.edit', $category) }}">Edit&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                            <a class="btn btn-danger" href="{{ route('categories.destroy', $category) }}">Delete&nbsp;<span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
